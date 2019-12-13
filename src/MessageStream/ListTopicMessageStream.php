<?php


namespace BlackScorp\TopicVoter\MessageStream;


use BlackScorp\TopicVoter\View\TopicView;

interface ListTopicMessageStream
{

    public function addTopic(TopicView $view);
}