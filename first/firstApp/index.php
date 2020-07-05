<?php

function getBalance($userInfo)
{
	echo "User balance is {$userInfo[balance]}\n";
}

function getName($userInfo)
{
	echo "User name is {$userInfo[name]}\n";
}

function getEmail($userInfo)
{
	echo "User email is {$userInfo[email]}\n";
}


$userInfo = array('name' => 'anon', 'email' => '123@mail.ru', 'balance' => '1337');

getName($userInfo);
getEmail($userInfo);
getBalance($userInfo);

?>