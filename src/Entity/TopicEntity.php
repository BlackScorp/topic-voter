<?php


namespace BlackScorp\TopicVoter\Entity;


class TopicEntity
{
    /**
     * @var int
     */
    private int $id;

    /**
     * TopicEntity constructor.
     * @param int $int
     * @param string $string
     * @param string $string1
     * @param \DateTime $param
     */
    public function __construct(int $id, string $titel, string $text, \DateTime $created)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}