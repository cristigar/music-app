<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "GetSongsList.php";

function get_genre(): array{

	$songs = getSongs();
	$all_genre = [];
	foreach ($songs as $song) {
			$all_genre[] = $song['genre'];
	}
	return array_unique($all_genre);
}