<?php

namespace BlackScorp\TopicVoter\MessageStream;

interface CreateNewTopicMessageStream
{
    public function getTitle(): string;

    public function getContent(): string;

    public function getSlug(): string;

    public function hasErrors(): bool;
}
