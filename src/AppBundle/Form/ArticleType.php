<?php

namespace AppBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
            'label' => 'Titre',
            'required' => true
        ])
        // Textarea
        ->add('Content', TextareaType::class, [
            'label' => 'Content',
            'required' => true
        ])
        // Description
        ->add('Description', TextareaType::class, [
            'label' => 'Description',
            'required' => true
        ])
        // Submit
        ->add('Submit', SubmitType::class, [
            'label' => 'Ajouter'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Article'
        ]);
    }
}