<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tag;
use AppBundle\Form\TagType;
use Doctrine\Common\Collections\ArrayCollection;

class TagController extends controller {

    protected $tag;

    public function __construct() {
        $this->tag = new Tag();
    }

    /**
     * Index Action
     */
    public function indexAction(Request $request) {
        return $this->render('tag/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Add Action
     * @route("/tag/new", name="tag_add")
     * @Method({"GET", "POST"})
     */
    public function addAction(Request $request) {
        $form = $this->createForm(TagType::Class, $this->tag);

        $form->handleRequest($request);
        if ($form->isValid()) {
            var_dump($this->tag);

            // Retrieve the ORM system
            $em = $this->getDoctrine()->getManager();
            $em->persist($this->tag);
            $em->flush();

            return $this->redirectToRoute('tag_list');
        }

        return $this->render('tag/new.html.twig', [
            'tag' => $this->tag,
            'form' => $form->createView()
        ]);
    }

    /**
     * Remove Action
     * @route("/tag/delete", name="tag_delete")
     * @Method({"GET", "POST"})
     */
    public function removeAction(Request $request) {

    }

    /**
     * List Action
     * @route("/tag/list", name="tag_list")
     * @Method({"GET", "POST"})
     */
    public function listAction(Request $request) {
        $tags = $this->getDoctrine()
            ->getRepository(Tag::Class)
            ->findAll();

        return $this->render('tag/list.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'tags' => $tags
        ]);
    }
}