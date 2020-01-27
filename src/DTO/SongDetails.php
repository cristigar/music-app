<?php

namespace DTO;

class SongDetails
{
    private int $id;
    private string $artist;
    private string $title;
    private string $genre;
    private string $path;

    public function __construct(int $id, string $artist, string $title, string $genre, string $path)
    {
        $this->id = $id;
        $this->artist = $artist;
        $this->title = $title;
        $this->genre = $genre;
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}
