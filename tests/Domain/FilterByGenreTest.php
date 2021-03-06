<?php

declare(strict_types=1);

require_once '../../src/Domain/FilterByGenre.php';

function testFilterByGenre() {
    $songs = [
        ['title' => 'Title 1', 'artist' => 'Artist 1', 'genre' => 'Genre 1'],
        ['title' => 'Title 2', 'artist' => 'Artist 2', 'genre' => 'Genre 2'],
        ['title' => 'Title 3', 'artist' => 'Artist 3', 'genre' => 'Genre 3'],
        ['title' => 'Title 4', 'artist' => 'Artist 4', 'genre' => 'Genre 3'],
        ['title' => 'Title 5', 'artist' => 'Artist 5', 'genre' => 'Genre 2'],
        ['title' => 'Title 6', 'artist' => 'Artist 6', 'genre' => 'Genre 3'],
    ];

    $genre = 'Genre 3';

    $result = filterByGenre($songs, $genre) === [
        ['title' => 'Title 3', 'artist' => 'Artist 3', 'genre' => 'Genre 3'],
        ['title' => 'Title 4', 'artist' => 'Artist 4', 'genre' => 'Genre 3'],
        ['title' => 'Title 6', 'artist' => 'Artist 6', 'genre' => 'Genre 3'],
    ];

    var_dump($result);
}

testFilterByGenre();
