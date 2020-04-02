<?php

declare(strict_types = 1);

namespace Src\Domain\UserAuth\Service;

use Src\Domain\UserAuth\RepositoryInterface\UserRepositoryInterface as RepoIface;
use Src\Domain\UserAuth\Entity as DomainEntity;

class AdminCreateUser
{

	protected $userConcreteRepo;

	public function __construct (RepoIface $userConcreteRepo)
	{
		$this->userConcreteRepo = $userConcreteRepo;
	}

	public function execute (string $username, string $password)
	{
		$user = new DomainEntity\User($username, $password);
		return $this->userConcreteRepo->create($user);
	}

}