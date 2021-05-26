<?php declare(strict_types=1);

namespace BlackScorp\TopicVoter\UseCase;

use BlackScorp\TopicVoter\Hydrator\TopicEntityHydrator;
use BlackScorp\TopicVoter\MessageStream\CreateNewTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\Validator\CreateNewTopicValidator;
use DateTime;

class CreateNewTopicUseCase
{
    private CreateNewTopicValidator $validator;
    private TopicEntityHydrator $topicHydrator;
    private TopicRepository $repository;

    /**
     * CreateNewTopicUseCase constructor.
     */
    public function __construct(CreateNewTopicValidator $validator, TopicEntityHydrator $topicHydrator, TopicRepository $repository)
    {
        $this->validator = $validator;
        $this->topicHydrator = $topicHydrator;
        $this->repository = $repository;
    }

    public function process(CreateNewTopicMessageStream $messageStream): bool
    {
        if (!$this->validator->isValid($messageStream)) {
            return false;
        }
        $entity = $this->topicHydrator->fromArray([
            'id' => 0,
            'title' => $messageStream->getTitle(),
            'content' => $messageStream->getContent(),
            'slug' => $messageStream->getSlug(),
            'created' => new DateTime(),
        ]);
        $this->repository->add($entity);

        return true;
    }
}
