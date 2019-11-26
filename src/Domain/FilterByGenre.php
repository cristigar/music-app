<?php

declare(strict_types=1);

function filterByGenre(array $songs, string $genre): array
{
    return array_values(
        array_filter(
            $songs,
            function ($song) use ($genre) {
                return $song['genre'] === $genre;
            }
        )
    );
}
