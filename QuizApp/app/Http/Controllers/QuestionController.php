<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{

    public function create(Quiz $quiz){
        $quiz = Quiz::find($quiz->id);
        return view('quiz.addquestion', ['quiz' => $quiz]);
    }


    public function store(Request $request, Quiz $quiz,)
    {
        $request -> validate([

            'question'=> 'required',
            'answer1'=>'required',
            'answer2'=>'required',
            'answer3'=>'required',
            'answer4'=>'required',
            'correct'=>'required',
            ],[
                'question.required' => 'Please fill Question field',
                'answer1.required' => 'Please fill Answer A field',
                'answer2.required' => 'Please fill Answer B field',
                'answer3.required' => 'Please fill Answer C field',
                'answer4.required' => 'Please fill Answer D field',
                'correct.required' => 'Please fill Correct Answer field',
        ]);
//        $quiz = Quiz::findOrFail($quiz->id);
        $question = new Question;
        $question->question = $request->question;
        $question->answer1 = $request->answer1;
        $question->answer2 = $request->answer2;
        $question->answer3 = $request->answer3;
        $question->answer4 = $request->answer4;
        $question->correct = $request->correct;
        $question->parent_quiz = $request->parent_quiz;
        $question->position = $request->position;
        $question->quiz_id = $request->quiz_id;
        $question->save();
//        $quiz->questions()->save($question);

        return redirect()->route('home');

    }


    public function delete(Question $question){
        $question->delete();
        return redirect('user/quizzes');

    }



    public function all(Question $question,Quiz $quiz) {
        if (Auth::id() === 1) {
            $questions = Question::all();
            $quizzes = Quiz::all();
            return view('quiz.questions', ['questions'=>$questions, "quizzes"=>$quizzes]);
        }
        else{
//            $quiz = Quiz::find($quiz->id);
//            $quizzes = Quiz::all()->where('user_id', Auth::user()->id);
//            $question = Question::all()->where('quiz_id', $quiz);
//
//            return view('quiz.questions', ['questions'=>$question, "quizzes"=>$quizzes]);

            return redirect()->route("quizzes");
        }



    }


    public function update(Request $request, int $id){
        $question = Question::find($id);
        $question->update([
            'quiz_id' => $request->quiz_id,
        ]);
        $question->save();
        return redirect()->route('quizzes');
    }







}
