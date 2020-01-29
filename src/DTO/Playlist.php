<?php


namespace App\DTO;


class Playlist
{
    private int $id;
    private string $title;
    private int $userId;

    public function __construct(int $id, string $title, int $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

}