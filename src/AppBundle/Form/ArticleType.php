<?php

namespace AppBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType {

    /**
     * Build Form
     * build form and generate html..
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        // Add form
        $builder
        // Title
        ->add('Title', TextType::class, [
            'label' => 'Titre'
        ])
        // Textarea
        ->add('Description', TextareaType::class, [
            'label' => 'Description'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Article'
        ]);
    }
}

// class Article {

//     /**
//      * @var integer
//      * 
//      * @ORM\Column(name="id", type="integer")
//      * @ORM\Id
//      * @ORM\GeneratedValue(strategy="AUTO")
//      */
//     private $id;

//     /**
//      * @var string
//      *
//      * @ORM\Column(type="string")
//      */
//     private $title;

//     /**
//      * @var string
//      *
//      * @ORM\Column(type="datetime")
//      */
//     private $createdAt;

//     /**
//      * @var string
//      *
//      * @ORM\Column(type="text")
//      */
//      private $content;

//      /**
//       * Get Title
//       * @return string
//       */
//      public function getTitle() {
//          return $this->tilte;
//      }

//      /**
//       * Get Title
//       * @return string
//       */
//      public function getCreatedAt() {
//          return $this->createdAt;
//      }

//      /**
//       * Get Title
//       * @return string
//       */
//      public function getContent() {
//          return $this->content;
//      }

//      /**
//       * Set Title
//       * @void
//       * @var string
//       */
//      public function setTitle($title) {
//         $this->tilte = $title;
//     }

//     /**
//       * Set Created At
//       * @void
//       * @var string
//       */
//     public function setCreatedAt($createdAt) {
//         $this->createdAt = $createdAt;
//     }

//     /**
//       * Set Content
//       * @void
//       * @var string
//       */
//     public function setContent($content) {
//         $this->content = $content;
//     }
// }