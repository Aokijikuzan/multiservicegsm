<?php

namespace MultiServiceGsm\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Reparation
 *
 * @ORM\Table(name="reparation")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\FrontBundle\Repository\ReparationRepository")
 */
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
    *@ORM\Entity
    *@UniqueEntity(fields="nomReparation",message="Une réparation existe déjà avec ce nom.")
    */
class Reparation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="nomReparation", type="string", length=255)
     */
    private $nomReparation;


    /**
    *@Gedmo\Slug(fields={"nomReparation"})
    *@ORM\column(length=255, unique=true)
    */
    private $slug;

    

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomR
     *
     * @param string $nomR
     *
     * @return Reparation
     */
    public function setNomR($nomR)
    {
        $this->nomR = $nomR;

        return $this;
    }

    /**
     * Get nomR
     *
     * @return string
     */
    public function getNomR()
    {
        return $this->nomR;
    }

    


    /**
     * Set nomReparation
     *
     * @param string $nomReparation
     *
     * @return Reparation
     */
    public function setNomReparation($nomReparation)
    {
        $this->nomReparation = $nomReparation;

        return $this;
    }

    /**
     * Get nomReparation
     *
     * @return string
     */
    public function getNomReparation()
    {
        return $this->nomReparation;
    }

     public function __ToString()
    {
        return $this->nomReparation;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Reparation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
