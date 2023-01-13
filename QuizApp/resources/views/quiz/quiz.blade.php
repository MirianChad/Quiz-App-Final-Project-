@extends('layout')

@section('body')

<h1>{{$quiz->name}}</h1>
<img src="{{$quiz->photo}}" class="card-img-top" alt="photo" style="width: 700px">
<h3 class="col-sm-auto">{{$quiz->description}}</h3>
<h5 class="col-sm-auto">Number Of Questions: {{$quiz->questions->count()}}</h5>
<h5>By: {{$quiz->author}}</h5>

<form action="/user/quizzes/delete/{{ $quiz->id }}" method="POST">

    <a href="{{route('quizzes.attempt', ['quiz'=>$quiz->id])}}" class="btn btn-success">START</a>
    <a href="{{route('createQuestion', ['quiz'=>$quiz->id])}}" class="btn btn-secondary">ADD QUESTION</a>


    <a href="{{route('quiz',['quiz'=>$quiz->id] )}}" class="btn btn-primary">EDIT</a>



    @method('DELETE')
    @csrf
    <button class="btn btn-danger"  type="submit">Delete</button>
</form>
@if (Auth::id() === 1 && $quiz->is_published==0)
    <form action="{{ route('quizzes.publish',['quiz' => $quiz->id]) }}" method="post">
        @csrf
        <button class="btn btn-success" type="submit">Publish Quiz</button>
    </form>
@endif






@endsection
