<?php

namespace App\Controller\Admin;

use App\Entity\Commandes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CommandesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commandes::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date'),
            IntegerField::new('total'),
            AssociationField::new('parent'),
            AssociationField::new('client'),
            AssociationField::new('paiement')

        ];
    }

}
