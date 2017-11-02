<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

class ArticleController extends Controller
{
    /**
     * @Route("/article", name="article_index")
     * œMethod({"GET"})
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('article/index.html.twig');
    }

    /**
     * @Route("/", name="article_index")
     * œMethod({"GET", "POST"})
     */
    public function createAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            $this-addFlash('success', "L'article {$article->getTitle()} a été crée!");

            return $this->render('article/index.html.twig');
        }

        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView()
        ]);
    }

}