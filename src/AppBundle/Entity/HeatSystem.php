<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * HeatSystem
 *
 * @ORM\Table(name="heat_system")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HeatSystemRepository")
 */
class HeatSystem
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
     *
     * @ORM\Column(name="label", type="string", length=125)
     */
    private $label;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * One HeatSystem has Many Prospects.
     * @ORM\OneToMany(targetEntity="Prospect", mappedBy="heatSystem")
     */
    private $prospects;

    public function __construct() {
        $this->prospects = new ArrayCollection();
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
     * Set label
     *
     * @param string $label
     *
     * @return HeatSystem
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

    /**
     * Set img
     *
     * @param string $img
     *
     * @return HeatSystem
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Add prospect
     *
     * @param \AppBundle\Entity\Prospect $prospect
     *
     * @return HeatSystem
     */
    public function addProspect(\AppBundle\Entity\Prospect $prospect)
    {
        $this->prospects[] = $prospect;

        return $this;
    }

    /**
     * Remove prospect
     *
     * @param \AppBundle\Entity\Prospect $prospect
     */
    public function removeProspect(\AppBundle\Entity\Prospect $prospect)
    {
        $this->prospects->removeElement($prospect);
    }

    /**
     * Get prospects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProspects()
    {
        return $this->prospects;
    }

    public function getFormField() {
        $label_img = $this->label . '#' . $this->img;
        return $label_img;   /* or an array with only the needed attributes */
    }
}
