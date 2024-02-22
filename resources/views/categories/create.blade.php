
         
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
  
    <link rel="stylesheet" href="{{ asset('css/create.css') }}"  type="text/css">
   <link rel="stylesheet" href="{{ asset('css/footer.css') }}"  type="text/css">
   
</head>

<header>
@include('layout.header')
</header>

<body>
    
    <h1>Create Category</h1>
        
     @if ($message = Session::get('success'))
          <div class="alert alert-success" role="alert">
          <strong>{{$message}}</strong>
          </div>
   @endif

    <form id="myform" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name"  required>
        </div>

        <div class="form-group">
            <label for="image">Category Image:</label>
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
 
        <button type="submit"  class="btn btn-success">Create Category</button>
        <a href="{{url('/categories')}}" id="btnSubmit" class="btn btn-success">Back</a>
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
            url: "{{ route('categories.store') }}",
            data: data,
            processData: false, 
            contentType: false,
            success: function(response) {
                
              $("#success-message").show();
               $("input[type='text']").val('');
              $("input[type='file']").val('');
            },
            error: function(xhr, status, error) {
              
            },
            complete: function() {
                $("#btnSubmit").prop("disabled", false);
                 $("input[type='text']").val('');
              $("input[type='file']").val('');
            }
        });
    });
});

</script>
</body>

</html>





