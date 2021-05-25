<?php

namespace BlackScorp\TopicVoter\UseCase;

use BlackScorp\TopicVoter\MessageStream\VoteForTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\View\TopicView;

class VoteForTopicUseCase
{
    private TopicRepository $topicRepository;

    /**
     * VoteForTopicUseCase constructor.
     * @param TopicRepository $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }


    public function process(VoteForTopicMessageStream $messageStream): bool
    {
        $entity = $this->topicRepository->findBySlug($messageStream->getSlug());
        if (!$entity) {
            return false;
        }
        if ($messageStream->isUpVote()) {
            $entity->increaseVoteCounter();
        }
        if ($messageStream->isDownVote()) {
            $entity->decreaseVoteCounter();
        }
        $topicView = new TopicView($entity);
        $messageStream->setTopic($topicView);
        $this->topicRepository->saveOrUpdate($entity);
        return true;
    }
}
