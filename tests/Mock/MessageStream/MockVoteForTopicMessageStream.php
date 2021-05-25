<?php

namespace BlackScorp\TopicVoter\Test\Mock\MessageStream;

use BlackScorp\TopicVoter\MessageStream\VoteForTopicMessageStream;
use BlackScorp\TopicVoter\View\TopicView;

class MockVoteForTopicMessageStream implements VoteForTopicMessageStream
{
    public ?TopicView $topic = null;
    public string $slug = "";
    public bool $isUpVote = false;
    public bool $isDownVote = false;

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function isUpVote(): bool
    {
        return $this->isUpVote;
    }

    public function setTopic(TopicView $topicView): void
    {
        $this->topic = $topicView;
    }

    public function isDownVote(): bool
    {
        return $this->isDownVote;
    }
}
