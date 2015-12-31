<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Villa
 *
 * @ORM\Table(name="villa", indexes={@ORM\Index(name="fk_villa_type_annonce1_idx", columns={"type_annonce_id"})})
 * @ORM\Entity
 */
class Villa
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
     * @ORM\Column(name="superficie_terrain", type="integer", nullable=true)
     */
    private $superficieTerrain;

    /**
     * @var string
     *
     * @ORM\Column(name="surface_batie", type="integer", nullable=true)
     */
    private $surfaceBatie;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_etage", type="integer", nullable=true)
     */
    private $nbrEtage;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_chambre", type="integer", nullable=true)
     */
    private $nbrChambre;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_salon", type="integer", nullable=true)
     */
    private $nbrSalon;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_salle_a_mange", type="integer", nullable=true)
     */
    private $nbrSalleAMange;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_salle_de_bain", type="integer", nullable=true)
     */
    private $nbrSalleDeBain;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_annonce", type="string", length=1000, nullable=true)
     */
    private $texteAnnonce;

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
     * @ORM\Column(name="confort", type="string", length=1000, nullable=true)
     */
    private $confort;

    /**
     * @var integer
     *
     * @ORM\Column(name="dossier", type="integer", nullable=true)
     */
    private $dossier;
    /**
     * @var string
     *
     * @ORM\Column(name="meuble", type="string", length=5, nullable=true)
     */
    private $meuble;
    /**
     * Set meuble
     *
     * @param string $meuble
     * @return Villa
     */
    public function setMeuble($meuble)
    {
        $this->meuble = $meuble;

        return $this;
    }

    /**
     * Get meuble
     *
     * @return string
     */
    public function getMeuble()
    {
        return $this->meuble;
    }



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
     * @return Villa
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
     * Set superficieTerrain
     *
     * @param integer $superficieTerrain
     * @return Villa
     */
    public function setSuperficieTerrain($superficieTerrain)
    {
        $this->superficieTerrain = $superficieTerrain;

        return $this;
    }
    public $images;

    public function getImages()
    {
        return $this->images;
    }


    /**
     * Get superficieTerrain
     *
     * @return integer
     */
    public function getSuperficieTerrain()
    {
        return $this->superficieTerrain;
    }

    /**
     * Set surfaceBatie
     *
     * @param integer $surfaceBatie
     * @return Villa
     */
    public function setSurfaceBatie($surfaceBatie)
    {
        $this->surfaceBatie = $surfaceBatie;

        return $this;
    }

    /**
     * Get surfaceBatie
     *
     * @return integer
     */
    public function getSurfaceBatie()
    {
        return $this->surfaceBatie;
    }

    /**
     * Set nbrEtage
     *
     * @param integer $nbrEtage
     * @return Villa
     */
    public function setNbrEtage($nbrEtage)
    {
        $this->nbrEtage = $nbrEtage;

        return $this;
    }

    /**
     * Get nbrEtage
     *
     * @return integer 
     */
    public function getNbrEtage()
    {
        return $this->nbrEtage;
    }

    /**
     * Set nbrChambre
     *
     * @param integer $nbrChambre
     * @return Villa
     */
    public function setNbrChambre($nbrChambre)
    {
        $this->nbrChambre = $nbrChambre;

        return $this;
    }

    /**
     * Get nbrChambre
     *
     * @return integer 
     */
    public function getNbrChambre()
    {
        return $this->nbrChambre;
    }

    /**
     * Set nbrSalon
     *
     * @param integer $nbrSalon
     * @return Villa
     */
    public function setNbrSalon($nbrSalon)
    {
        $this->nbrSalon = $nbrSalon;

        return $this;
    }

    /**
     * Get nbrSalon
     *
     * @return integer 
     */
    public function getNbrSalon()
    {
        return $this->nbrSalon;
    }

    /**
     * Set nbrSalleAMange
     *
     * @param integer $nbrSalleAMange
     * @return Villa
     */
    public function setNbrSalleAMange($nbrSalleAMange)
    {
        $this->nbrSalleAMange = $nbrSalleAMange;

        return $this;
    }

    /**
     * Get nbrSalleAMange
     *
     * @return integer 
     */
    public function getNbrSalleAMange()
    {
        return $this->nbrSalleAMange;
    }

    /**
     * Set nbrSalleDeBain
     *
     * @param integer $nbrSalleDeBain
     * @return Villa
     */
    public function setNbrSalleDeBain($nbrSalleDeBain)
    {
        $this->nbrSalleDeBain = $nbrSalleDeBain;

        return $this;
    }

    /**
     * Get nbrSalleDeBain
     *
     * @return integer 
     */
    public function getNbrSalleDeBain()
    {
        return $this->nbrSalleDeBain;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Villa
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
     * Set texteAnnonce
     *
     * @param string $texteAnnonce
     * @return Villa
     */
    public function setTexteAnnonce($texteAnnonce)
    {
        $this->texteAnnonce = $texteAnnonce;

        return $this;
    }

    /**
     * Get texteAnnonce
     *
     * @return string 
     */
    public function getTexteAnnonce()
    {
        return $this->texteAnnonce;
    }

    /**
     * Set typeAnnonce
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Villa
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
     * Set region
     *
     * @param \Application\ApplicationHomeBundle\Entity\Region $region
     * @return Villa
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
     * Set confort
     *
     * @param $confort
     * @return Villa
     */
    public function setConfort($confort )
    {
        $this->confort = $confort;

        return $this;
    }

    /**
     * Get confort
     *
     * @return string
     */
    public function getConfort()
    {
        return $this->confort;
    }

    /**
     * Set dossier
     *
     * @param integer $dossier
     * @return Villa
     */
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;

        return $this;
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
        return("Villa");
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
     * @return Villa
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
