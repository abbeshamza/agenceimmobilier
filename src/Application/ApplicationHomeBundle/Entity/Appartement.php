<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appartement
 *
 * @ORM\Table(name="appartement", indexes={@ORM\Index(name="fk_appartement_type_annonce_idx", columns={"type_annonce_id"}), @ORM\Index(name="fk_appartement_region1_idx", columns={"region_id"}), @ORM\Index(name="fk_appartement_nbr_piece1_idx", columns={"nbr_piece_id"})})
 * @ORM\Entity
 */
class Appartement
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
     * @ORM\Column(name="superficie", type="integer", length=45, nullable=true)
     */
    private $superficie;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_etage", type="integer", nullable=true)
     */
    private $numEtage;

    /**
     * @var string
     *
     * @ORM\Column(name="anne_construction", type="string", length=45, nullable=true)
     */
    private $anneConstruction;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", length=45, nullable=true)
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
     * @var \NbrPiece
     *
     * @ORM\ManyToOne(targetEntity="NbrPiece")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nbr_piece_id", referencedColumnName="id")
     * })
     */
    private $nbrPiece;
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
     * @return Appartement
     */
    public function setMeuble($meuble)
    {
        $this->meuble = $meuble;

        return $this;
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
     * @return Appartement
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
     * @return Appartement
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
     * @return Appartement
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
     * Set numEtage
     *
     * @param integer $numEtage
     * @return Appartement
     */
    public function setNumEtage($numEtage)
    {
        $this->numEtage = $numEtage;

        return $this;
    }

    /**
     * Get numEtage
     *
     * @return integer 
     */
    public function getNumEtage()
    {
        return $this->numEtage;
    }

    /**
     * Set anneConstruction
     *
     * @param string $anneConstruction
     * @return Appartement
     */
    public function setAnneConstruction($anneConstruction)
    {
        $this->anneConstruction = $anneConstruction;

        return $this;
    }

    /**
     * Get anneConstruction
     *
     * @return string 
     */
    public function getAnneConstruction()
    {
        return $this->anneConstruction;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return Appartement
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
     * @return Appartement
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
     * Set region
     *
     * @param \Application\ApplicationHomeBundle\Entity\Region $region
     * @return Appartement
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
     * @param  $confort
     * @return Appartement
     */
    public function setConfort($confort)
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
     * Set nbrPiece
     *
     * @param \Application\ApplicationHomeBundle\Entity\NbrPiece $nbrPiece
     * @return Appartement
     */
    public function setNbrPiece(\Application\ApplicationHomeBundle\Entity\NbrPiece $nbrPiece = null)
    {
        $this->nbrPiece = $nbrPiece;

        return $this;
    }

    /**
     * Get nbrPiece
     *
     * @return \Application\ApplicationHomeBundle\Entity\NbrPiece 
     */
    public function getNbrPiece()
    {
        return $this->nbrPiece;
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
     * @return Appartement
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
        return("Appartement");
    }
}
