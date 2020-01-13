<?php


namespace BlackScorp\TopicVoter\Test\Mock\MessageStream;


use BlackScorp\TopicVoter\MessageStream\VoteForTopicMessageStream;
use BlackScorp\TopicVoter\View\TopicView;

class MockVoteForTopicMessageStream implements VoteForTopicMessageStream
{

    public ?TopicView $topic = null;
    public $slug = "";
    public $isUpVote = false;
    public $isDownVote = false;
    public function getSlug()
    {
        return $this->slug;
    }

    public function isUpVote()
    {
       return $this->isUpVote;
    }

    public function setTopic(TopicView $topicView)
    {
       $this->topic = $topicView;
    }

    public function isDownVote()
    {
      return $this->isDownVote;
    }


}