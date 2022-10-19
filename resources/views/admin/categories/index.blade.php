@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success">
                <a href="{{route('admin.categories.create')}}">New</a>
            </button>
        </div>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-info">
                                <a href="{{route('admin.categories.show', ['category' => $category->id])}}">Info</a>
                            </button>
                            <button type="button" class="btn btn-warning mx-2">
                                <a href="{{route('admin.categories.edit', ['category' => $category->id])}}">Edit</a>
                            </button>
                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST" onsubmit="return confirm('Are you sure you want to delete the item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        
                    </td>
                </tr>
                @endforeach      
            </tbody>
        </table>
        <a class="btn btn-info text" href="{{route('admin.')}}"><-</a>  
    </div>
@endsection