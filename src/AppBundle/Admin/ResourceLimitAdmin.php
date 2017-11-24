<?php
/**
 * Created by PhpStorm.
 * User: creemson
 * Date: 02/11/17
 * Time: 12:21
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ResourceLimitAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('household', 'text')
            ->add('resource', 'text')
            ->add('isIleDeFrance', 'choice',[
                'choices' => array(
                    'oui' => true,
                    'non' =>  false,
                ),
                'expanded' => true,

            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('household');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('household');
    }
}