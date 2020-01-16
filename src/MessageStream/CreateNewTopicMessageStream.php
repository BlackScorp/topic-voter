<?php


namespace BlackScorp\TopicVoter\MessageStream;


interface CreateNewTopicMessageStream
{

    public function getTitle();

    public function getContent();

    public function getSlug();

    public function hasErrors();
}