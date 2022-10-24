@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Info</h3>
        <ul class="mb-5">
            <li>
                Title: <strong>{{$tag->name}}</strong>
            </li>
        </ul>

        <a class="btn btn-info" href="{{route('admin.tags.index')}}"><-</a>
    </div>
@endsection