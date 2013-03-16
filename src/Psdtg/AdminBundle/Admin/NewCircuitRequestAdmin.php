<?php
namespace Psdtg\AdminBundle\Admin;

use Psdtg\SiteBundle\Entity\Requests\Request;
use Psdtg\SiteBundle\Entity\Requests\NewCircuitRequest;
use Sonata\AdminBundle\Form\FormMapper;

class NewCircuitRequestAdmin extends RequestAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $subject = $this->getSubject();
        $disabled = ($subject->getStatus() === Request::STATUS_APPROVED);
        $formMapper
            ->add('techFactsheetNo', null, array('label' => 'Αριθμός Τεχνικού Δελτίου'))
            ->add('circuitType', 'choice', array('disabled' => $disabled, 'choices' => NewCircuitRequest::getNewCircuitRequestTypes(), 'label' => 'Τύπος Κυκλώματος'))
        ;
    }
}