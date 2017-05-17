<?php

namespace MultiServiceGsm\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\FrontBundle\Repository\TarifRepository")
 */
class Tarif
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


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
     * Set prix
     *
     * @param float $prix
     *
     * @return Tarif
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }
     /**
     *@ORM\ManyToOne(targetEntity="MultiServiceGsm\FrontBundle\Entity\Modele")
     *@ORM\JoinColumn(nullable=false)
     */
     private $model;
     
     /**
     *@ORM\ManyToOne(targetEntity="MultiServiceGsm\FrontBundle\Entity\Reparation")
     *@ORM\JoinColumn(nullable=false)
     */
     private $reparation;


    /**
     * Set model
     *
     * @param \MultiServiceGsm\FrontBundle\Entity\Modele $model
     *
     * @return Tarif
     */
    public function setModel(\MultiServiceGsm\FrontBundle\Entity\Modele $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \MultiServiceGsm\FrontBundle\Entity\Modele
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set reparation
     *
     * @param \MultiServiceGsm\FrontBundle\Entity\Reparation $reparation
     *
     * @return Tarif
     */
    public function setReparation(\MultiServiceGsm\FrontBundle\Entity\Reparation $reparation)
    {
        $this->reparation = $reparation;

        return $this;
    }

    /**
     * Get reparation
     *
     * @return \MultiServiceGsm\FrontBundle\Entity\Reparation
     */
    public function getReparation()
    {
        return $this->reparation;
    }

}
