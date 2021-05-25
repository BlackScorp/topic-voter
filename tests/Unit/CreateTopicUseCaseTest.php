<?php

namespace BlackScorp\TopicVoter\Test\Unit;

use BlackScorp\TopicVoter\Hydrator\TopicEntityHydrator;
use BlackScorp\TopicVoter\MessageStream\CreateNewTopicMessageStream;
use BlackScorp\TopicVoter\Repository\TopicRepository;
use BlackScorp\TopicVoter\UseCase\CreateNewTopicUseCase;
use BlackScorp\TopicVoter\Validator\CreateNewTopicValidator;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversDefaultClass \BlackScorp\TopicVoter\UseCase\CreateNewTopicUseCase
 */
class CreateTopicUseCaseTest extends TestCase
{
    public function testCanCreateNewTopic(): void
    {
        $newTopicValidator = $this->getMockBuilder(CreateNewTopicValidator::class)->getMockForAbstractClass();
        $newTopicValidator->method('validate');

        $topicHydrator = new TopicEntityHydrator();

        $repository = $this->getMockBuilder(TopicRepository::class)->getMock();
        $repository->method('add');

        $messageStream = $this->getMockBuilder(CreateNewTopicMessageStream::class)->getMock();
        $messageStream->method('getTitle')->willReturn('testTitle');
        $messageStream->method('getContent')->willReturn('testContent');
        $messageStream->method('getSlug')->willReturn('testSlug');
        $messageStream->method('hasErrors')->willReturn(false);

        $useCase = new CreateNewTopicUseCase($newTopicValidator, $topicHydrator, $repository);

        $useCase->process($messageStream);

        $this->assertFalse($messageStream->hasErrors());
    }

    public function testValidationFailed(): void
    {
        $newTopicValidator = $this->getMockBuilder(CreateNewTopicValidator::class)->getMockForAbstractClass();
        $newTopicValidator->method('validate');

        $topicHydrator = new TopicEntityHydrator();

        $repository = $this->getMockBuilder(TopicRepository::class)->getMock();
        $messageStream = $this->getMockBuilder(CreateNewTopicMessageStream::class)->getMock();
        $messageStream->method('hasErrors')->willReturn(true);

        $useCase = new CreateNewTopicUseCase($newTopicValidator, $topicHydrator, $repository);

        $useCase->process($messageStream);
        $this->assertTrue($messageStream->hasErrors());
    }
}
