<?php

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Src\Domain\UserAuth\RepositoryInterface\UserRepositoryInterface as UserRepositoryInterface;
use Src\Domain\UserAuth\Service\AdminCreateUser as AdminCreateUserService;

class UserAuth extends TestCase
{
    private $userRepositoryTest;

    private $adminCreateUserService;

    public function setUp ()
    {
    	$this->userRepositoryTest = $this->getMockBuilder(UserRepositoryInterface::class)->getMock();
    	$this->adminCreateUserService = new AdminCreateUserService($this->userRepositoryTest);
    }

    public function testAdminCreateUser ()
    {
    	$this->assertEquals("success",$this->adminCreateUserService->execute('henri', 'susanto'));
    }
}