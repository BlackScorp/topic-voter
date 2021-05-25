<?php

namespace BlackScorp\TopicVoter\Repository;

use BlackScorp\TopicVoter\Entity\TopicEntity;

interface TopicRepository
{
    /**
     * @return TopicEntity[]
     */
    public function findAll(int $limit, int $offset): array;

    public function findBySlug(string $slug): ?TopicEntity;

    public function saveOrUpdate(TopicEntity $entity): void;

    public function add(TopicEntity $entity): void;
}
