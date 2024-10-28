<?php

namespace App\Controller;

use App\Entity\Account;
use App\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccountController extends AbstractController
{
    #[Route('/accounts', name: 'account_index')]
    public function index(Request $request, AccountRepository $accountRepository): Response
    {
        $page = $request->query->getInt('page', 1);
        $paginator = $accountRepository->findPaginatedAccounts($page);

        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
            'accounts' => $paginator,
            'current_page' => $page,
            'total_pages' => ceil(count($paginator) / AccountRepository::COMMENTS_PER_PAGE),
        ]);
    }

    #[Route('/accounts/{id}', name: 'account_show')]
    public function show(Account $account): Response
    {
        return $this->render('account/show.html.twig', [
            'controller_name' => 'AccountController',
            'account' => $account,
        ]);
    }
}
