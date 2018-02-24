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


class ProspectAdminType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('status', EntityType::class, array(
                'label' => 'Status',
                'class' => 'AppBundle:Status',
                'choice_label' => 'label',
                'expanded' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
            ))
            ->add('loftType', EntityType::class, array(
                'label' => 'Vous habitez ?',
                'class' => 'AppBundle:LoftType',
                'choice_label' => 'label',
                'expanded' => true,
            ))
            ->add('heatSystem', EntityType::class, array(
                'label' => 'Votre système de chauffage principale ?',
                'class' => 'AppBundle:HeatSystem',
                'choice_label' => 'label',
                'expanded' => true,
            ))
            ->add('livrableSurface', TextType::class, [
                'label' => 'Superficie habitable :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('loftSurface', TextType::class, [
                'label' => 'Superficie de vos combles :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('household', TextType::class, [
                'label' => 'Personne dans le foyer :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('incomeTaxReference', TextType::class, [
                'label' => 'Votre revenu fiscal de référence :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('zipCode', TextType::class, [
                'label' => 'Code Postal :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
//            ->add('lastUpdate', DateType::class, [
//                'label' => 'Date de publication'
//
//            ])
            ->add('callAvailability', EntityType::class, array(
                'label' => 'Vos disponibilités pour vous contactez',
                'class' => 'AppBundle:CallAvailability',
                'choice_label' => 'label',
                'expanded' => true,
                'attr' => [
                    'class' => ''
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
