<html>
<header>
<link rel="stylesheet" href="{{asset('css/cart.css')}}" type="text/css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@include('layout.header')
</header>
<body>
<h1>Order List</h1>
 <table class="table">
        <thead>
            <tr>
                <th style="color:black;">Order_id</th>
                <th style="color:black;">User_id</th>
                <th style="color:black;">Product_id</th>
                <th style="color:black;">Quantity</th>
                <th style="color:black;">Price</th>
                <th style="color:black;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                <tr>
                    <td>{{$item->order_id}}</td>
                    <td>{{ $item->user_id }} </td>
                    <td>{{ $item->product_id}} </td>
                    <td>{{ $item->quantity}} </td>
                    <td>{{$item->price}}</td>
                    <td> <a href="{{url('order-view/'.$item->id)}}" class="btn btn-success">View Full-Detail</a>
                </tr>
            @endforeach
        </tbody>
    </table>   
</body>
</html>