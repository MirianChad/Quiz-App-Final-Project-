@extends("layout")
@section("body")
<div style="margin-left: 300px">
    <h1>Create a New Question</h1>


    <form method="POST" action="/user/create/question">
        @csrf
        <div>
            <label for="name">Question:</label>
            @error('question')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="text" style="width: 700px" name="question" class="form-control" id="name">
        </div>
        <div>
            <label for="A">answer A:</label>
            @error('answer1')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea name="answer1" style="width: 700px" class="form-control" id="A"></textarea>
        </div>

        <div>
            <label for="B">Answer B:</label>
            @error('answer2')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea name="answer2" style="width: 700px" class="form-control" id="B"></textarea>
        </div>

        <div>
            <label for="C">answer C:</label>
            @error('answer3')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea name="answer3" style="width: 700px" class="form-control" id="C"></textarea>
        </div>

        <div>
            <label for="D">Answer D:</label>
            @error('answer4')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea name="answer4" style="width: 700px" class="form-control" id="D"></textarea>
        </div>
{{--        <div class="mb-3" style="margin-top: 20px">--}}
{{--            <select name="correct" class="form-select" aria-label="Default select example">--}}
{{--                <option selected>Correct Answer</option>--}}
{{--                <option value="answer1">A</option>--}}
{{--                <option value="answer2">B</option>--}}
{{--                <option value="answer3">C</option>--}}
{{--                <option value="answer4">D</option>--}}
{{--            </select>--}}
{{--        </div>--}}
        <div>
            <label for="correct">Correct Answer:</label>
            @error('correct')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea name="correct" style="width: 700px" class="form-control" id="correct"></textarea>
        </div>

        <div>
            <label for="position">Position</label>
            <input type="number" style="width: 700px" class="form-control" id="position" name="position" readonly value="{{$quiz->questions->count()+1 }}">
        </div>

        <div>
{{--            <label for="parent_quiz">Parent Quiz</label>--}}
            <input type="hidden"  name="parent_quiz" class="form-control" value="{{$quiz->name}}"  id="parent_quiz">
        </div>



        <div>
{{--            <label for="quiz_id">Quiz_id</label>--}}
            <input type="hidden" name="quiz_id" class="form-control" value="{{$quiz->id}}"  id="quiz_id">
        </div>







        <button style="margin-top: 20px; margin-left: 300px" class="btn btn-success" type="submit">Create Question</button>
        <a style="margin-top: 20px" class="btn btn-secondary" href="javascript:history.back()">Go Back</a></form>

    </form>







</div>
@endsection


