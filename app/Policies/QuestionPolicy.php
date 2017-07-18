<?php

namespace App\Policies;

use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Question $question)
    {
        return $question->answers->isEmpty()
            && $user->id === $question->user_id;
    }
}
