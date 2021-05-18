<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Users;
use App\Entity\Clients;
use App\Entity\Commandes;
use App\Entity\Cookies;
use App\Entity\Paiements;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Users', 'fas fa-user', Users::class);
         yield MenuItem::linkToCrud('Clients', 'fas fa-hand-holding-usd', Clients::class);
         yield MenuItem::linkToCrud('Commandes', 'fas fa-box', Commandes::class);
         yield MenuItem::linkToCrud('Cookies', 'fas fa-cookie', Cookies::class);
         yield MenuItem::linkToCrud('Paiements', 'fas fa-money-check-alt', Paiements::class);
    }
}
