<?php

namespace Tnt\UseCase;

abstract class AbstractUseCase
{
    /** @var  string[] */
    private $messages = [];

    public function __construct()
    {
        $this->messages = [];
    }

    /**
     * @return string[]
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param string[] $messages
     */
    protected function addMessages(array $messages)
    {
        $this->messages = array_merge($this->messages, $messages);
    }

    /**
     * @param AbstractRequest $request
     * @return bool
     */
    abstract public function execute($request);
}
