      @extends('layout.master')
     

     @section('title')
              <title>categories</title>
     @endsection
    <link rel="stylesheet" href="{{ asset('css/index.css') }}"  type="text/css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <div class="dropdown">
        @section('link')
             <a href="#"  class="header-link">All Categories</a>
             @include('partials.category-dropdown', ['categories' => $categories])
        @endsection
    </div>
    <div>
    
    </div>
</div>

    <table class="table">
           @section('table')
                      <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td> {{$category->id}} </td>
                    <td>{{$category->name}}</td>
                         <td><img src="{{ asset('products/'.$category->image) }}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                </tr>
             @endforeach
        </tbody>
           @endsection
    </table>
</body>
</html>
