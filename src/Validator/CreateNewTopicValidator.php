<?php declare(strict_types=1);

namespace BlackScorp\TopicVoter\Validator;

use BlackScorp\TopicVoter\MessageStream\CreateNewTopicMessageStream;

abstract class CreateNewTopicValidator
{
    protected CreateNewTopicMessageStream $messageStream;

    public function isValid(CreateNewTopicMessageStream $messageStream): bool
    {
        $this->messageStream = $messageStream;
        $this->validate();

        return false === $this->messageStream->hasErrors();
    }

    abstract protected function validate(): void;
}
