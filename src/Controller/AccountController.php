<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\AccountType;
use App\Repository\AccountRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Routing\Attribute\Route;

class AccountController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

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

    #[Route('/accounts/new', name: 'account_new')]
    public function new(
        Request $request,
        NotifierInterface $notifier
        ): Response
    {
        $account = new Account();
        $account->setAssignedTo($this->getUser());
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($account);
            $this->entityManager->flush();
            
            $notifier->send(new Notification('Your created new Account!', ['browser']));

            return $this->redirectToRoute('account_index');
        }

        return $this->render('account/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/accounts/{id}', name: 'account_show')]
    public function show(Account $account): Response
    {
        return $this->render('account/show.html.twig', [
            'account' => $account,
        ]);
    }

    #[Route('/account/{id}/edit', name: 'account_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Account $account,
        NotifierInterface $notifier
        ): Response
    {
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($account);
            $this->entityManager->flush();

            $notifier->send(new Notification('Your changes were saved!', ['browser']));

            return $this->redirectToRoute('account_show', ['id' => $account->getId()]);
        }

        return $this->render('account/edit.html.twig', [
            'account' => $account,
            'form' => $form->createView(),
        ]);
    }
}
