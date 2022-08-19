<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Service\Parser;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Omines\DataTablesBundle\Adapter\ArrayAdapter;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;
use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductListController extends AbstractController
{

    #[Route('/product/list2', name: 'app_product_list2')]
    public function showAction(ManagerRegistry $doctrine, Request $request, DataTableFactory $dataTableFactory, ProductRepository $repository)
    {
        $entityManager = $doctrine->getManager();
        $products = $entityManager->getRepository(Product::class)->findAll();

        $products;

        $products2 = $repository->getAllAsArray();

        $table = $dataTableFactory->create()
            ->add('id', TextColumn::class)
            ->add('sku', TextColumn::class)
            ->add('name', TextColumn::class)
            ->add('description', TextColumn::class)
            ->add('price', TextColumn::class)
            ->createAdapter(ArrayAdapter::class, $products2)
            ->handleRequest($request);

        if ($table->isCallback()) {
            return $table->getResponse();
        }

        return $this->render('product_list/list.html.twig', ['datatable' => $table]);
    }
}
