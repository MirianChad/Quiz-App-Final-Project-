@extends('layout')

@section('body')

    <div class="card" style="width: 18rem; margin-left: 500px; margin-top: 100px">
        <div class="card-body">
            <h2>Your Answers Have Submitted!</h2>
            <h4>Quiz: {{ $quiz->name }}</h4>
            <p>Total Questions: {{ $total }}</p>
            <p>Correct:  {{ $score }}</p>
            <p>Incorrect: {{$total - $score }}</p>
        </div>
    </div>




@endsection
