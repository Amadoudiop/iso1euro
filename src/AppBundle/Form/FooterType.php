<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FooterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('twitter_link',TextType::class,[
                'label' => 'Lien Twitter :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('facebook_link',TextType::class,[
                'label' => 'Lien Facebook :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('linkedin_link',TextType::class,[
                'label' => 'Lien LinkedIn :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('copyright',TextType::class,[
                'label' => 'Copyright :',
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Footer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_footer';
    }


}
