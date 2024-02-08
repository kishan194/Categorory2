<header>
  @include('layout.header')
</header>
<style>
h3 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: bold;
}

/* Apply different background color to alternate order items */
.items-container:nth-child(even) {
    background-color: white;
}
</style>

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
            @endif
            <h3>Product Name: {{ $item->product_id }}</h3>
            <h3>Product Quantity: {{ $item->quantity }}</h3>
            <h3>Product Price: {{ $item->price }}</h3>
        @endforeach
    </div>
@endforeach
         