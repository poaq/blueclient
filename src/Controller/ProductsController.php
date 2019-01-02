<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ApiClient;

class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(ApiClient $client)
    {
        $products = $client->getAllProducts();

        return $this->render('products/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/products/getAll", name="products_all")
     */
    public function getAllProducts(ApiClient $client)
    {

        $result = $client->getAllProducts();

        return $this->render('products/index.html.twig', [
            'products' => $result,
        ]);
    }

    /**
     * @Route("/products/overFive", name="products_over_five")
     */
    public function getProductsOverFive(ApiClient $client)
    {

        $result = $client->getProductsWithOverFiveAmount();

        return $this->render('products/index.html.twig', [
            'products' => $result,
        ]);
    }

    /**
     * @Route("/products/notAviable", name="products_not_aviable")
     */
    public function getProductsNotAviaveble(ApiClient $client)
    {

        $result = $client->getProductsWithZeroAmount();

        return $this->render('products/index.html.twig', [
            'products' => $result,
        ]);
    }

    /**
     * @Route("/products/add/{name}/{amount}", name="products_add")
     */
    public function addProduct(string $name, int $amount,ApiClient $client)
    {

        $result = $client->addProduct($name, $amount);


        return $this->render('products/index.html.twig', [
            'response' => $result,
        ]);
    }

    /**
     * @Route("/products/edit/{id}/{name}/{amount}", name="products_edit")
     */
    public function editProduct(int $id, string $name, int $amount,ApiClient $client)
    {

        $result = $client->editProduct($id, $name, $amount);


        return $this->render('products/index.html.twig', [
            'response' => $result,
        ]);
    }

    /**
     * @Route("/products/delete/{id}", name="products_delete")
     */
    public function deleteProduct(int $id, ApiClient $client)
    {

        $result = $client->delete($id);

        return $this->render('products/index.html.twig', [
            'message' => $result,
        ]);
    }

}
