<?php


namespace BlackScorp\TopicVoter\Entity;


class TopicEntity
{
    /**
     * @var int
     */
    private int $id;
    private int $voteCounter = 0;
    private string $slug = "";
    /**
     * TopicEntity constructor.
     * @param int $int
     * @param string $string
     * @param string $string1
     * @param \DateTime $param
     */
    public function __construct(int $id, string $titel, string $text,string $slug, \DateTime $created)
    {
        $this->id = $id;
        $this->slug = $slug;
    }

    public function getId()
    {
        return $this->id;
    }
    public function increaseVoteCounter(){
        $this->voteCounter++;
    }
    public function decreaseVoteCounter(){
        $this->voteCounter--;
    }
    public function getSlug(){
        return $this->slug;
    }

    public function getVoteCounter()
    {
        return $this->voteCounter;
    }
}