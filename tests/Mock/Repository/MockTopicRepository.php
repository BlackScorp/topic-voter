<?php


namespace BlackScorp\TopicVoter\Test\Mock\Repository;


use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\Repository\TopicRepository;

class MockTopicRepository implements TopicRepository
{
    private array $entities = [];
    /**
     * MockTopicRepository constructor.
     */
    public function __construct(array $entites = [])
    {
        $this->entities = $entites;
    }

    /**
     * @return TopicEntity[]|[]
     */
    public function findAll():array
    {
        return $this->entities;
    }

}