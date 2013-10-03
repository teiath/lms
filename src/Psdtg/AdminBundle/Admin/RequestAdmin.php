<?php
namespace Psdtg\AdminBundle\Admin;

use Psdtg\SiteBundle\Entity\Requests\NewCircuitRequest;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;



abstract class RequestAdmin extends Admin
{
    protected $datagridValues = array(
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'id' // name of the ordered field (default = the model id
    );

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('unit.mmId')
            ->add('unit.name')
            ->add('unit.state')
            ->add('unit.categoryName')
            ->add('unit.fy')
            ->add('createdBy')
            ->add('status', 'trans')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('unit', 'mmunit', array('required' => true))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
            )))
            ->addIdentifier('id')
            ->add('unit.name')
            ->add('unit.categoryName')
            ->add('unit.fy')
            ->add('status', 'trans')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('unit', null, array(), 'mmunit')
            ->add('unit.categoryName', null, array(), 'mmcategory', array('required' => false))
            ->add('unit.fyName', null, array(), 'mmfy', array('required' => false))
            ->add('unit.state', null, array(), 'choice', array('choices' => array('ΕΝΕΡΓΗ' => 'ΕΝΕΡΓΗ', 'ΚΑΤΑΡΓΗΜΕΝΗ' => 'ΚΑΤΑΡΓΗΜΕΝΗ', 'ΣΕ ΑΝΑΣΤΟΛΗ' => 'ΣΕ ΑΝΑΣΤΟΛΗ')))
            ->add('createdBy', null, array(), null, array('attr' => array('placeholder' => 'LDAP Username')))
            ->add('status', null, array(), 'choice', array('choices' => NewCircuitRequest::getStatuses()))
        ;
    }

    public function isAclEnabled() {
        return false;
    }
}