<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 01/03/2015
 * Time: 18:38
 */


namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert ;
use Application\ApplicationHomeBundle\Entity\TypeAnnonceClient;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */

class Image {
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
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $description;
    /**
     * @Assert\File(maxSize="6000000")
     */
    public $file;
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
     * @ORM\Column(type="integer", nullable=true)
     */
    public $obj;
    public $images;

    /**
     * Set typeAnnonceClient
     *
     * @param \Application\ApplicationHomeBundle\Entity\TypeAnnonceClient $typeAnnonceClient
     * @return Image
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

    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // le chemin absolu du répertoire où les documents uploadés doivent être sauvegardés
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // on se débarrasse de « __DIR__ » afin de ne pas avoir de problème lorsqu'on affiche
        // le document/image dans la vue.

        return ('uploads/'.$this->getTypeAnnonceClient()->getId().'/');
    }
    public function upload()
    {
        // la propriété « file » peut être vide si le champ n'est pas requis
        if (null === $this->file) {
            return;
        }

        // utilisez le nom de fichier original ici mais
        // vous devriez « l'assainir » pour au moins éviter
        // quelconques problèmes de sécurité

        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé

        $tab=explode('.', $this->file->getClientOriginalName());
        $char=rand().''.rand().rand().'image'.rand().rand().rand().rand().'.'.$tab[1];
        $this->file->move($this->getUploadRootDir(), $char);


        // définit la propriété « path » comme étant le nom de fichier où vous
        // avez stocké le fichier
        $this->path = $char;
        echo '<h1>'.$this->id.'</h1>';

        // « nettoie » la propriété « file » comme vous n'en aurez plus besoin
        $this->file = null;
    }
    /**
     * Get obj
     *
     * @return int
     */
    public function getObj()
    {
        return $this->obj;
    }
    /**
     * Set obj
     *
     * @param int $obj
     * @return Image
     */
    public function setObj($obj)
    {
        $this->typeAnnonceClient = $obj;

        return $this;
    }
}