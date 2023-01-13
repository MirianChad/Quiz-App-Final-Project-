@extends("layout")

@section("body")



    @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
    @endguest
    @auth
        <div style="width: 250px; margin-left: 1100px; margin-top: -50px ">
            <h1 style="margin-left: -1100px">Quizzes</h1>
            {{--    @if((Auth::id() === 1))--}}
            {{--            <a href="{{route('questions')}}" style="width: 150px;"  class="btn btn-secondary">QUESTIONS</a>--}}
            {{--    @endif--}}
            <a href="{{ route('create') }}" style="width: 150px" class="btn btn-primary">CREATE NEW</a>
            <a href="{{ route('quizzes') }}" style="margin-top: 10px;" class="btn btn-warning">Pending Quizzes</a>

            <a href="{{ route('logout') }}" style="margin-top: 10px" class="btn btn-danger">Sing Out</a>
        </div>

        @forelse($quizzes as $quiz)

            <div class="card" style="width: 18rem;">
                <img src="{{$quiz->photo}}" class="card-img-top" alt="photo">
                <div class="card-body">
                    <h5 class="card-title">{{$quiz->name}}</h5>
                    @csrf
                    @method("GET")
                    <a href="{{route('singleQuiz',['quiz'=>$quiz->id] )}}" style="margin-left: 20px"  class="btn btn-outline-info col-10">See full details</a>

                </div>
                @empty
                    <h1 style="color: red">There is no quizes</h1>

            </div>
        @endforelse

    @endauth
@endsection
