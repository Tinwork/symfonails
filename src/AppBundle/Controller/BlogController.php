<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/articles", name="app_blog_articles_index")
     * @Method({"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::blog/index.html.twig', []);
    }

    /**
     * @Route("/article", name="app_blog_article_show")
     * @Method({"GET"})
     * @param Request $request
     */
    public function showAction(Request $request)
    {

    }

    /**
     * @Route("/article/new", name="app_blog_article_new")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this->addFlash('success', "L'article {$article->getTitle()} a bien été créé !");

            return $this->render('app_blog_articles_index');
        }

        return $this->render('app_blog_articles_index');
    }

    /**
     * @Route("/article/delete", name="app_blog_article_delete")
     * @Method({"DELETE"})
     * @param Request $request
     */
    public function deleteAction(Request $request)
    {

    }

    /**
     * @Route("/article/edit", name="app_blog_article_edit")
     * @Method({"PUT", "PATCH})
     * @param Request $request
     */
    public function editAction(Request $request)
    {

    }
}
