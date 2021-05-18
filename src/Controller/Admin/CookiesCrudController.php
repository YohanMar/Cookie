<?php

namespace App\Controller\Admin;

use App\Entity\Cookies;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class CookiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cookies::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Libelle'),
            ColorField::new('Color'),
        ];
    }
    
}
