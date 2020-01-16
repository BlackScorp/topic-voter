<?php


namespace BlackScorp\TopicVoter\Hydrator;


use BlackScorp\TopicVoter\Entity\TopicEntity;

class TopicEntityHydrator
{

    public function fromArray(array $data)
    {
        $entity = new TopicEntity(   $data['id'], $data['title'], $data['content'], $data['slug'],$data['created']);

        return $entity;
    }
}