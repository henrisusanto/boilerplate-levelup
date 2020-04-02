<?php

declare(strict_types = 1);

namespace Src\Domain\UserAuth\Entity;

class User
{
    private $username;
    private $password;

    public function __construct ($username, $password)
    {
    	$this->username = $username;
    	$this->password = $password;
    }

    public function username() :string
    {
    	return $this->username;
    }

    public function password() :string
    {
    	return $this->password;
    }
}