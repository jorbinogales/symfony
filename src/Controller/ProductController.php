<?php

declare(strict_types=1);

namespace App\Controller;

use Timestamps;
use App\Entity\Product;
use App\Form\Type\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractApiController{

    public function index(Request $request): Response
    {

        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();

        return $this->json($products);
    }


    public function new(Request $request): Response
    {


        $form = $this->buildForm(ProductType::class);

        $form->handleRequest($request);


        if (!$form->isSubmitted() && !$form->isValid()) {

            return $this->respond($form, Response::HTTP_BAD_RQUEST);

        }

        /**  @var Product $product **/
        $product = $form->getData();

        $this->getDoctrine()->getManager()->persist($product);

        $this->getDoctrine()->getManager()->flush();
 
        return $this->json($product);
    }

}