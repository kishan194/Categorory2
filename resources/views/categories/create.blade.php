
         
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

    <form action="{{url('categories')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name:</label>
            <input type="text" name="name"  required>
        </div>

        <div class="form-group">
            <label for="image">Category Image:</label>
            <input type="file" name="image">
        </div>

        <button type="submit" cladd="btn btn-success">Create Category</button>
        <a href="{{url('/categories')}}" class="btn btn-success">Back</a>
    </form>
</body>
</html>
