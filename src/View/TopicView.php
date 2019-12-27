<?php


namespace BlackScorp\TopicVoter\View;


use BlackScorp\TopicVoter\Entity\TopicEntity;

class TopicView
{
    public int $id = 0;
    public int $voteCounter =0 ;

    /**
     * TopicView constructor.
     * @param TopicEntity $entity
     */
    public function __construct(TopicEntity $entity)
    {
        $this->id = $entity->getId();
        $this->voteCounter = $entity->getVoteCounter();
    }

}