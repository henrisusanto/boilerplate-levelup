<?php

declare(strict_types = 1);

namespace Src\Domain\UserAuth\RepositoryInterface;
use Src\Domain\UserAuth\Entity\User as DomainEntity;

interface UserRepositoryInterface
{
    public function create (DomainEntity $domainEntity);
}