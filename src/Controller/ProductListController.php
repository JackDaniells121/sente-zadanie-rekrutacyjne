<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\Parser;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductListController extends AbstractController
{
    private array $products;

    public function __construct(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $this->products = $entityManager->getRepository(Product::class)->findAll();
    }

    #[Route('/product/list', name: 'app_product_list')]
    public function showAction()
    {
        return $this->render('product_list/list.html.twig', ['products' => $this->products]);
    }
}
