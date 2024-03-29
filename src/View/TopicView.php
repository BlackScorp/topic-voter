<?php declare(strict_types=1);

namespace BlackScorp\TopicVoter\View;

use BlackScorp\TopicVoter\Entity\TopicEntity;

class TopicView
{
    public int $id = 0;
    public int $voteCounter = 0;
    public string $title = '';

    /**
     * TopicView constructor.
     */
    public function __construct(TopicEntity $entity)
    {
        $this->id = $entity->getId();
        $this->title = $entity->getTitle();
        $this->voteCounter = $entity->getVoteCounter();
    }
}
