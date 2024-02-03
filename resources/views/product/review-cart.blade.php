<!-- review-cart.blade.php -->
 <link rel="stylesheet" href="{{asset('css/cart.css')}}" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div>
    <h1>Review Cart</h1>      
    @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif

    @if(session('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                     <th>price X Quantity</th>
                     <th>SubTotal</th>
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
                       
                        <td>{{ $item['name'] }}</td>
                        
                        <td> @if (isset($item['image']))
                         @foreach (json_decode($item['image']) as $image)
                       <img src="{{ $image }}" alt="{{ $item['name'] }}" class="img-fluid" width="50px">
                             @endforeach
                            @endif</td>
                         <td> <span class="price">{{ $item['price'] }} x {{ $item['quantity'] }}</span></p></td>
                     <td>{{$sub_total}}</td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
            
        </table>
        
           <div class="text-right">
               <h2>Total Amount: {{ $total }}</h2>
              </div>


       
        <div class="check-container" style="text-align:center;">
        <a href="{{ route('check.out') }}" class="btn btn-success">Payment</a>
        
        <div>
    @else
        <p>Your cart is empty.</p>
    @endif
    <div style="text-align:left">
