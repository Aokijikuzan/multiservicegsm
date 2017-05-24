 src/MultiServiceGsm/UserBundle/Form/Type/RegistrationFormType.php
<?php

namespace MultiServiceGsm\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
	public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('name')
        		->add('lastname')
        ;
    }
    public function getParent()
    {
    	return 'fos_user_registration';
    }
    public function getName()
    {
        return 'multi_service_gsm_user_registration';
    }
/*
     public function getLastname()
    {
        return 'multi_service_gsm_user_registration';
    }
    */
}