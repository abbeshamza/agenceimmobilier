<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 14/03/2015
 * Time: 14:55
 */

namespace Application\ApplicationHomeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="demandeVisite")
 * @ORM\Entity
 */


class DemandeVisite {
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
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=45, nullable=true)
     */
    private $tel;
    /**
     * @var string
     *
     * @ORM\Column(name="horaire", type="string", length=45, nullable=true)
     */
    private $horaire;
    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=45, nullable=true)
     */
    private $texte;
    /**
     * @var string
     *
     * @ORM\Column(name="annonce", type="string", length=45, nullable=true)
     */
    private $annonce;
    /**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="Statut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_id", referencedColumnName="id")
     * })
     */
    private $statut;


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
     * Set nom
     *
     * @param string $nom
     * @return DemandeVisite
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return DemandeVisite
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
     * Set tel
     *
     * @param string $tel
     * @return DemandeVisite
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
     * Set horaire
     *
     * @param string $horaire
     * @return DemandeVisite
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return string 
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set texte
     *
     * @param string $texte
     * @return DemandeVisite
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
     * Set annonce
     *
     * @param string $annonce
     * @return DemandeVisite
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return string 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
    /**
     * Set nbrPiece
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
     * Get nbrPiece
     *
     * @return \Application\ApplicationHomeBundle\Entity\Statut
     */
    public function getStatut()
    {
        return   $this->statut;
    }

}
