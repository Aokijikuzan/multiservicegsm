<?php

namespace MultiServiceGsm\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Utilisateur
 *
 * @ORM\Table(name="utilisateur")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\UserBundle\Repository\UtilisateurRepository")
 */
/**
    *@ORM\Entity
    *@UniqueEntity(fields="nom,prenom",message="Un utilisateur existe déjà avec ce nom et ce prénom.")
    */
class Utilisateur
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=14)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="adressepostale", type="string", length=255)
     */
    private $adressepostale;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=255)
     */
    private $complement;

    /**
     *@ORM\ManyToOne(targetEntity="MultiServiceGsm\UserBundle\Entity\User")
     *@ORM\JoinColumn(nullable=false)
     */
     private $user;

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
     * @return Utilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adressepostale
     *
     * @param string $adressepostale
     *
     * @return Utilisateur
     */
    public function setAdressepostale($adressepostale)
    {
        $this->adressepostale = $adressepostale;

        return $this;
    }

    /**
     * Get adressepostale
     *
     * @return string
     */
    public function getAdressepostale()
    {
        return $this->adressepostale;
    }

    /**
     * Set complement
     *
     * @param string $complement
     *
     * @return Utilisateur
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string

     */
    public function getComplement()
    {
        return $this->complement;
    }
    

    /**
     * Set adresse
     *
     * @param \MultiServiceGsm\UserBundle\Entity\Utilisateur $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse(\MultiServiceGsm\UserBundle\Entity\Utilisateur $adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \MultiServiceGsm\UserBundle\Entity\Utilisateur
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set user
     *
     * @param \MultiServiceGsm\UserBundle\Entity\User $user
     *
     * @return Utilisateur
     */
    public function setUser(\MultiServiceGsm\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MultiServiceGsm\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
