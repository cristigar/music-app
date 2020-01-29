<?php


namespace App\Model;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../mysqliConnection.php';

class Playlist
{
    private $connect;

    public function __construct()
    {
        $this->connect = get_connection();
    }

    public function __destruct()
    {
       mysqli_close($this->connect);
    }

    public function createPlaylist($userId, $title)
    {
        $result = mysqli_query($this->connect, "INSERT INTO playlist SET user_id = '$userId', title = '$title' ");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
        }
    }

    public function getAllPlaylists()
    {
        $result = mysqli_query($this->connect, "SELECT * FROM playlist");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
        }
        $playlists = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $playlists[] = new \App\DTO\Playlist($row['id'],$row['title'], $row['user_id']);
        }
        return $playlists;
    }

    public function getPlaylistById($id)
    {
        $result = mysqli_query($this->connect, "SELECT * FROM playlist WHERE id='$id'");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
        }
        $row = mysqli_fetch_assoc($result);
       return new \App\DTO\Playlist($row['id'],$row['title'], $row['user_id']);
    }

    public function updatePlaylist($userId,$title,$id)
    {
        $result = mysqli_query($this->connect, "UPDATE playlist SET user_id = '$userId', title = '$title' WHERE id='$id'");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }
    }

    public function deletePlaylist($userId)
    {
        $result = mysqli_query($this->connect, "DELETE FROM playlist  WHERE id='$userId'");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }

    }


    public function getPlaylistsByUserId($userId)
    {
        $result = mysqli_query($this->connect, "SELECT * FROM playlist WHERE  user_id = '$userId'");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
        }
        $playlists = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $playlists[] = new \App\DTO\Playlist($row['id'],$row['title'], $row['user_id']);
        }
        return $playlists;
    }
}