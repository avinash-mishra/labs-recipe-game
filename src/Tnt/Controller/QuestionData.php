<?php

namespace Tnt\Controller;

use Tnt\Model\Answer\ChoiceAnswer;
use Tnt\Model\Question;

trait QuestionData
{
    protected function buildQuestions()
    {
        $questions = [];

        $answers = [
            new ChoiceAnswer('yes', 'Yes'),
            new ChoiceAnswer('no', 'No'),
        ];
        $questions[] = new Question('question1', 'Are you ready for this?', $answers);

        $answers = [
            new ChoiceAnswer('less_15_min', 'Less than 15 minutes'),
            new ChoiceAnswer('between_15_and_30_min', 'Between 15 and 30 minutes'),
            new ChoiceAnswer('more_than_30_min', 'More than 30 minutes'),
        ];
        $questions[] = new Question('question1', 'Time to cook this recipe', $answers);

        return $questions;
    }
}
