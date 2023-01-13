@extends("layout")

@section("body")


<div  style="width: 250px; margin-left: 1100px; margin-top: -50px ">
    <h1  style="color: darkslateblue; margin-left: -1100px">My Quizzes</h1>
    <div style="margin-top: -50px">
    @if((Auth::id() === 1))
        <a href="{{route('questions')}}" class="btn btn-secondary">QUESTIONS</a>
    @endif
    <a href="{{ route('create') }}"  class="btn btn-primary">CREATE NEW</a>
    <a style="margin-top: 10px" class="btn btn-primary"  href="{{'/'}}">Main Page</a>
    </div>
</div>

@forelse($quizzes as $quiz)
@if($quiz->is_published==0)
<div class="card" style="width: 18rem;">
<img src="{{$quiz->photo}}" class="card-img-top" alt="photo">
    <div class="card-body">
        <h5 class="card-title">{{$quiz->name}}</h5>
        @csrf
        @method("GET")
        <a href="{{route('singleQuiz',['quiz'=>$quiz->id] )}}"  style="margin-left: 20px" class="btn btn-outline-info col-10">See full details</a>

    </div>
    @endif
@empty
    <h1 style="color: red">There is no quizes</h1>

</div>
@endforelse

@endsection




