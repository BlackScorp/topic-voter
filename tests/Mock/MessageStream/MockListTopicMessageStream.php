<?php


namespace BlackScorp\TopicVoter\Test\Mock\MessageStream;


use BlackScorp\TopicVoter\MessageStream\ListTopicMessageStream;
use BlackScorp\TopicVoter\View\TopicView;

class MockListTopicMessageStream implements ListTopicMessageStream
{
    public array $topics = [];

    public function addTopic(TopicView $view):void
    {
        $this->topics[]=$view;
    }

}