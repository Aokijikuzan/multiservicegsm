<?php

namespace MultiServiceGsm\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="MultiServiceGsm\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    protected $nom;
     
    /**
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     *
     */
    protected $adressepostal; 

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return User
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
     * Set adressepostal
     *
     * @param string $adressepostal
     *
     * @return User
     */
    public function setAdressepostal($adressepostal)
    {
        $this->adressepostal = $adressepostal;

        return $this;
    }

    /**
     * Get adressepostal
     *
     * @return string
     */
    public function getAdressepostal()
    {
        return $this->adressepostal;
    }
}
