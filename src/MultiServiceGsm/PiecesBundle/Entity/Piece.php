<?php

namespace MultiServiceGsm\PiecesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Piece
 *
 * @ORM\Table(name="piece")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\PiecesBundle\Repository\PieceRepository")
 */
class Piece
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
     * @ORM\Column(name="nomPiece", type="string", length=255)
     */
    private $nomPiece;

    /**
    *@Gedmo\Slug(fields={"nomPiece"})
    *@ORM\column(length=255, unique=true)
    */
    private $slug;

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
     * @return Piece
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
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

     /**
     * @var boolean
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;
    
    /**
     * Set model
     *
     * @param \MultiServiceGsm\FrontBundle\Entity\Modele $model
     *
     * @return Piece
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
     * Set nomPiece
     *
     * @param string $nomPiece
     *
     * @return Piece
     */
    public function setNomPiece($nomPiece)
    {
        $this->nomPiece = $nomPiece;

        return $this;
    }

    /**
     * Get nomPiece
     *
     * @return string
     */
    public function getNomPiece()
    {
        return $this->nomPiece;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Piece
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

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Piece
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set disponible
     *
     * @param boolean $disponible
     *
     * @return Piece
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return boolean
     */
    public function getDisponible()
    {
        return $this->disponible;
    }
}
