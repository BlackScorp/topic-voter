<?php


namespace BlackScorp\TopicVoter\Repository;


interface TopicRepository
{

    public function findAll(int $limit,int $offset);
}