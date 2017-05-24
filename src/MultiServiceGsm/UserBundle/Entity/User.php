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


     /**
     * @ORM\Column(type="string", length="255")
     *
     * @Assert\NotBlank(message="Entrer votre nom ,s'il vous plait.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="Le nom est trop court.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="Le nom est trop long.", groups={"Registration", "Profile"})
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length="255")
     *
     * @Assert\NotBlank(message="Entrer votre prénom ,s'il vous plait.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="Le prénom est trop court.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="Le prénom est trop long.", groups={"Registration", "Profile"})
     */
    protected $lastname;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
}

