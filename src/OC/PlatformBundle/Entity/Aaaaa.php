<?php

namespace OC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Aaaaa
 *
 * @ORM\Table(name="Aaaaa")
 * @ORM\Entity(repositoryClass="OC\PlatformBundle\Repository\AaaaaRepository")
 */
class Aaaaa
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
     * @var \DateTime
     *
     * @ORM\Column(name="datede", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $datede;
    
    
    
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateau", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $dateau;
    
     
 
    /**
     * @var float
     *
     * @ORM\Column(name="syndicestimer", type="integer")
     */
    public $syndicestimer;
    
    /**
     * @var float
     *
     * @ORM\Column(name="syndicreel", type="float")
     */
    private $syndicreel;
    
       
     public function __construct()
    {
       
        $this->datede = new \DateTime();
        $this->dateau = new \DateTime();
       
    }

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
     * Set datede
     *
     * @param \DateTime $datede
     *
     * @return Aaaaa
     */
    public function setDatede($datede)
    {
        $this->datede = $datede;

        return $this;
    }

    /**
     * Get datede
     *
     * @return \DateTime
     */
    public function getDatede()
    {
        return $this->datede;
    }
    
    /**
     * Set dateau
     *
     * @param \DateTime $datede
     *
     * @return Aaaaa
     */
    public function setdateau($dateau)
    {
        $this->dateau = $dateau;

        return $this;
    }

    /**
     * Get dateau
     *
     * @return \DateTime
     */
    public function getdateau()
    {
        return $this->dateau;
    }
    
    /**
     * Set syndicestimer
     *
     * @param float $syndicestimer
     *
     * @return Aaaaa
     */
    public function setsyndicestimer($syndicestimer)
    {
        $this->syndicestimer = $syndicestimer;

        return $this;
    }

    /**
     * Get syndicestimer
     *
     * @return float
     */
    public function getsyndicestimer()
    {
        return $this->syndicestimer;
    }
    
    /**
     * Set syndicreel
     *
     * @param float $syndicreel
     *
     * @return Aaaaa
     */
    public function setsyndicreel($syndicreel)
    {
        $this->syndicreel = $syndicreel;

        return $this;
    }

    /**
     * Get syndicreel
     *
     * @return float
     */
    public function getsyndicreel()
    {
        return $this->syndicreel;
    }
    
   
}
