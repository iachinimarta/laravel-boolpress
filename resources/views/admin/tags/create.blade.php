@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.tags.store')}}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Tag Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required max="50" value="{{old('name')}}">
            </div>

            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror

            <a class="btn btn-info" href="{{route('admin.tags.index')}}"><-</a>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection