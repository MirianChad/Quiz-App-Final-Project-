<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

class QuizController extends Controller
{
    public function create(){


        return view('quiz.create');

    }
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'photo' => 'required',
            'description' => 'required'
        ]);
        $quiz = new Quiz;
        $quiz->name = $request->name;
        $quiz->photo = $request->photo;
        $quiz->description = $request->description;
//        $quiz->author = Auth::user()->getAuthIdentifierName();
        $quiz->author = Auth::user()->email;
        $quiz->user_id = Auth::user()->id;
        $quiz->save();


        return redirect('/user/quizzes');


    }

    public function quizzes(){
        if (Auth::id()===1){
            $quizzes = DB::table("quizzes")->
            orderBy("created_at", "desc")->get();

            return view('quiz.quizzes', ['quizzes'=>$quizzes]);

        }else{
            $user = Auth::user()->id;
            $quizzes = DB::table("quizzes")->
            where('user_id', $user)->
            orderBy("created_at", "desc")->get();

            return view('quiz.quizzes', ['quizzes'=>$quizzes]);
        }


    }

    public function delete(Quiz $quiz){
        $questions = Question::where('quiz_id', $quiz->id)->get();

        if ($questions->count() > 0) {
            Question::where('quiz_id', $quiz->id)->delete();
        }
        $quiz->delete();
        return redirect()->route('home');

    }

    public function edit(Quiz $quiz) {

        $quiz = Quiz::find($quiz->id);
        return view('quiz.edit', ['quiz' => $quiz]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->photo = $request->input('photo');
        $quiz->description = $request->input('description');
        $quiz->save();
        return redirect('user/quizzes');
    }

    public function quiz(Quiz $quiz){
        $quiz = Quiz::find($quiz->id);
        return view('quiz.quiz', ['quiz' => $quiz]);

    }


    public function attempt(Quiz $quiz) {
        return view('quiz.attempt', [
            'quiz' => $quiz,
            'questions' => $quiz->questions->sortBy('id'),
        ]);
    }

    public function result(Quiz $quiz, Request $request)
    {
        $answers = $request->input('answers');
        $score = 0;

        if ($answers !=0)
        foreach ($answers as $question => $answer) {
            $question = $quiz->questions()->where('question', $question)->first();
            if ($question->correct == $answer) {
                $score++;
            }
        }

        return view('quiz.result', [
            'quiz' => $quiz,
            'score' => $score,
            'total' => $quiz->questions->count(),
        ]);
    }

    public function publish(Quiz $quiz) {
        $quiz->update(["is_published" => true]);

        return redirect()->route('home');
    }

    public function home(){
        $quizzes = DB::table("quizzes")->
        where('is_published', 1 )->
        orderBy("created_at", "desc")->get();

        return view('home', ['quizzes'=>$quizzes]);

    }




}
