<html>
<header>
<link rel="stylesheet" href="{{asset('css/cart.css')}}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@include('layout.header')
</header>
<body>
<h1>Order List</h1>

 <table class="table">
        <thead>
            <tr>
                <th style="color:black;">Order_id</th>
                <th style="color:black;">User_name</th>
               <th style="color:black;">Email</th>
               <th style="color:black;">Action</th>
                <th style="color:black;">Product_id</th>
                <th style="color:black;">Quantity</th>
                <th style="color:black;">Price</th>
            </tr>
        </thead>
        <tbody>
   @php
    $mergedData = [];
    foreach ($orderItems as $item) {
        $mergedData[$item->order_id]['order'] = $item->order;
        $mergedData[$item->order_id]['items'][] = $item;
    }
@endphp

@foreach ($mergedData as $orderId => $data)
    @foreach ($data['items'] as $key => $item)
        <tr>
            @if($key === 0)
                <td rowspan="{{ count($data['items'])}}">
                    {{$item->order_id}}
                </td>
                
                <td rowspan="{{ count($data['items'])}}">
                    {{$data['order']->fullname}}
                </td>
                <td rowspan="{{ count($data['items'])}}">
                    {{$data['order']->email}}
                </td>
                 <td rowspan="{{ count($data['items'])}}">
                    <a href="{{ url('order-view/'.$item->order_id)}}" class="btn btn-success">View Full Detail</a>
             </td>
            @endif
            <td>{{ $item->product_id }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>  
        </tr>
    @endforeach
@endforeach

        </tbody>
    </table>   
   
                    <div class="mt-4 d-flex justify-content-between align-items-center">
    <!-- Pagination links -->
    <div>
        {{ $orderItems->links() }}
    </div>


</div>
</body>
</html>