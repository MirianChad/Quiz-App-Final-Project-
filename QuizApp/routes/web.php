<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuizController::class, "home"])->name('home') ;



Route::get('/login', [AuthController::class, "loginPage"])->name("login");
Route::post("/login", [AuthController::class, "login"]);

Route::get('/register', [AuthController::class, "registerPage"])->name("register");
Route::post("/register", [AuthController::class, "register"]);


// Protected Route
Route::middleware("auth")->get('/logout', [AuthController::class, "logout"])->name("logout");
// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get("/user", [UserController::class, "index"])->name("user.index");
});

Route::get('/user/create', [QuizController::class, "create"])->name('create');
Route::post('/user/create', [QuizController::class, "store"])->name('store');
Route::get('user/quizzes', [QuizController::class, "quizzes" ])->name('quizzes');
Route::post('user/quizzes', [QuizController::class, "quizzes" ]);
Route::delete('/user/quizzes/delete/{quiz}', [QuizController::class, "delete"])->name('destroy');
Route::get('/user/quizzes/{quiz}/edit', [QuizController::class, "edit"])->name('quiz');
Route::post('/user/quizzes/{quiz}', [QuizController::class, 'update']);
Route::get('user/quizzes/{quiz}', [QuizController::class, 'quiz'])->name('singleQuiz');


Route::get('/user/create/question/{quiz}', [QuestionController::class, "create"])->name('createQuestion');
Route::post('/user/create/question', [QuestionController::class, "store"])->name('storeQuestion');
//Route::get('user/question', [QuestionController::class, 'question'])->name('question');

Route::post('user/quizzes/{quiz}/publish', [QuizController::class, 'publish'])->name('quizzes.publish');

Route::get('user/quizzes/{quiz}/attempt', [QuizController::class, 'attempt'])->name('quizzes.attempt');
Route::post('user/quizzes/{quiz}/result', [QuizController::class, 'result'])->name('quizzes.result');
//Route::get('/user/quizzes/questions/{id}/edit', [QuestionController::class, "edit"])->name('edit_quest');
//Route::post('/user/quizzes/{quiz}/questions', [QuestionController::class, 'update'])->name('update');


Route::get('questions', [QuestionController::class, 'all'])->name('questions');
Route::post('question/{id}', [QuestionController::class, 'update'])->name('question.update');
