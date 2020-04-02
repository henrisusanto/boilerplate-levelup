<?php

declare(strict_types = 1);

namespace Src\Application\Entity;

use Src\Domain\UserAuth\RepositoryInterface\UserRepositoryInterface;
use Src\Domain\UserAuth\Entity\User as UserDomainEntity;

class User implements UserRepositoryInterface
{
    public function create (UserDomainEntity $user)
    {
    	return "INSERT INTO `user` (`username`, `password`) VALUES ('{$user->username()}', MD5('{$user->password()}'))";
    }
}