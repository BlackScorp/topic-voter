<?php

namespace BlackScorp\TopicVoter\Hydrator;

use BlackScorp\TopicVoter\Entity\TopicEntity;

class TopicEntityHydrator
{
    /**
     * @param array{id: int, title:string, content:string, slug:string, created: \DateTime} $data
     */
    public function fromArray(array $data): TopicEntity
    {
        return new TopicEntity($data['id'], $data['title'], $data['content'], $data['slug'], $data['created']);
    }
}
