<?php

namespace BlackScorp\TopicVoter\Repository;

use BlackScorp\TopicVoter\Entity\TopicEntity;

interface TopicRepository
{
    /**
     * @param int $limit
     * @param int $offset
     * @return TopicEntity[]
     */
    public function findAll(int $limit, int $offset): array;

    public function findBySlug(string $slug): ?TopicEntity;

    public function saveOrUpdate(TopicEntity $entity): void;

    public function add(TopicEntity $entity): void;
}
