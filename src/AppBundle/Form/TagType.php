<?php 
// src/AppBundle/Form/Type/TagType.php
namespace AppBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\CallbackTransformer;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Tag;

class TagType extends AbstractType {

    /**
     * Build Form
     */
    public function buildForm(FormBuilderInterface $builder, array $opts) {
        $builder
        // Name
        ->add('label', TextType::class, [
            'label' => 'name',
            'required' => true
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Tag::class
        ]);
    }
}