<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/* form input */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Doctrine\ORM\EntityRepository;


class ProspectType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('loftType', EntityType::class, array(
                'label' => 'Vous habitez ?',
                'class' => 'AppBundle:LoftType',
                'choice_label' => 'label',
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ))
            ->add('heatSystem', EntityType::class, array(
                'label' => 'Votre système de chauffage principale ?',
                'class' => 'AppBundle:HeatSystem',
                'choice_label' => 'formField',
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control'
                ],
            ))
            ->add('livrableSurface', TextType::class, [
                'label' => 'Superficie habitable :'
            ])
            ->add('loftSurface', TextType::class, [
                'label' => 'Superficie de vos combles :'
            ])
            ->add('household', TextType::class, [
                'label' => 'Personne dans le foyer :'
            ])
            ->add('incomeTaxReference', TextType::class, [
                'label' => 'Votre revenu fiscal de référence :'
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom :'
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom :'
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone :'
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code Postal :'
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville :'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :'
            ])
            ->add('callAvailability', EntityType::class, array(
                'label' => 'Vos disponibilités pour vous contactez',
                'class' => 'AppBundle:CallAvailability',
                'choice_label' => 'label',
                'expanded' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Prospect'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_prospect';
    }


}
