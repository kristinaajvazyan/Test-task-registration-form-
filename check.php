<?php
$login=filter_var(trim$_POST['login']), FILTER_SANITIZE_STRING);
$name=filter_var(trim$_POST['name']), FILTER_SANITIZE_STRING);
$pass=filter_var(trim$_POST['pass']), FILTER_SANITIZE_STRING);
$confpass=filter_var(trim$_POST['confpass']), FILTER_SANITIZE_STRING);
$email=filter_var(trim$_POST['email']), FILTER_SANITIZE_STRING);

if(mb_strlen($login)<6||mb_strlen($login)>90)
{
  echo"Недопустимая длина логина";
  exit();
}

else if(mb_strlen($name)<2 || mb_strlen($name)>50)
{
  echo "Недоступная длина имени";
  exit();
}

else if(mb_strlen($pass)<6 || mb_strlen($pass)>50)
{
  echo "Недоступная длина пароля";
  exit();
}

$pass=md($pass."соль+md5");
$mysql=new mysqli('localhost', 'root', 'root', 'register-bg');
$mysql->query("INSERT INTO `users`(`login`, `pass`, `cpassword`, `name`,
  `email`) VALUES('$login',
  '$pass', '$name', '$confpass', '$email')");

mysql->close();

header('Location: /');
?>
