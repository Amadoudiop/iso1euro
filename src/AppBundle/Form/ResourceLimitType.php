<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ResourceLimitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('household', TextType::class, [
                'label' => 'Personne dans le foyer :',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('resource', TextType::class, [
                'label' => 'Revenu fiscal :',
                'attr' => [
                    'class' => 'form-control'
                ],
            ])
            ->add('isIleDeFrance');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ResourceLimit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_resourcelimit';
    }


}
