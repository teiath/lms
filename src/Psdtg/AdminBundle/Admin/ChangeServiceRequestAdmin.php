<?php
namespace Psdtg\AdminBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;

class ChangeServiceRequestAdmin extends ActivateServiceRequestAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper, array('isService' => true));
    }
}