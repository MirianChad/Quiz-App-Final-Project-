@extends('layout')

@section('body')
    @if($quiz->questions->count() != 0)

    <h1>{{ $quiz->name }}</h1>
    <p>{{ $quiz->description }}</p>
    <form action="{{ route('quizzes.result', ['quiz' => $quiz]) }}" method="post">
        @csrf
        <div id="questions">
            @foreach ($questions as $question)
                <div class="question" style="display: none; position: relative">
                    <h2>{{ $question->question }}</h2>
                    <h3>you are on quesiton {{$question->position}} from {{ $quiz->questions->count() }}</h3>
{{--                    <img src="{{ $quiz->photo }}" alt="{{ $question->question }}" style="height: 25%; width: 25%">--}}
                    <br>
                    <label>
                        <input type="radio" class="form-check-input" name="answers[{{ $question->question }}]" value="1" onchange="showResult(this, {{ $question->correct }});" answered='false'>
                        {{ $question->answer1 }}
                    </label>
                    <br>
                    <label>
                        <input type="radio" class="form-check-input" name="answers[{{ $question->question }}]" value="2" onchange="showResult(this, {{ $question->correct}});" answered='false'>
                        {{ $question->answer2 }}
                    </label>
                    <br>
                    <label>
                        <input type="radio" class="form-check-input" name="answers[{{ $question->question }}]" value="3" onchange="showResult(this, {{ $question->correct}});" answered='false'>
                        {{ $question->answer3 }}
                    </label>
                    <br>
                    <label>
                        <input type="radio" class="form-check-input" name="answers[{{ $question->question }}]" value="4" onchange="showResult(this, {{ $question->correct}});" answered='false'>
                        {{ $question->answer4 }}
                    </label>
                    <br>
                    <span id="result-{{ $question->question }}"></span>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-secondary" onclick="showPrevQuestion()">Prev</button>
        <button type="button" class="btn btn-primary" onclick="showNextQuestion()">Next</button>

        <script>
            var currentQuestionIndex = 0;
            function showResult(radioButton, correctAnswer) {
                var resultSpan = document.getElementById('result-' + radioButton.name.split("[")[1].split("]")[0]);
                if (resultSpan) {
                    if (radioButton.value == correctAnswer) {
                        resultSpan.innerHTML = 'Correct';
                    } else {
                        resultSpan.innerHTML = 'Incorrect';
                    }
                }
                var radioButtons = document.getElementsByName(radioButton.name);
                for (var i = 0; i < radioButtons.length; i++) {
                    if (radioButtons[i] != radioButton) {
                        radioButtons[i].disabled = true;
                    }
                }
            }
            function showPrevQuestion() {
                var questions = document.getElementsByClassName('question');
                if (currentQuestionIndex > 0) {
                    questions[currentQuestionIndex].style.display = 'none';
                    currentQuestionIndex--;
                    questions[currentQuestionIndex].style.display = 'block';
                }
            }
            function showNextQuestion() {
                var questions = document.getElementsByClassName('question');
                if (currentQuestionIndex < questions.length - 1) {
                    questions[currentQuestionIndex].style.display = 'none';
                    currentQuestionIndex++;
                    questions[currentQuestionIndex].style.display = 'block';
                }
            }
            // Show the first question initially
            document.getElementsByClassName('question')[0].style.display = 'block';
        </script>

        <button type="submit" class="btn btn-success">Submit answers</button>
    </form>

@else
        <p style="margin-top: 50px; margin-left: 10px; width: 30000px">You Cant Start Quiz Because There is No Questions</p>
        <a class="btn btn-primary" href="{{route("createQuestion", ['quiz'=>$quiz->id])}}">ADD QUESTION</a>

@endif


@endsection
