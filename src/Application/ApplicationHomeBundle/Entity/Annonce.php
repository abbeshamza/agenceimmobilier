<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 23/02/2015
 * Time: 22:54
 */

namespace Application\ApplicationHomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce_client",indexes={@ORM\Index(name="fk_annonce_type_annonce_client_idx", columns={"type_annonce_client_id"})})
 * @ORM\Entity
 */


class Annonce {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=45, nullable=true)
     */
    private $titre;
    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=1000, nullable=true)
     */
    private $texte;



    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=45, nullable=true)
     */
    private $tel;

    /**
     * @var \statut
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     * })
     */
    private $statut;



    /**
     * @var \TypeAnnonceClient
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonceClient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_annonce_client_id", referencedColumnName="id")
     * })
     */
    private $typeAnnonceClient;


    /**
     * Set titre
     *
     * @param string $titre
     * @return Annonce
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
     * Set titre
     *
     * @param string $texte
     * @return Annonce
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
     * Set titre
     *
     * @param string $titre
     * @return Annonce
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set titre
     *
     * @param string $titre
     * @return Annonce
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
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
    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set typeAnnonceClient
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeAnnonceClient $typeAnnonceClient
     * @return Annonce
     */
    public function setTypeAnnonceClient(\Application\ApplicationHomeBundle\Entity\TypeAnnonceClient $typeAnnonceCLient = null)
    {
        $this->typeAnnonceClient = $typeAnnonceCLient;

        return $this;
    }

    /**
     * Get typeAnnonce
     *
     * @return \Application\ApplicationHomeBundle\Entity\TypeAnnonceClient
     */
    public function getTypeAnnonceClient()
    {
        return $this->typeAnnonceClient;
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
     * @return Annonce
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



}