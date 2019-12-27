<?php


namespace BlackScorp\TopicVoter\MessageStream;


use BlackScorp\TopicVoter\View\TopicView;

interface VoteForTopicMessageStream
{

    public function getSlug();

    public function isUpVote();

    public function setTopic(TopicView $topicView);

    public function isDownVote();
}