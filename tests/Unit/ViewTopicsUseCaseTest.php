<?php

namespace BlackScorp\TopicVoter\Test\Unit;


use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\Test\Mock\MessageStream\MockListTopicMessageStream;
use BlackScorp\TopicVoter\Test\Mock\Repository\MockTopicRepository;
use BlackScorp\TopicVoter\UseCase\ListTopicsUseCase;
use PHPUnit\Framework\TestCase;

class ViewTopicsUseCaseTest extends TestCase
{
    public function testTopicListIsEmpty(){


        $listTopicMessageStream = new MockListTopicMessageStream();
        $this->executeUseCase($listTopicMessageStream);
        $this->assertEmpty($listTopicMessageStream->topics);
    }

    public function testListHasAnEntry(){
        $entities = [];
        $entities[]=new TopicEntity(1,'Test titel','test content',new \DateTime('2019-11-22 13:37:00'));

        $listTopicMessageStream = new MockListTopicMessageStream();
        $this->executeUseCase($listTopicMessageStream,$entities);
        $this->assertNotEmpty($listTopicMessageStream->topics);
    }

    /**
     * @param MockListTopicMessageStream $listTopicMessageStream
     */
    public function executeUseCase(MockListTopicMessageStream $listTopicMessageStream,array $entites = []): void
    {
        $topicRepository = new MockTopicRepository($entites);
        $useCase = new ListTopicsUseCase($topicRepository);
        $useCase->process($listTopicMessageStream);

    }
}
