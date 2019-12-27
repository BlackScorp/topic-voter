<?php

namespace BlackScorp\TopicVoter\Test\Unit;

use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\MessageStream\VoteForTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\Test\Mock\MessageStream\MockVoteForTopicMessageStream;
use BlackScorp\TopicVoter\Test\Mock\Repository\MockTopicRepository;
use BlackScorp\TopicVoter\UseCase\VoteForTopicUseCase;
use PHPUnit\Framework\TestCase;

class VoteForTopicsUseCaseTest extends TestCase
{
    public function executeUseCase(VoteForTopicMessageStream $messageStream,array $entities){
        $repository = new MockTopicRepository($entities);
        $useCase = new VoteForTopicUseCase($repository);
        $useCase->process($messageStream);
    }
    public function testCanVoteUp(){

        $entity = new TopicEntity(1,'test','test text','test-slug',new \DateTime('2019-12-31'));


        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-slug';
        $messageStream->isUpVote = true;

        $this->executeUseCase($messageStream,[$entity]);

        $this->assertEquals(1,$messageStream->topic->voteCounter);
    }
    public function testCanVoteDown(){

        $entity = new TopicEntity(1,'test','test text','test-slug',new \DateTime('2019-12-31'));

        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-slug';
        $messageStream->isDownVote = true;

        $this->executeUseCase($messageStream,[$entity]);

        $this->assertEquals(-1,$messageStream->topic->voteCounter);
    }
    public function testEntityNotFound(){

        $entity = new TopicEntity(1,'test','test text','test-slug',new \DateTime('2019-12-31'));

        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-invalid-slug';

        $this->executeUseCase($messageStream,[$entity]);

        $this->assertNull($messageStream->topic);
    }
}
