<?php

namespace BlackScorp\TopicVoter\Test\Unit;


use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\Test\Mock\MessageStream\MockListTopicMessageStream;
use BlackScorp\TopicVoter\Test\Mock\Repository\MockTopicRepository;
use BlackScorp\TopicVoter\UseCase\ListTopicsUseCase;
use BlackScorp\TopicVoter\View\TopicView;
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
        $listTopicMessageStream->limit = 1;
        $this->executeUseCase($listTopicMessageStream,$entities);
        $this->assertNotEmpty($listTopicMessageStream->topics);
    }
    public function testListWithLimit(){
        $topics = [];
        $topics[] = new TopicEntity(1,'Test topic 1','This is an test content 1',new \DateTime());
        $topics[] = new TopicEntity(2,'Test topic 2','This is an test content 2',new \DateTime());

        $listTopicMessageStream = new MockListTopicMessageStream();
        $listTopicMessageStream->limit = 1;
        $this->executeUseCase($listTopicMessageStream,$topics);
        $this->assertNotEmpty($listTopicMessageStream->topics);
        $this->assertCount(1,$listTopicMessageStream->topics);
    }
    public function testListWithOffset(){
        $topics = [];
        $topics[] = new TopicEntity(1,'Test topic 1','This is an test content 1',new \DateTime());
        $expectedTopic = new TopicEntity(2,'Test topic 2','This is an test content 2',new \DateTime());
        $topics[] = $expectedTopic;
        $expectedTopic = new TopicView($expectedTopic);

        $listTopicMessageStream = new MockListTopicMessageStream();
        $listTopicMessageStream->limit = 1;
        $listTopicMessageStream->offset = 1;
        $this->executeUseCase($listTopicMessageStream,$topics);
        $actualTopic = $listTopicMessageStream->topics[0];

        $this->assertNotEmpty($listTopicMessageStream->topics);
        $this->assertCount(1,$listTopicMessageStream->topics);
        $this->assertEquals($expectedTopic,$actualTopic);
        $this->assertSame($expectedTopic->id,$actualTopic->id);
    }
    /**
     * @param MockListTopicMessageStream $listTopicMessageStream
     * @param array $entites
     */
    public function executeUseCase(MockListTopicMessageStream $listTopicMessageStream,array $entites = []): void
    {
        $topicRepository = new MockTopicRepository($entites);
        $useCase = new ListTopicsUseCase($topicRepository);
        $useCase->process($listTopicMessageStream);

    }
}
