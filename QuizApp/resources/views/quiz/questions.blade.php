@extends('layout')

@section('body')

    <table>
        <thead>
        <tr>
            <th>Question</th>
            <th>Quiz</th>
        </tr>
        </thead>
        <tbody>
        @foreach($questions as $question)
            <tr>
                <td>{{ $question->question }}</td>
                <td>
                    <form action="{{ route('question.update', ['id' => $question->id]) }}" method="post">
                        @csrf
                        @method('POST')
                        <select class="form-control" name="quiz_id">
                            @foreach($quizzes as $quiz)
                                <option value="{{ $quiz->id }}"
                                        @if($question->quiz_id === $quiz->id)
                                            selected
                                    @endif
                                >
                                    {{ $quiz->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-info" type="submit">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <a style="margin-top: 20px" class="btn btn-secondary" href="javascript:history.back()">Go Back</a></form>

@endsection
