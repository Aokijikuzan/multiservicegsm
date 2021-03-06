<?php
// src/MultiServiceGsm/UserBundle/Form/RegistrationType.php

namespace MultiServiceGsm\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    
    public function buildForm(FormBuilder $builder, array $options)
{
    parent::buildForm($builder, $options);
    $builder->remove('username');  // we use email as the username
    //..
}
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getPrenom()
    {
        return $this->getBlockPrefix();
    }

     public function getNom()
    {
        return $this->getBlockPrefix();
    }
     public function getAdressepostal()
    {
        return $this->getBlockPrefix();
    }

}