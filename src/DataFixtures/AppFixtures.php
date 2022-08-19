<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Service\Parser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $parser = new Parser();
        $parser->openFile('data.json');
        $elements = $parser->getElements();

        foreach ($elements as $element) {
            $product = $manager->getRepository(Product::class)->findOneBy([
                'sku' => $element->SKU
            ]);

            if (!$product) {
                $product = new Product();
                $product->setSku($element->SKU);
                $product->setName($element->name);
                $product->setDescription($element->description);
                $product->setPrice((float)$element->price * 100);
                $product->setCurrency($element->currency);
                $product->setDiscount($element->discount);
                $manager->persist($product);
            }
        }
        $manager->flush();
    }
}
