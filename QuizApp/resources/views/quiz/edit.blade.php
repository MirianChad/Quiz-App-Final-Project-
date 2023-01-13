@extends('layout')

@section('body')
    <form action="/user/quizzes/{{$quiz->id}}" method="post">
        @csrf
{{--        @method('PATCH')--}}

        <label for="name" style="width: 700px; margin-left: 300px">Title</label>
        <input type="text" id='name' style="width: 700px; margin-left: 300px" class="form-control" name="name" value="{{ $quiz->name }}">

        <label for="photo" style="width: 700px; margin-left: 300px">Photo</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $quiz->photo }}">

        <label for="description" style="width: 700px; margin-left: 300px">Description</label>
        <textarea id="description" style="width: 700px; margin-left: 300px" class="form-control" name="description">{{ $quiz->description }}</textarea>

        <button class="btn btn-secondary" style=" margin-left: 300px; margin-top: 20px" type="submit">Update</button>


    </form>
@endsection
