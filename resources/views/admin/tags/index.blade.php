@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-success">
                <a href="{{route('admin.tags.create')}}">New</a>
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
                
                @foreach ($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info">
                                    <a href="{{route('admin.tags.show', ['tag' => $tag->id])}}">Info</a>
                                </button>
                                <button type="button" class="btn btn-warning mx-2">
                                    <a href="{{route('admin.tags.edit', ['tag' => $tag->id])}}">Edit</a>
                                </button>
                            </div>
                            
                        </td>
                    </tr>
                @endforeach      
            </tbody>
        </table>
        <a class="btn btn-info text" href="{{route('admin.')}}"><-</a>  
    </div>
@endsection