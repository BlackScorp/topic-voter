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
    private string  $title = "";
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
        $this->title = $titel;
    }

    public function getId():int
    {
        return $this->id;
    }
    public function increaseVoteCounter():void{
        $this->voteCounter++;
    }
    public function decreaseVoteCounter():void{
        $this->voteCounter--;
    }
    public function getSlug():string{
        return $this->slug;
    }

    public function getVoteCounter():int
    {
        return $this->voteCounter;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


}