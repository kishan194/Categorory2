<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subcategory</title>
    <link rel="stylesheet" href="{{asset('css/screate.css')}}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<header>
@include('layout.header')
</header>

<body>

    <h1>Create Subcategory</h1>
      @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif
    <form id="myform" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="category_id">Select Category:</label>
            <select name="category_id" required>
             <option value="Select SubCategory">Select SubCategory</option>
                @foreach ($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Subcategory Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label for="image">Subcategory Image:</label>
            <input type="file" name="image">
        </div>
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
        <div id="success-message" class="messages" style="display:none">Record Added SuccessFull</div>
        <div id="error-message" class="messages" style="display:none">Some One Error</div>
        <button type="submit" id="btnSubmit" class="btn btn-success">Create SubCategory</button>
        <a href="{{url('categories')}}" class="btn btn-success">Back</a>
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
            url: "{{ route('subcategories.store') }}",
            data: data,
            processData: false, 
            contentType: false,
            success: function(response) {
              $("#success-message").show();
              $("select").val('');
              $("input[type='text']").val('');
              $("input[type='file']").val('');
            },
            error: function(xhr, status, error) {
            },
            complete: function() {
                $("#btnSubmit").prop("disabled", false);
                  $("input[type='name']").val('');
              $("input[type='file']").val('');
            }
        });
    });
});

</script>
</body>
</html>