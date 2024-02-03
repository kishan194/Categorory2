<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcategories</title>
    <link rel="stylesheet" href="{{asset('css/vproduct.css')}}" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    @include('layout.header')

    <h1>Product</h1>

    <table class="table">
        <thead>
            <tr>
                <th style="color:black;">ID</th>
                <th style="color:black;">Name</th>
                <th style="color:black;">Category_id</th>
                <th style="color:black;">Subcategory_id</th>
                <th style="color:black;">Image</th>
                 <th style="color:black;">Price</th>
                <th style="color:black;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $id=>$product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{ $product->name }} </td>
                    <td>{{ $product->category_id}} </td>
                    <td>{{ $product->subcategory_id}} </td>
                    <td>
                        <div class="image-container">
                            @if (!empty($product->image))
                                @foreach (json_decode($product->image) as $image)
                                    @if (file_exists(public_path('products/'.$image)))
                                        <img src="{{ asset('products/'.$image) }}" class="rounded-circle product-image" alt="Example Image">
                                    @else
                                        <p>Image not found: {{ $image }}</p>
                                    @endif
                                @endforeach
                            @else
                                <p>No images for this product.</p>
                            @endif
                        </div>
                    </td>
                    <td>{{$product->price}}</td>
                    <td>
                        <!-- Button to trigger the modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{$product->id}}">
                            View
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap Modal for Product Description -->
    @foreach ($products as $product)
        <div class="modal fade" id="viewModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{$product->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel{{$product->id}}">Product Details: {{$product->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> {{$product->id}}</p>
                        <p><strong>Name:</strong> {{$product->name}}</p>
                        <p><strong>Category ID:</strong> {{$product->category_id}}</p>
                        <p><strong>Subcategory ID:</strong> {{$product->subcategory_id}}</p>
                        <!-- Add more details as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
