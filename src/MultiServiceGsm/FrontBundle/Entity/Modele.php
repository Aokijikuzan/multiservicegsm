<?php

namespace MultiServiceGsm\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Modele
 *
 * @ORM\Table(name="modele")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\FrontBundle\Repository\ModeleRepository")
 */
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
    *@ORM\Entity
    *@UniqueEntity(fields="nomModele",message="Un modèle existe déjà avec ce nom.")
    */
class Modele
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
     * @ORM\Column(name="nomModele", type="string", length=255)
     */
    private $nomModele;

    
    /**
    *@Gedmo\Slug(fields={"nomModele"})
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
     * Set nomM
     *
     * @param string $nomM
     *
     * @return Modele
     */
    public function setNomM($nomM)
    {
        $this->nomM = $nomM;

        return $this;
    }

    /**
     * Get nomM
     *
     * @return string
     */
    public function getNomM()
    {
        return $this->nomM;
    }

    /**
     * Set nomModele
     *
     * @param string $nomModele
     *
     * @return Modele
     */
    public function setNomModele($nomModele)
    {
        $this->nomModele = $nomModele;

        return $this;
    }

    /**
     * Get nomModele
     *
     * @return string
     */
    public function getNomModele()
    {
        return $this->nomModele;
    }

     /**
     *@ORM\ManyToOne(targetEntity="MultiServiceGsm\FrontBundle\Entity\Marque")
     *@ORM\JoinColumn(nullable=false)
     */
     private $marque;

    /**
     * Set marque
     *
     * @param \MultiServiceGsm\FrontBundle\Entity\Marque $marque
     *
     * @return Modele
     */
    public function setMarque(\MultiServiceGsm\FrontBundle\Entity\Marque $marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \MultiServiceGsm\FrontBundle\Entity\Marque
     */
    public function getMarque()
    {
        return $this->marque;
    }
     public function __ToString()
    {
        
            return (string) $this->getNomModele();
       
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Modele
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
