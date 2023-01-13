<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = [
        'name',
        'photo',
        'description',
        'is_published'

    ];

    public function QuizOwner(){
        return $this-> belongsTo(User::class, 'id');
    }

    public function questions(){
        return $this->hasMany(Question::class, 'quiz_id');
    }

}
