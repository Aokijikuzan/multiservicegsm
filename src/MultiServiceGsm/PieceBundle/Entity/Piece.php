<?php

namespace MultiServiceGsm\PieceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Piece
 *
 * @ORM\Table(name="piece")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\PieceBundle\Repository\PieceRepository")
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponible", type="boolean")
     */
    private $disponible;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
    *@Gedmo\Slug(fields={"nomPiece"})
    *@ORM\column(length=255, unique=true)
    */
    private $slug;

    /**
     *@ORM\ManyToOne(targetEntity="MultiServiceGsm\FrontBundle\Entity\Modele")
     *@ORM\JoinColumn(nullable=false)
     */
     private $model;



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
     * @return bool
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Piece
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
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
}
