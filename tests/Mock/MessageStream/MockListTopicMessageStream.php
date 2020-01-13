<?php


namespace BlackScorp\TopicVoter\Test\Mock\MessageStream;


use BlackScorp\TopicVoter\MessageStream\ListTopicMessageStream;
use BlackScorp\TopicVoter\View\TopicView;

class MockListTopicMessageStream implements ListTopicMessageStream
{
    public array $topics = [];
    public int $limit = 0;
    public int $offset = 0;
    public function addTopic(TopicView $view):void
    {
        $this->topics[]=$view;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getOffset()
    {
      return $this->offset;
    }

}