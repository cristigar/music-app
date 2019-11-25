<?php

declare(strict_types=1);

function filterByGenre(array $songs, string $genre): array
{
    $result = [];
    foreach ($songs as $song) {
        if ($song['genre'] === $genre) {
            $result[] = $song;
        }
    }

    return $result;
}
