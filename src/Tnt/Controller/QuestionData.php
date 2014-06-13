<?php

namespace Tnt\Controller;

use Tnt\Model\Answer\ChoiceAnswer;
use Tnt\Model\Question;
use Tnt\Model\QuestionType;

trait QuestionData
{
    protected function buildQuestions()
    {
        $questions = [];

        $answers = [
            new ChoiceAnswer('yes', 'Yes'),
            new ChoiceAnswer('no', 'No'),
        ];
        $questions[] = new Question('question1', 'Are you ready for this?', QuestionType::CHOICE, $answers);

        $answers = [
            new ChoiceAnswer('less_15_min', 'Less than 15 minutes'),
            new ChoiceAnswer('between_15_and_30_min', 'Between 15 and 30 minutes'),
            new ChoiceAnswer('more_than_30_min', 'More than 30 minutes'),
        ];
        $questions[] = new Question('question2', 'Time to cook this recipe', QuestionType::CHOICE, $answers);


        $answers = [
            new ChoiceAnswer('tomatoes', 'Tomatoes'),
            new ChoiceAnswer('potatoes', 'Potatoes'),
            new ChoiceAnswer('celery', 'Celery'),
        ];
        $questions[] = new Question('question3', 'Confirm ingredients', QuestionType::MULTICHOICE, $answers);

        return $questions;
    }
}
