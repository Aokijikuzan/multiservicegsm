<?php

namespace MultiServiceGsm\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Marque
 *
 * @ORM\Table(name="marque")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\FrontBundle\Repository\MarqueRepository")
 */
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
    *@ORM\Entity
    *@UniqueEntity(fields="nomMarque",message="Une marque existe déjà avec ce nom.")
    */
class Marque
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
     * @ORM\Column(name="nomMarque", type="string", length=255)
     */
    private $nomMarque;

    /**
    *@Gedmo\Slug(fields={"nomMarque"})
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Marque
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nomMarque
     *
     * @param string $nomMarque
     *
     * @return Marque
     */
    public function setNomMarque($nomMarque)
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    /**
     * Get nomMarque
     *
     * @return string
     */
    public function getNomMarque()
    {
        return $this->nomMarque;
    }
    public function __toString()
    {
        return $this->nomMarque;
    }



    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Marque
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
