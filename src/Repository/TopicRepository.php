<?php


namespace BlackScorp\TopicVoter\Repository;


use BlackScorp\TopicVoter\Entity\TopicEntity;

interface TopicRepository
{

    public function findAll(int $limit,int $offset);

    public function findBySlug(string $slug) : ?TopicEntity;

    public function saveOrUpdate(TopicEntity $entity);

    public function add(TopicEntity $entity);
}