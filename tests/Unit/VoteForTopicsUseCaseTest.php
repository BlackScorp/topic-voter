<?php

namespace BlackScorp\TopicVoter\Test\Unit;

use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\MessageStream\VoteForTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\Test\Mock\MessageStream\MockVoteForTopicMessageStream;
use BlackScorp\TopicVoter\Test\Mock\Repository\MockTopicRepository;
use BlackScorp\TopicVoter\UseCase\VoteForTopicUseCase;
use BlackScorp\TopicVoter\View\TopicView;
use PHPUnit\Framework\TestCase;

class VoteForTopicsUseCaseTest extends TestCase
{
    /**
     * @param VoteForTopicMessageStream $messageStream
     * @param TopicEntity[] $entities
     */
    public function executeUseCase(VoteForTopicMessageStream $messageStream, array $entities): void
    {
        $repository = new MockTopicRepository($entities);
        $useCase = new VoteForTopicUseCase($repository);
        $useCase->process($messageStream);
    }
    public function testCanVoteUp(): void
    {
        $entity = new TopicEntity(1, 'test', 'test text', 'test-slug', new \DateTime('2019-12-31'));


        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-slug';
        $messageStream->isUpVote = true;

        $this->executeUseCase($messageStream, [$entity]);
        /** @var TopicView $topic */
        $topic = $messageStream->topic;

        $this->assertNotNull($topic);
        $this->assertEquals(1, $topic->voteCounter);
    }
    public function testCanVoteDown(): void
    {
        $entity = new TopicEntity(1, 'test', 'test text', 'test-slug', new \DateTime('2019-12-31'));

        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-slug';
        $messageStream->isDownVote = true;

        $this->executeUseCase($messageStream, [$entity]);
        /** @var TopicView $topic */
        $topic = $messageStream->topic;

        $this->assertNotNull($topic);
        $this->assertEquals(-1, $topic->voteCounter);
    }
    public function testEntityNotFound(): void
    {
        $entity = new TopicEntity(1, 'test', 'test text', 'test-slug', new \DateTime('2019-12-31'));

        $messageStream = new MockVoteForTopicMessageStream();
        $messageStream->slug = 'test-invalid-slug';

        $this->executeUseCase($messageStream, [$entity]);
        /** @var TopicView $topic */
        $topic = $messageStream->topic;

        $this->assertNull($topic);
    }
}
