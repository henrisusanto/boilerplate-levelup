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
		try
		{
			$user = new DomainEntity\User($username, $password);
			$this->userConcreteRepo->create($user);
			return 'success';
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

}