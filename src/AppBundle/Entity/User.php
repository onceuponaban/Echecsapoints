<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\DBAL\Types\JsonArrayType;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPartiesJouees", type="integer")
     */
    private $nbPartiesJouees;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPartiesGagnees", type="integer")
     */
    private $nbPartiesGagnees;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPtsTotal", type="integer")
     */
    private $nbPtsTotal;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPtsLaisses", type="integer")
     */
    private $nbPtsLaisses;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="password",type="string")
     */
    private $password;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="salt",type="string")
     */
    
    private $salt;
    
    /**
     * @var JsonArrayType
     * 
     * @ORM\Column(name="roles",type="json_array")
     * 
     */
    private $roles;

    
    /**
     * 
     * @var Collection
     * 
     * @ORM\OneToMany(targetEntity="Play",mappedBy="user")
     *  
     */
    
    private $play;

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
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return User
     */
    public function setUsername($pseudo)
    {
        $this->username = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set nbPartiesJouees
     *
     * @param integer $nbPartiesJouees
     *
     * @return User
     */
    public function setNbPartiesJouees($nbPartiesJouees)
    {
        $this->nbPartiesJouees = $nbPartiesJouees;

        return $this;
    }

    /**
     * Get nbPartiesJouees
     *
     * @return int
     */
    public function getNbPartiesJouees()
    {
        return $this->nbPartiesJouees;
    }

    /**
     * Set nbPartiesGagnees
     *
     * @param integer $nbPartiesGagnees
     *
     * @return User
     */
    public function setNbPartiesGagnees($nbPartiesGagnees)
    {
        $this->nbPartiesGagnees = $nbPartiesGagnees;

        return $this;
    }

    /**
     * Get nbPartiesGagnees
     *
     * @return int
     */
    public function getNbPartiesGagnees()
    {
        return $this->nbPartiesGagnees;
    }

    /**
     * Set nbPtsTotal
     *
     * @param integer $nbPtsTotal
     *
     * @return User
     */
    public function setNbPtsTotal($nbPtsTotal)
    {
        $this->nbPtsTotal = $nbPtsTotal;

        return $this;
    }

    /**
     * Get nbPtsTotal
     *
     * @return int
     */
    public function getNbPtsTotal()
    {
        return $this->nbPtsTotal;
    }

    /**
     * Set nbPtsLaisses
     *
     * @param integer $nbPtsLaisses
     *
     * @return User
     */
    public function setNbPtsLaisses($nbPtsLaisses)
    {
        $this->nbPtsLaisses = $nbPtsLaisses;

        return $this;
    }

    /**
     * Get nbPtsLaisses
     *
     * @return int
     */
    public function getNbPtsLaisses()
    {
        return $this->nbPtsLaisses;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->play = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add play
     *
     * @param \AppBundle\Entity\Play $play
     *
     * @return User
     */
    public function addPlay(\AppBundle\Entity\Play $play)
    {
        $this->play[] = $play;

        return $this;
    }

    /**
     * Remove play
     *
     * @param \AppBundle\Entity\Play $play
     */
    public function removePlay(\AppBundle\Entity\Play $play)
    {
        $this->play->removeElement($play);
    }

    /**
     * Get play
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlay()
    {
        return $this->play;
    }
    
    /**
     * {@inheritDoc}
     * @see \Symfony\Component\Security\Core\User\UserInterface::eraseCredentials()
     */
    public function eraseCredentials()
    {
        // TODO Auto-generated method stub
        
    }
    public function getPassword()
    {
        
        return $this->password;
    }

    public function getSalt()
    {
        return $this->salt;
        
    }

    public function getRoles()
    {
        return $this->roles;
        
    }



    
    
}