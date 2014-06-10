<?php

namespace Tnt\Model;

class Question
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $text;

    /** @var  string */
    private $type;

    /** @var  Answer[] */
    private $answers;

    public function __construct($name, $text, $answers)
    {
        $this->name = $name;
        $this->text = $text;
        $this->type = QuestionType::CHOICE;
        $this->answers = $answers;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Answer[]
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
