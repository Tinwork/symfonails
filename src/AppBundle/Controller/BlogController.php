<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;
use AppBundle\Entity\Tag;
use AppBundle\Form\ArticleType;

class BlogController extends controller {

    public function __construct() {
        $this->tag = new Tag();
    }

    /** 
     * @Route("/blog", name="hello")
     */
    public function indexAction(Request $request) {
        return $this->render('blog/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /** 
     * @route("/blog/create", name="front_article_create")
     * @Method({"GET", "POST"})
     */
    public function createAction(Request $request) {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        // Handle request and populate data from the request form into the form
        $form->handleRequest($request);
        if ($form->isValid()) {
            $article->setCreatedAt();
            // Set the tag
            $this->tag->setTag($article->getTitle());
            $article->setTags($this->tag);

            // retrieve the orm system
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $em->persist($this->tag);
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

    /**
     * @route("/blog/articles/{tagID}", name="blog_show_article_by_tag")
     * @Method({"GET", "POST"})
     */
    public function showByTagAction(Request $request, $tagID) {
        $tag = $this->getDoctrine()
            ->getRepository(Tag::Class)
            ->findOneById($tagID);

        $articles = $this->getDoctrine()
            ->getRepository('AppBundle:Article')
            ->findByTags($tag);

        return $this->render('blog/list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'articles' => $articles
        ]);
    }

    /**
     * @route("/blog/update", name="admin_article_update")
     * @Method({"GET", "POST"})
     */
    public function updateAction(Request $request, $id) {
        $article = $this->getDoctrine()
            ->getRepository(Article::Class)
            ->findOneById($id);
        
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->validateProcess($article);
            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

    /**
     * @route("/blog/delete/{id}", name="blog_article_remove")
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, $id) {
        $article = $this->getDoctrine()
            ->getRepository(Article::Class)
            ->findOneById($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute("admin_article_index");
    }

    /**
     * Validate Process
     * @param {Object} $article
     */
    private function validateProcess($article) {
        $article->setCreatedAt();
        // retrieve the orm system
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        $this->addFlash('sucess', "L'article {$article->getTitle()} a été mise à jour");
    }
}