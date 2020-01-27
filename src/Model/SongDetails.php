<?php

namespace App\Model;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../mysqliConnection.php';

class SongDetails
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

    public function uploadSong()
    {
        $allowed = array('mp3', 'ogg', 'wav','flac');
        $extension = pathinfo($_FILES['track']['name'], PATHINFO_EXTENSION);
        if(!in_array(strtolower($extension), $allowed)){
            return false;
        }
        move_uploaded_file($_FILES["track"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . '/songs/' . $_FILES["track"]["name"]);
        chmod($_SERVER['DOCUMENT_ROOT'] . '/songs/' . $_FILES["track"]["name"], 0777);//удалить чужой файл

        $artist = mysqli_real_escape_string($this->connect,$_POST['artist']);
        $title = mysqli_real_escape_string($this->connect,$_POST['title']);
        $genre = mysqli_real_escape_string($this->connect,$_POST['genre']);
        $path = $_FILES["track"]["name"];

        if (empty($artist) || empty($title) || empty($genre) ||empty($path))
        {
            return false;
        }
        $result = mysqli_query($this->connect, "INSERT INTO uploaded_songs (artist,title,genre,path) VALUES ('$artist','$title' ,'$genre','$path') ");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            return false;
        }
        return true;
    }

    public function getUploadSong()
    {
        $result = mysqli_query($this->connect, "SELECT * FROM uploaded_songs");
        $songs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $songs[] = new \App\DTO\SongDetails($row['id'],$row['artist'], $row['title'], $row['genre'], $row['path']);
        }
        return $songs;
    }

    public function deleteUploadedSong()
    {
        $result = mysqli_query($this->connect, "DELETE FROM uploaded_songs  WHERE id={$_GET['id']}");
        if (!$result) {
            printf("Сообщение ошибки: %s\n", mysqli_error($this->connect));
            exit();
        }

    }

}
