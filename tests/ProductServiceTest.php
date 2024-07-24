<?php

namespace ProgrammerZamanNow\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class ProductServiceTest extends TestCase
{
    private ProductRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
        $this->repository = $this->createStub(ProductRepository::class); // objek bohongan 
        $this->service = new ProductService($this->repository);
    }

    public function testStub()
    {
        $product = new Product();
        $product->setId('1');

        $this->repository->method('findById')
            ->willReturn($product);

        $result = $this->repository->findById('1');
        Assert::assertSame($product, $result);
    }

    public function testStubMap()
    {
        $product1 = new Product();
        $product1->setId('1');

        $product2 = new Product();
        $product2->setId('2');

        $map = [
            ['1', $product1],
            ['2', $product2]
        ];

        $this->repository->method('findById')
            ->willReturnMap($map);

        Assert::assertSame($product1, $this->repository->findById('1'));
        Assert::assertSame($product2, $this->repository->findById('2'));
    }

    public function testStubCallBack()
    {
        $this->repository->method('findById')
            ->willReturnCallback(function ($id) {
                $product = new Product();
                $product->setId($id);
                return $product;
            });

        Assert::assertEquals('1', $this->repository->findById('1')->getId());
        Assert::assertEquals('2', $this->repository->findById('2')->getId());
        Assert::assertEquals('3', $this->repository->findById('3')->getId());
    }

    public function testRegisterSuccess()
    {
        $this->repository->method('findById')->willReturn(null);
        $this->repository->method('save')->willReturnArgument(0);

        $product = new Product();
        $product->setId('1');
        $product->setName('Product 1');

        $result = $this->service->register($product);

        Assert::assertEquals($product->getId(), $result->getId());
        Assert::assertEquals($product->getName(), $result->getName());
    }

    public function testRegisterFailed()
    {
        $this->expectException(\Exception::class);

        $productInDB = new Product();
        $productInDB->setId('1');

        $this->repository->method('findById')
            ->willReturn($productInDB);

        $product = new Product();
        $product->setId('1');
        $product->setName('Product 1');

        $this->service->register($product);
    }

    public function testDelete()
    {
        $product = new Product();
        $product->setId('1');

        $this->repository->method('findById')
            ->willReturn($product);

        $this->service->delete("1");
        Assert::assertTrue(true, "Success delete");
    }

    public function testDeleteFailed()
    {
        $this->expectException(\Exception::class);
        $this->repository->method('findById')
            ->willReturn(null);

        $this->service->delete('1');
    }
}
