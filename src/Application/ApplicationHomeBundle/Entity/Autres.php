<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autres
 *
 * @ORM\Table(name="autres", indexes={@ORM\Index(name="fk_Autres_region1_idx", columns={"region_id"})})
 * @ORM\Entity
 */
class Autres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_annonce_id", referencedColumnName="id")
     * })
     */
    private $typeAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=1000, nullable=true)
     */
    private $texte;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=45, nullable=true)
     */
    private $titre;



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
     * Set titre
     *
     * @param string $titre
     * @return THabitation
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    /**
     * Set typeAnnonce
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Appartement
     */
    public function setTypeAnnonce(\Application\ApplicationHomeBundle\Entity\TypeAnnonce $typeAnnonce = null)
    {
        $this->typeAnnonce = $typeAnnonce;

        return $this;
    }

    /**
     * Get typeAnnonce
     *
     * @return \Application\ApplicationHomeBundle\Entity\TypeAnnonce
     */
    public function getTypeAnnonce()
    {
        return $this->typeAnnonce;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Autres
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set region
     *
     * @param \Application\ApplicationHomeBundle\Entity\Region $region
     * @return Autres
     */
    public function setRegion(\Application\ApplicationHomeBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Application\ApplicationHomeBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="dossier", type="integer", nullable=true)
     */
    private $dossier;


    /**
     * Set dossier
     *
     * @param integer $dossier
     * @return Autres
     */
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;

        return $this;
    }
    public $images;

    public function getImages()
    {
        return $this->images;
    }

    /**
     * Get dossier
     *
     * @return integer
     */
    public function getDossier()
    {
        return $this->dossier;
    }
    public  function __toString()
    {
        return("Autres");
    }
    /**
     * @var string
     *
     * @ORM\Column(name="delegation", type="string", length=40, nullable=true)
     */
    private $delegation;
    /**
     * Set delegation
     *
     * @param string $delegation
     * @return Autre
     */
    public function setDelegation($delegation)
    {
        $this->delegation = $delegation;

        return $this;
    }

    /**
     * Get delegation
     *
     * @return string
     */
    public function getDelegation()
    {
        return $this->delegation;
    }


}
