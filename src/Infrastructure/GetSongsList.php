<?php

declare(strict_types=1);

function getSongs(): array
{
    $listOfSongs = json_decode(file_get_contents('../../src/Infrastructure/songs_list.json'), true);
    return $listOfSongs;
}
