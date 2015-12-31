<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locauxcommerciaux
 *
 * @ORM\Table(name="locauxcommerciaux", indexes={@ORM\Index(name="fk_locauxcommerciaux_region1_idx", columns={"region_id"}), @ORM\Index(name="fk_locauxcommerciaux_type_annonce1_idx", columns={"type_annonce_id"})})
 * @ORM\Entity
 */
class Locauxcommerciaux
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
     * @var integer
     * @ORM\Column(name="longitude", type="float")
     */
    public $longitude;
    /**
     * @var integer
     * @ORM\Column(name="latitude", type="float")
     */
    public $latitude;
    public $coord;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=45, nullable=true)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="superficie", type="integer",  nullable=true)
     */
    private $superficie;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

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
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_annonce_id", referencedColumnName="id")
     * })
     */
    private $typeAnnonce;



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
     * @return Locauxcommerciaux
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
     * Set superficie
     *
     * @param integer $superficie
     * @return Locauxcommerciaux
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return integer
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Locauxcommerciaux
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return Locauxcommerciaux
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
     * @return Locauxcommerciaux
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
     * Set typeAnnonce
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Locauxcommerciaux
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
     * @var integer
     *
     * @ORM\Column(name="dossier", type="integer", nullable=true)
     */
    private $dossier;


    /**
     * Set dossier
     *
     * @param integer $dossier
     * @return Locauxcommerciaux
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
    public  function __toString()
    {
        return("Locauxcommerciaux");
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
     * @return Locauxcommerciaux
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
