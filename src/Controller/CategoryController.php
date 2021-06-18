<?php

declare(strict_types=1);

namespace App\Controller;

use Timestamps;
use App\Entity\Category;
use App\Form\Type\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractApiController{

    public function index(Request $request): Response
    {

        $categoryes = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->json($categoryes);
    }


    public function new(Request $request): Response
    {


        $form = $this->buildForm(CategoryType::class);

        $form->handleRequest($request);


        if (!$form->isSubmitted() && !$form->isValid()) {

            return $this->respond($form, Response::HTTP_BAD_RQUEST);

        }

        /**  @var Category $category **/
        $category = $form->getData();

        $this->getDoctrine()->getManager()->persist($category);

        $this->getDoctrine()->getManager()->flush();
 
        return $this->json($category);
    }

}