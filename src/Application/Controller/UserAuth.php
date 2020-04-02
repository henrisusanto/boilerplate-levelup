<?php

declare(strict_types = 1);

namespace Src\Application\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Src\Domain\UserAuth\Service as DomainService;
use Src\Application\Entity\User as DBUser;

class UserAuth
{
    /**
     * @Route("/UserAuth/AdminCreateUser", name="AdminCreateUser")
     */
    public function AdminCreateUser (Request $request)
    {
        try {
            $repositoryConcrete = new DBUser();
            $domainService = new DomainService\AdminCreateUser($repositoryConcrete);
            $response = $domainService->execute($request->query->get('username'), $request->query->get('password'));
            return new Response($response);
        } catch (Exception $error) {
            return new Response($error->getMessage());
        }
    }
}