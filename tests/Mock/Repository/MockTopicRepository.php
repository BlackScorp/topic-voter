<?php

namespace BlackScorp\TopicVoter\Test\Mock\Repository;

use BlackScorp\TopicVoter\Entity\TopicEntity;
use BlackScorp\TopicVoter\Repository\TopicRepository;

class MockTopicRepository implements TopicRepository
{
    /**
     * @var TopicEntity[]
     */
    private array $entities = [];


    /**
     * MockTopicRepository constructor.
     * @param TopicEntity[] $entites
     */
    public function __construct(array $entites = [])
    {
        $this->entities = $entites;
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return TopicEntity[]
     */
    public function findAll(int $limit, int $offset): array
    {
        return array_slice($this->entities, $offset, $limit);
    }

    public function findBySlug(string $slug): ?TopicEntity
    {
        foreach ($this->entities as $entity) {
            if ($slug === $entity->getSlug()) {
                return $entity;
            }
        }
        return null;
    }

    public function saveOrUpdate(TopicEntity $entity): void
    {
        foreach ($this->entities as $index => $storageEntity) {
            if ($storageEntity->getId() === $entity->getId()) {
                $this->entities[$index] = $entity;
            }
        }
    }

    public function add(TopicEntity $entity): void
    {
        // TODO: Implement add() method.
    }
}
