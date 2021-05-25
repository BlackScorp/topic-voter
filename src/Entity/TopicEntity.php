<?php

namespace BlackScorp\TopicVoter\Entity;

use DateTime;

class TopicEntity
{
    private int $id;
    private int $voteCounter = 0;
    private string $slug;
    private string $title;
    private string $text;
    private DateTime $created;

    /**
     * TopicEntity constructor.
     * @param int $id
     * @param string $title
     * @param string $text
     * @param string $slug
     * @param DateTime $created
     */
    public function __construct(int $id, string $title, string $text, string $slug, DateTime $created)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->title = $title;
        $this->text = $text;
        $this->created = $created;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function increaseVoteCounter(): void
    {
        $this->voteCounter++;
    }
    public function decreaseVoteCounter(): void
    {
        $this->voteCounter--;
    }
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getVoteCounter(): int
    {
        return $this->voteCounter;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
