<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 01/03/2015
 * Time: 21:26
 */

namespace Application\ApplicationHomeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
/**
 * Contacter
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contacter {



    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $sujet;

    /**
     * @ORM\Column(type="string", length=600, nullable=true)
     */
    public $description;
    /**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     * })
     */
    public $statut;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return Contacter_nous
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     * @return Contacter_nous
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Contacter_nous
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
     * Set statut
     *
     * @param \Application\ApplicationHomeBundle\Entity\Statut $statut
     * @return Appartement
     */
    public function setStatut(\Application\ApplicationHomeBundle\Entity\Statut $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \Application\ApplicationHomeBundle\Entity\Statut
     */
    public function getStatut()
    {
        return   $this->statut;
    }
}
