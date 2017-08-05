<?php

namespace MultiServiceGsm\UserBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
class AdresseType extends AbstractType 
{
    private $em;
    private $requestStack;
    /*
    public function __construct(EntityManagerInterface $em,RequestStack $requestStack)
    {
        $this->em=$em;
        $this->requestStack=$requestStack;
    }
    */
    public function __construct()
    {
       
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('rue')->add('complement')->add('ville')->add('codepostal')->add('telephone');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MultiServiceGsm\UserBundle\Entity\Adresse'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'multiservicegsm_userbundle_adresse';
    }


}
