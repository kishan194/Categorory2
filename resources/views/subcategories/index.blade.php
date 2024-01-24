@extends('layout.master')
    @section('title')
        <title>Subcategories</title>
    @endsection

    @section('addstyle')
            <link rel="stylesheet" href="{{asset('css/sindex.css')}}" type="text/css">
    @endsection
    
    <h1>SubCategory</h1>

  

    <table class="table">
    @section('table')
        <thead>
            <tr>
                <th>ID</th>
                <th>Parent Category Name</th>
                <th>SubCategory Name</th>
                <th>Image</th>
                <th>view</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($subcategories as $subcategory)
                <tr>
                    <td>{{$subcategory->id}}</td>
                    <td>{{ $subcategory->category->name}}</td>
                    <td>{{ $subcategory->name }} </td>
                    <td><img src="products/{{$subcategory->image}}" class="rounded-circle" width="50" height="50" alt="Example Image"></td>
                    <td><a href="{{url('subcategories/view')}}" class="btn btn-primary">View</a>
                   
                        </form>
                </tr>
             @endforeach
        </tbody>
    @endsection
        
    </table>
</body>
</html>
