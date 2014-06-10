<?php

namespace Tnt\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Tnt\Model\Question;

class GameController extends BaseController
{
    use QuestionData;

    /**
     * @inheritdoc
     */
    public function buildRouteDefinitions(ControllerCollection $collection)
    {
        $collection->get('/take', self::class.':'.'takeQuestion');
        $collection->post('/respond', self::class.':'.'respondQuestion');

        return $collection;
    }

    private function retrieveOneQuestionRandomly()
    {
        $questions = $this->buildQuestions();
        $index = rand(0, count($questions)-1);
        $result = $questions[$index];

        return $result;
    }

    private function serializeQuestion(Question $question)
    {
        $answers = [];
        foreach ($question->getAnswers() as $answer) {
            $answers[] = [
                $answer->getValue() => $answer->getLabel(),
            ];
        }

        $result = [
            'name' => $question->getName(),
            'text' => $question->getText(),
            'type' => $question->getType(),
            'answers' => $answers,
        ];

        return $result;
    }

    public function takeQuestion()
    {
        $question = $this->retrieveOneQuestionRandomly();
        $result = $this->serializeQuestion($question);

        return new JsonResponse($result);
    }

    public function respondQuestion()
    {
        $result = [
            'result' => 'success',
            'messages' => ['Thank you for you respond'],
        ];

        return new JsonResponse($result);
    }
}
