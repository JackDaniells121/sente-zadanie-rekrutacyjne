<?php

namespace App\Tests\Unit;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class appTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testEnvironmentSetUpAssertTrue(): void{
        $this->assertTrue(true);
    }

    public function testEnvironmentSetUpAssertFalse(): void{
        $this->assertFalse(false);
    }

    public function testProductSearchBySku()
    {
        $product = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['sku' => 'SEN-b0dbc']);

        $this->assertSame('SEN-b0dbc', $product->getSku());
    }

    public function testProductPrice()
    {
        $product = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['sku' => 'SEN-b0dcd']);

        $this->assertSame(20.17, $product->getPrice());
    }

    public function testProductPriceAfterDiscount()
    {
        $product = $this->entityManager
            ->getRepository(Product::class)
            ->findOneBy(['sku' => 'SEN-b0dd2']);

        $price = 7.86;
        $discount = 4;
        $finalPrice = $price * (100 - $discount) / 100;

        $this->assertSame(round($finalPrice,2), round($product->getPriceAfterDiscount(), 2));
    }

}