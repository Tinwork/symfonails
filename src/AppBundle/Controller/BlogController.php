<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

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
     * @route("/", name="front_article_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request) {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        // Handle request and populate data from the request form into the form
        $form->handleRequest($request);
        if ($form->isValid()) {
            $article->setCreatedAt();
            var_dump($article);
            // retrieve the orm system
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('sucess', "L'article {$article->getTitle()} a été crée");

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

    /**
     * @route("/blog/show", name="admin_article_index")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request) {

        $article = $this->getDoctrine()
            ->getRepository(Article::Class)
            ->findAll();

        return $this->render('blog/list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'articles'  => $article
        ]);
    }
}