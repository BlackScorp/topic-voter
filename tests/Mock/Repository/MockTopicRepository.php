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
     * @param int $limit
     * @param int $offset
     * @return TopicEntity[]|[]
     */
    public function findAll(int $limit,int $offset):array
    {
        return array_slice($this->entities,$offset,$limit);
    }

}