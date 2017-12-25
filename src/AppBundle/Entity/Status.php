<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatusRepository")
 */
class Status
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
     * @ORM\Column(name="color", type="string", length=10, options={"default" : "#fff"})
     */
    private $color;


    /**
     * One Status has Many Prospects.
     * @ORM\OneToMany(targetEntity="Prospect", mappedBy="status")
     */
    private $prospects;

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
     * @return Status
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
     * Set color
     *
     * @param string $color
     *
     * @return Status
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prospects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prospect
     *
     * @param \AppBundle\Entity\Prospect $prospect
     *
     * @return Status
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
}
