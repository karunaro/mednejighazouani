<?php

namespace GestionVolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * passager
 *
 * @ORM\Table(name="passager")
 * @ORM\Entity(repositoryClass="GestionVolBundle\Repository\passagerRepository")
 */
class passager
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     * @Assert\NotBlank(message="plz enter an image")
     * @Assert\Image()
     * @ORM\Column(name="image",type="string",length=255)
     */
    private $image;


    /**
     * @var string
     *
     * @ORM\Column(name="nom_prenom", type="string", length=255)
     *
     */
    private $nomPrenom;

    /**
     * @var bool
     *
     * @ORM\Column(name="bunsiness", type="boolean")
     */
    private $bunsiness;

    /**
     * @var int
     *
     * @ORM\Column(name="nbe_bagage", type="integer")
     */
    private $nbeBagage;

    /**
     * @var int
     *
     * @ORM\Column(name="total_frais", type="integer")
     */
    private $totalFrais;


    /**
     * @ORM\ManyToOne(targetEntity="vol")
     * @ORM\JoinColumn(name="vol_id",referencedColumnName="id")
     */
    private $vol;

    /**
     * @return mixed
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @param mixed $vol
     */
    public function setVol($vol)
    {
        $this->vol = $vol;
    }
    /**
     * Get id
     *
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomPrenom
     *
     * @param string $nomPrenom
     *
     * @return passager
     */
    public function setNomPrenom($nomPrenom)
    {
        $this->nomPrenom = $nomPrenom;

        return $this;
    }

    /**
     * Get nomPrenom
     *
     * @return string
     */
    public function getNomPrenom()
    {
        return $this->nomPrenom;
    }

    /**
     * Set bunsiness
     *
     * @param boolean $bunsiness
     *
     * @return passager
     */
    public function setBunsiness($bunsiness)
    {
        $this->bunsiness = $bunsiness;

        return $this;
    }

    /**
     * Get bunsiness
     *
     * @return bool
     */
    public function getBunsiness()
    {
        return $this->bunsiness;
    }

    /**
     * Set nbeBagage
     *
     * @param integer $nbeBagage
     *
     * @return passager
     */
    public function setNbeBagage($nbeBagage)
    {
        $this->nbeBagage = $nbeBagage;

        return $this;
    }

    /**
     * Get nbeBagage
     *
     * @return int
     */
    public function getNbeBagage()
    {
        return $this->nbeBagage;
    }

    /**
     * Set totalFrais
     *
     * @param integer $totalFrais
     *
     * @return passager
     */
    public function setTotalFrais($totalFrais)
    {
        $this->totalFrais = $totalFrais;

        return $this;
    }
    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get totalFrais
     *
     * @return int
     */
    public function getTotalFrais()
    {
        return $this->totalFrais;
    }
}

