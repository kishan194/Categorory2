<header>
  @include('layout.header')
</header>

<div class="row">
   <div class="col-md-6">
      <h2>User Deatils</h2>
      <hr>
     @php
    $mergedData = [];
    foreach ($orderItems as $item) {
        $mergedData[$item->order_id]['order'] = $item->order;
        $mergedData[$item->order_id]['items'][] = $item;
    }
@endphp

@foreach ($mergedData as $orderId => $data)
    <div class="items-container">
        @foreach ($data['items'] as $key => $item)
            @if($key === 0)
                <h3>Order id: {{ $item->order_id }}</h3>
                <h3>User Name: {{ $data['order']->fullname }}</h3>
                <h3>User Email: {{ $data['order']->email }}</h3>
                <h3>User Address: {{ $data['order']->address }}</h3>
                <h3>User City: {{ $data['order']->city }}</h3>
                <h3>User zipcode : {{ $data['order']->zip }}</h3>
            @endif
        @endforeach
        <div class="col-md-6">
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product_id</th> 
                        <th>Prduct Name</th>
                        <th>Product Quantity</th> 
                        <th>Product Price</th>
                        <th>Sub_Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['items'] as $item)
                        <tr>
                            <td>{{ $item->product_id }}</td>
                             <td>{{$item->name}}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{$item->quantity * $item->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach
   

         