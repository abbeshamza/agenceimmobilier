<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MaisonVacance
 *
 * @ORM\Table(name="maison_vacance", indexes={@ORM\Index(name="fk_maison_vacance_nbr_piece1_idx", columns={"nbr_piece_id"}), @ORM\Index(name="fk_maison_vacance_region1_idx", columns={"region_id"}), @ORM\Index(name="fk_maison_vacance_type_annonce1_idx", columns={"type_annonce_id"}), @ORM\Index(name="fk_maison_vacance_type_bien1_idx", columns={"type_bien_id"})})
 * @ORM\Entity
 */
class MaisonVacance
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
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="texte_aoonce", type="string", length=1000, nullable=true)
     */
    private $texteAoonce;

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
     * @var \TypeBien
     *
     * @ORM\ManyToOne(targetEntity="TypeBien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_bien_id", referencedColumnName="id")
     * })
     */
    private $typeBien;
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
     * @return MaisonVacance
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
     * @return MaisonVacance
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
     * @return MaisonVacance
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
     * Set prix
     *
     * @param integer $prix
     * @return MaisonVacance
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
     * Set texteAoonce
     *
     * @param string $texteAoonce
     * @return MaisonVacance
     */
    public function setTexteAoonce($texteAoonce)
    {
        $this->texteAoonce = $texteAoonce;

        return $this;
    }

    /**
     * Get texteAoonce
     *
     * @return string 
     */
    public function getTexteAoonce()
    {
        return $this->texteAoonce;
    }

    /**
     * Set nbrPiece
     *
     * @param \Application\ApplicationHomeBundle\Entity\NbrPiece $nbrPiece
     * @return MaisonVacance
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
     * Set region
     *
     * @param \Application\ApplicationHomeBundle\Entity\Region $region
     * @return MaisonVacance
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
     * @return MaisonVacance
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
     * Set typeBien
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeBien $typeBien
     * @return MaisonVacance
     */
    public function setTypeBien(\Application\ApplicationHomeBundle\Entity\TypeBien $typeBien = null)
    {
        $this->typeBien = $typeBien;

        return $this;
    }

    /**
     * Get typeBien
     *
     * @return \Application\ApplicationHomeBundle\Entity\TypeBien 
     */
    public function getTypeBien()
    {
        return $this->typeBien;
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
     * @return MaisonVacance
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
        return("MaisonVacance");
    }
}
