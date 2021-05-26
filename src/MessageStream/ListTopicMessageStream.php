<?php declare(strict_types=1);

namespace BlackScorp\TopicVoter\MessageStream;

use BlackScorp\TopicVoter\View\TopicView;

interface ListTopicMessageStream
{
    public function addTopic(TopicView $view): void;

    public function getLimit(): int;

    public function getOffset(): int;
}
