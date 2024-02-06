<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}"  type="text/css">
</head>

@include('layout.header')
 @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif
<body>
          @php
    $total = 0;
    $cart = session('cart', []);
@endphp

@foreach($cart as $id => $item)
    @php
        $sub_total = $item['price'] * $item['quantity'];
        $total += $sub_total;
    @endphp
@endforeach
<div class="row">
  <div class="col-75">
    <div class="container">
     <form action="{{route('place.order')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" required>
            
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" required >
           
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" required>
           
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" required>
             
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="number" id="zip" name="zip" min=1 required>
               
              </div>
            </div>
          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" required>
          
            <label for="ccnum">Credit card number</label>
            <input type="number" id="ccnum" name="cardnumber" min=1 required>
           
            <label for="expmonth">Exp Month</label>
            <input type="number" id="expmonth" name="expmonth" min=1 max=12 required>
           
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="number" id="expyear" name="expyear" min=1 max=9999 required>
                
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" name="cvv" min=1 max=999 required>
              </div>
            </div>
          </div>
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
       <button type="submit" class="btn btn success">Place Order</button>
       </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
        @if(count(session('cart')??[]) > 0)
        @foreach(session('cart') as $id => $item)
            <p>{{ $item['name'] }} <span class="price">{{ $item['price'] }} x {{ $item['quantity'] }} </span></p>
        @endforeach
      
        <p>Total: <span class="price">{{ $total }}</span></p>
        @else
        <p>Your Cart is empty</p>
        @endif
    </div>
</div>
</div>
</body>
</html>
