<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LandingPageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('header_title',TextType::class,[
                'label' => 'Header - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('header_subtitle',TextType::class,[
                'label' => 'Header - Sous titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('header_button',TextType::class,[
                'label' => 'Header - Bouton :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('first_title',TextType::class,[
                'label' => 'Bloc 1 - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('first_description')
            ->add('first_button',TextType::class,[
                'label' => 'Bloc 1 - Bouton :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('second_title',TextType::class,[
                'label' => 'Bloc 2 - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('second_description')
            ->add('second_button',TextType::class,[
                'label' => 'Bloc 2 - bouton :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('third_title',TextType::class,[
                'label' => 'Bloc 3 - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('third_description')
            ->add('third_button',TextType::class,[
                'label' => 'Bloc 3 - bouton :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('fourth_title',TextType::class,[
                'label' => 'Bloc 4 - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('fourth_description')
            ->add('fourth_button',TextType::class,[
                'label' => 'Bloc 4 - bouton :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('fifth_title',TextType::class,[
                'label' => 'Bloc 5 - Titre :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('fifth_description');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\LandingPage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_landingpage';
    }


}
