<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{asset('css/cart.css')}}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   
</head>
@include('layout.header')
<body>

    <h1>Shopping Cart</h1>
    @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif

    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category ID</th>
                    <th>Subcategory ID</th>
                    <th>Image</th>
                     <th>price</th>
                     <th>Quantity</th>
                     <th>SubTotal</th>
                    <th>Remove From Cart </th>
                </tr>
            </thead>
            <tbody>
                     @php 
                          $total = 0;
                      @endphp
                @foreach(session('cart') as $id => $item)
                      @php 
                            $sub_total = $item['price'] * $item['quantity'];
                            $total += $sub_total 
                      @endphp
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['category_id'] }}</td>
                        <td>{{ $item['subcategory_id'] }}</td>
                        <td> @if (isset($item['image']))
                         @foreach (json_decode($item['image']) as $image)
                       <img src="{{ $image }}" alt="{{ $item['name'] }}" class="img-fluid" width="50px">
                             @endforeach
                            @endif</td>
                         <td>{{$item['price'] ?? ''}}</td>
                         <td>        <form action="{{route('change_qty', $id)}}" class="d-flex">
                                    <button
                                        type="submit"
                                        value="down"
                                        name="change_to"
                                        class="btn btn-danger"
                                    >
                                        @if($item['quantity']=== 1) - @else - @endif
                                    </button>
                                    <input
                                        type="number"
                                        value="{{$item['quantity']}}"
                                        disabled>
                                    <button
                                        type="submit"
                                        value="up"
                                        name="change_to"
                                        class="btn btn-info"
                                    >
                                        +
                                    </button>
                                </form>
                         </td>
                     <td>{{$sub_total}}</td>
                        <td><form action="{{ route('cart.remove', $item['id']) }}" method="post">
                               @csrf
                               <input type="hidden" name="_method" value="POST">
                             <button class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                              </svg></button>
                         </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
  
       
        <div class="check-container" style="text-align:center;">
        <a href="{{ route('review.cart') }}" class="btn btn-success">Proceed to Checkout</a>
        
        <div>
    @else
        <p>Your cart is empty.</p>
    @endif
    <div style="text-align:left">
     <a href="{{url('/product')}}" class="btn btn-success">Continue Shoping</a></div>
</body>
</html>
