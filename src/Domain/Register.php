<?php

include ("BD.php");

$email = $_POST['email'] ?? '';

$first_name = $_POST['first_name'] ?? '';

$last_name = $_POST['last_name'] ?? '';

$password = $_POST['password'] ?? '';

$repassword = $_POST['repassword'] ?? '';

if (empty($email) or empty($first_name) or empty($last_name) or empty($password) or empty($repassword))
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

if ($password != $repassword)
{
    exit("Пароль и повторение пароля не совподают , вернитесб назад и проверьте правильность паролей.");
}

$email = stripslashes($email);
$email = htmlspecialchars($email);

$first_name = stripslashes($first_name);
$first_name = htmlspecialchars($first_name);

$last_name = stripslashes($last_name);
$last_name = htmlspecialchars($last_name);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$repassword = stripslashes($repassword);
$repassword = htmlspecialchars($repassword);


$email = trim($email);
$first_name = trim($first_name);
$last_name = trim($last_name);
$password = trim($password);
$repassword = trim($repassword);

$result = mysqli_query($db , "SELECT * FROM usersprofile WHERE EMAIL='$email'");
$myrow = mysqli_fetch_array($result);

if (!empty($myrow['LAST_NAME'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

$result2 = mysqli_query ($db ,"INSERT INTO usersprofile (EMAIL , FIRST_NAME , LAST_NAME , PASSWORD) VALUES('$email','$first_name','$last_name','$password')");

if ($result2=='TRUE')
{
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../../index.html'>Главная страница</a>";
}
else {
    echo "Ошибка! Вы не зарегистрированы.";
}
?>