<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}"  type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
@include('layout.header')
</header>

<body>

<style>
#success-message,
#error-message{
  background: #DEF1D8;
  color: green;
  font-size: 30px;
  padding: 10px;
  margin: 10px;
  display: none;
  position: fixed;
  right: 15px;
  top: 15px;
  z-index: 20;
}
</style>
    <h1>Create Product</h1>

     @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif

    <form  id="myform" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">product Name:</label>
            <input type="text" name="name"  required>
        </div>
              <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" required>
             <option value="Select SubCategory">Category</option>
                @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory_id">Select Category:</label>
            <select name="subcategory_id" required>
             <option value="Select SubCategory">Select SubCategory</option>
                @foreach ($subcategories as $subcategory)
                 <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>
         <div class="form-group">
            <label for="image">Product Image:</label>
            <input type="file" name="image[]" multiple>
        </div>
         <div class="form-group">
            <label for="name">Price:</label>
            <input type="number" name="price"  required>
        </div>
        <div class="form-group">
            <label for="name">Quantity</label>
            <input type="number" name="quantity"  required>
        </div>
        
        <div id="success-message" class="messages" style="display:none">Record Added SuccessFull</div>
       <div id="error-message" class="messages" style="display:none">Some One Error</div>

        <button type="submit" id="btnSubmit"  class="btn btn-success">Create Category</button>
        <a href="{{url('categories')}}"   class="btn btn-success">Back</a>
    </form>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
    $("#myform").submit(function(e){
        e.preventDefault();
        var form = $(this)[0]; 
        var data = new FormData(form); 

        $("#btnSubmit").prop("disabled", true);

        $.ajax({
            type: "POST",
            url: "{{ route('product.store') }}",
            data: data,
            processData: false, 
            contentType: false,
            success: function(response) {
              $("#success-message").show();
              $("select").val('');
               $("input[type='text']").val('');
              $("input[type='file']").val('');
              $("input[type='number']").val('');
            },
            error: function(xhr, status, error) {
              
            },
            complete: function() {
                $("#btnSubmit").prop("disabled", false);
                 $("input[type='text']").val('');
                 $("input[type='file']").val('');
                   $("input[type='number']").val('');
            }
        });
    });
});

</script>
</body>
</html>
 