<?php
/**
 * Created by PhpStorm.
 * User: creemson
 * Date: 01/11/17
 * Time: 18:39
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProspectAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstName', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('email')
            ->add('zipCode')
            ->add('city');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, [
                'route' => [
                    'name' => 'show'
                ]
            ])
            ->add('email')
            ->add('city');
    }

    public function getExportFormats()
    {
        return array('csv', 'pdf');
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->tab('Profil')
                ->with('Addresses', [
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-primary'
                ])
                    ->add('firstName')
                    ->add('name')
                    ->add('email')
                    ->add('phone')
                    ->add('zipCode')
                    ->add('city')
                ->end()
            // ...
            ->end()
            ->tab('Maison')
                ->with('Addresses', [
                    'class'       => 'col-md-8',
                    'box_class'   => 'box box-solid box-primary'
                ])
                    ->add('loftType.label')
                    ->add('heatSystem.label')
                    ->add('livrableSurface')
                    ->add('household')
                    ->add('incomeTaxReference')
                ->end()
            ->end();
    }

    public function toString($object)
    {
        return $object instanceof Prospect
            ? $object->getTitle()
            : 'Prospect'; // shown in the breadcrumb on the create view
    }
}
