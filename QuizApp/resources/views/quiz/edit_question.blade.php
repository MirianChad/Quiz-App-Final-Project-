@extends('layout')

@section('body')
    <form action="/user/quizzes" method="post">
        @csrf
{{--        --}}{{--        @method('PATCH')--}}

        <label for="name" style="width: 700px; margin-left: 300px">Question</label>
        <input type="text" id='name' style="width: 700px; margin-left: 300px" class="form-control" name="name" value="{{$question->question}}">

        <label for="photo" style="width: 700px; margin-left: 300px">Answer A</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $question->answer1 }}">

        <label for="photo" style="width: 700px; margin-left: 300px">Answer B</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $question->answer2 }}">

        <label for="photo" style="width: 700px; margin-left: 300px">Answer C</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $question->answer3 }}">

        <label for="photo" style="width: 700px; margin-left: 300px">Answer D</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $question->answer4 }}">


        <label for="description" style="width: 700px; margin-left: 300px">Correct Answer</label>
        <textarea id="description" style="width: 700px; margin-left: 300px" class="form-control" name="description">{{ $question->correct }}</textarea>

        <label for="photo" style="width: 700px; margin-left: 300px">Parent Quiz</label>
        <input type="text" id='photo' style="width: 700px; margin-left: 300px" class="form-control" name="photo" value="{{ $question->answer1 }}">

        <button class="btn btn-secondary" style=" margin-left: 300px; margin-top: 20px" type="submit">Update</button>


    </form>
@endsection
