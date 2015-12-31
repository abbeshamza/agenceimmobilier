<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 24/02/2015
 * Time: 11:04
 */

namespace Application\ApplicationHomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAnnonceClient
 *
 * @ORM\Table(name="type_annonce_client")
 * @ORM\Entity
 */

class TypeAnnonceClient {

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
     * @ORM\Column(name="label", type="string", length=45, nullable=true)
     */
    private $label;



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
     * Set label
     *
     * @param string $label
     * @return TypeAnnonceClient
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
    public  function __toString()
    {
        return $this->label;
    }



}