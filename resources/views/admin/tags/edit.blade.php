@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.tags.update', ['tag' => $tag->id])}}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tag Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required max="50" value="{{old('name', $tag->name)}}">
            </div>

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <button class="btn btn-info"><a href="{{route('admin.tags.index')}}"><-</a></button>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection