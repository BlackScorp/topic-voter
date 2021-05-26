<?php declare(strict_types=1);

namespace BlackScorp\TopicVoter\UseCase;

use BlackScorp\TopicVoter\MessageStream\ListTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\View\TopicView;

class ListTopicsUseCase
{
    private TopicRepository $repository;

    /**
     * ListTopicsUseCase constructor.
     */
    public function __construct(TopicRepository $repository)
    {
        $this->repository = $repository;
    }

    public function process(ListTopicMessageStream $listTopicMessageStream): bool
    {
        $entities = $this->repository->findAll($listTopicMessageStream->getLimit(), $listTopicMessageStream->getOffset());
        if (0 === count($entities)) {
            return false;
        }
        foreach ($entities as $entity) {
            $view = new TopicView($entity);

            $listTopicMessageStream->addTopic($view);
        }

        return true;
    }
}
