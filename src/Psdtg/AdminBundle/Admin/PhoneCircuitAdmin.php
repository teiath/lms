<?php
namespace Psdtg\AdminBundle\Admin;

use Psdtg\SiteBundle\Entity\Circuits\PhoneCircuit;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PhoneCircuitAdmin extends CircuitAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('type', 'choice', array('choices' => PhoneCircuit::getTypes()))
            ->add('number')
            /*->add('adsl', 'sonata_type_collection', array(), array(
                'edit' => 'inline',
                'inline' => 'table',
            ))*/
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        parent::configureListFields($listMapper);
        $listMapper
            ->add('type', 'trans')
            ->add('number')
            ->add('adsl.id', 'boolean')
            ->add('adsl.profile', 'trans')
            ->add('adsl.realspeed', 'trans')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
        $datagridMapper

        ;
    }
}