<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends controller {

    /** 
     * @Route("/blog", name="hello")
     */
    public function indexAction(Request $request) {
        return $this->render('blog/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /** 
     * @Route("/", name="front_article_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request) {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        // Handle request and populate data from the request form into the form
        $form->handleRequest($request);
        if ($form->isValid()) {
            // retrieve the orm system
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('sucess', "L'article {$article->getTitle()} a été crée");

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/Article/new', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }
}