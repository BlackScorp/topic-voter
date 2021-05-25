<?php

namespace BlackScorp\TopicVoter\MessageStream;

use BlackScorp\TopicVoter\View\TopicView;

interface VoteForTopicMessageStream
{
    public function getSlug(): string;

    public function isUpVote(): bool;

    public function setTopic(TopicView $topicView): void;

    public function isDownVote(): bool;
}
