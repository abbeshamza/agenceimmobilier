<?php

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Confort
 *
 * @ORM\Table(name="confort")
 * @ORM\Entity
 */
class Confort
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
     *
     * @ORM\Column(name="ascenseur", type="integer", nullable=true)
     */
    private $ascenseur;

    /**
     * @var integer
     *
     * @ORM\Column(name="adsl", type="integer", nullable=true)
     */
    private $adsl;

    /**
     * @var integer
     *
     * @ORM\Column(name="antenne_parabolique", type="integer", nullable=true)
     */
    private $antenneParabolique;

    /**
     * @var integer
     *
     * @ORM\Column(name="balcon", type="integer", nullable=true)
     */
    private $balcon;

    /**
     * @var integer
     *
     * @ORM\Column(name="cellier", type="integer", nullable=true)
     */
    private $cellier;

    /**
     * @var integer
     *
     * @ORM\Column(name="chauffage", type="integer", nullable=true)
     */
    private $chauffage;

    /**
     * @var integer
     *
     * @ORM\Column(name="climatisation", type="integer", nullable=true)
     */
    private $climatisation;

    /**
     * @var integer
     *
     * @ORM\Column(name="cuisine_equipe", type="integer", nullable=true)
     */
    private $cuisineEquipe;

    /**
     * @var integer
     *
     * @ORM\Column(name="double_vitrage", type="integer", nullable=true)
     */
    private $doubleVitrage;

    /**
     * @var integer
     *
     * @ORM\Column(name="dressing", type="integer", nullable=true)
     */
    private $dressing;

    /**
     * @var integer
     *
     * @ORM\Column(name="gaz_de_ville", type="integer", nullable=true)
     */
    private $gazDeVille;

    /**
     * @var integer
     *
     * @ORM\Column(name="interphone", type="integer", nullable=true)
     */
    private $interphone;

    /**
     * @var integer
     *
     * @ORM\Column(name="jardin_privatif", type="integer", nullable=true)
     */
    private $jardinPrivatif;

    /**
     * @var integer
     *
     * @ORM\Column(name="marbre_blanc", type="integer", nullable=true)
     */
    private $marbreBlanc;

    /**
     * @var integer
     *
     * @ORM\Column(name="marbre_thala", type="integer", nullable=true)
     */
    private $marbreThala;

    /**
     * @var integer
     *
     * @ORM\Column(name="piscine", type="integer", nullable=true)
     */
    private $piscine;

    /**
     * @var integer
     *
     * @ORM\Column(name="parking", type="integer", nullable=true)
     */
    private $parking;

    /**
     * @var integer
     *
     * @ORM\Column(name="placard", type="integer", nullable=true)
     */
    private $placard;

    /**
     * @var integer
     *
     * @ORM\Column(name="residence_gardee", type="integer", nullable=true)
     */
    private $residenceGardee;

    /**
     * @var integer
     *
     * @ORM\Column(name="syndic", type="integer", nullable=true)
     */
    private $syndic;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var integer
     *
     * @ORM\Column(name="video_surveillance", type="integer", nullable=true)
     */
    private $videoSurveillance;



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
     * Set ascenseur
     *
     * @param integer $ascenseur
     * @return Confort
     */
    public function setAscenseur($ascenseur)
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    /**
     * Get ascenseur
     *
     * @return integer 
     */
    public function getAscenseur()
    {
        return $this->ascenseur;
    }

    /**
     * Set adsl
     *
     * @param integer $adsl
     * @return Confort
     */
    public function setAdsl($adsl)
    {
        $this->adsl = $adsl;

        return $this;
    }

    /**
     * Get adsl
     *
     * @return integer 
     */
    public function getAdsl()
    {
        return $this->adsl;
    }

    /**
     * Set antenneParabolique
     *
     * @param integer $antenneParabolique
     * @return Confort
     */
    public function setAntenneParabolique($antenneParabolique)
    {
        $this->antenneParabolique = $antenneParabolique;

        return $this;
    }

    /**
     * Get antenneParabolique
     *
     * @return integer 
     */
    public function getAntenneParabolique()
    {
        return $this->antenneParabolique;
    }

    /**
     * Set balcon
     *
     * @param integer $balcon
     * @return Confort
     */
    public function setBalcon($balcon)
    {
        $this->balcon = $balcon;

        return $this;
    }

    /**
     * Get balcon
     *
     * @return integer 
     */
    public function getBalcon()
    {
        return $this->balcon;
    }

    /**
     * Set cellier
     *
     * @param integer $cellier
     * @return Confort
     */
    public function setCellier($cellier)
    {
        $this->cellier = $cellier;

        return $this;
    }

    /**
     * Get cellier
     *
     * @return integer 
     */
    public function getCellier()
    {
        return $this->cellier;
    }

    /**
     * Set chauffage
     *
     * @param integer $chauffage
     * @return Confort
     */
    public function setChauffage($chauffage)
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    /**
     * Get chauffage
     *
     * @return integer 
     */
    public function getChauffage()
    {
        return $this->chauffage;
    }

    /**
     * Set climatisation
     *
     * @param integer $climatisation
     * @return Confort
     */
    public function setClimatisation($climatisation)
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    /**
     * Get climatisation
     *
     * @return integer 
     */
    public function getClimatisation()
    {
        return $this->climatisation;
    }

    /**
     * Set cuisineEquipe
     *
     * @param integer $cuisineEquipe
     * @return Confort
     */
    public function setCuisineEquipe($cuisineEquipe)
    {
        $this->cuisineEquipe = $cuisineEquipe;

        return $this;
    }

    /**
     * Get cuisineEquipe
     *
     * @return integer 
     */
    public function getCuisineEquipe()
    {
        return $this->cuisineEquipe;
    }

    /**
     * Set doubleVitrage
     *
     * @param integer $doubleVitrage
     * @return Confort
     */
    public function setDoubleVitrage($doubleVitrage)
    {
        $this->doubleVitrage = $doubleVitrage;

        return $this;
    }

    /**
     * Get doubleVitrage
     *
     * @return integer 
     */
    public function getDoubleVitrage()
    {
        return $this->doubleVitrage;
    }

    /**
     * Set dressing
     *
     * @param integer $dressing
     * @return Confort
     */
    public function setDressing($dressing)
    {
        $this->dressing = $dressing;

        return $this;
    }

    /**
     * Get dressing
     *
     * @return integer 
     */
    public function getDressing()
    {
        return $this->dressing;
    }

    /**
     * Set gazDeVille
     *
     * @param integer $gazDeVille
     * @return Confort
     */
    public function setGazDeVille($gazDeVille)
    {
        $this->gazDeVille = $gazDeVille;

        return $this;
    }

    /**
     * Get gazDeVille
     *
     * @return integer 
     */
    public function getGazDeVille()
    {
        return $this->gazDeVille;
    }

    /**
     * Set interphone
     *
     * @param integer $interphone
     * @return Confort
     */
    public function setInterphone($interphone)
    {
        $this->interphone = $interphone;

        return $this;
    }

    /**
     * Get interphone
     *
     * @return integer 
     */
    public function getInterphone()
    {
        return $this->interphone;
    }

    /**
     * Set jardinPrivatif
     *
     * @param integer $jardinPrivatif
     * @return Confort
     */
    public function setJardinPrivatif($jardinPrivatif)
    {
        $this->jardinPrivatif = $jardinPrivatif;

        return $this;
    }

    /**
     * Get jardinPrivatif
     *
     * @return integer 
     */
    public function getJardinPrivatif()
    {
        return $this->jardinPrivatif;
    }

    /**
     * Set marbreBlanc
     *
     * @param integer $marbreBlanc
     * @return Confort
     */
    public function setMarbreBlanc($marbreBlanc)
    {
        $this->marbreBlanc = $marbreBlanc;

        return $this;
    }

    /**
     * Get marbreBlanc
     *
     * @return integer 
     */
    public function getMarbreBlanc()
    {
        return $this->marbreBlanc;
    }

    /**
     * Set marbreThala
     *
     * @param integer $marbreThala
     * @return Confort
     */
    public function setMarbreThala($marbreThala)
    {
        $this->marbreThala = $marbreThala;

        return $this;
    }

    /**
     * Get marbreThala
     *
     * @return integer 
     */
    public function getMarbreThala()
    {
        return $this->marbreThala;
    }

    /**
     * Set piscine
     *
     * @param integer $piscine
     * @return Confort
     */
    public function setPiscine($piscine)
    {
        $this->piscine = $piscine;

        return $this;
    }

    /**
     * Get piscine
     *
     * @return integer 
     */
    public function getPiscine()
    {
        return $this->piscine;
    }

    /**
     * Set parking
     *
     * @param integer $parking
     * @return Confort
     */
    public function setParking($parking)
    {
        $this->parking = $parking;

        return $this;
    }

    /**
     * Get parking
     *
     * @return integer 
     */
    public function getParking()
    {
        return $this->parking;
    }

    /**
     * Set placard
     *
     * @param integer $placard
     * @return Confort
     */
    public function setPlacard($placard)
    {
        $this->placard = $placard;

        return $this;
    }

    /**
     * Get placard
     *
     * @return integer 
     */
    public function getPlacard()
    {
        return $this->placard;
    }

    /**
     * Set residenceGardee
     *
     * @param integer $residenceGardee
     * @return Confort
     */
    public function setResidenceGardee($residenceGardee)
    {
        $this->residenceGardee = $residenceGardee;

        return $this;
    }

    /**
     * Get residenceGardee
     *
     * @return integer 
     */
    public function getResidenceGardee()
    {
        return $this->residenceGardee;
    }

    /**
     * Set syndic
     *
     * @param integer $syndic
     * @return Confort
     */
    public function setSyndic($syndic)
    {
        $this->syndic = $syndic;

        return $this;
    }

    /**
     * Get syndic
     *
     * @return integer 
     */
    public function getSyndic()
    {
        return $this->syndic;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Confort
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set videoSurveillance
     *
     * @param integer $videoSurveillance
     * @return Confort
     */
    public function setVideoSurveillance($videoSurveillance)
    {
        $this->videoSurveillance = $videoSurveillance;

        return $this;
    }

    /**
     * Get videoSurveillance
     *
     * @return integer 
     */
    public function getVideoSurveillance()
    {
        return $this->videoSurveillance;
    }

    public function __toString()
    {
        return  ("".$this->id);
    }
}
