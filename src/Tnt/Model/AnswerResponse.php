<?php

namespace Tnt\Model;

class AnswerResponse
{
    /** @var Question */
    private $question;

    /** @var  mixed */
    private $value;

    /** @var  \DateTime */
    private $created;

    public function __construct(Question $question, $value)
    {
        $this->created = new \DateTime();
        $this->question = $question;
        $this->value = $value;
    }
}
