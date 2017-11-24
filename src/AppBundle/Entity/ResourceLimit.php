<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceLimit
 *
 * @ORM\Table(name="resource_limit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResourceLimitRepository")
 */
class ResourceLimit
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
     * @ORM\Column(name="household", type="string", length=125)
     */
    private $household;

    /**
     * @var int
     *
     * @ORM\Column(name="resource", type="integer", length=7)
     */
    private $resource;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_ile_de_france", type="boolean")
     */
    private $isIleDeFrance;


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
     * Set household
     *
     * @param string $household
     *
     * @return ResourceLimit
     */
    public function setHousehold($household)
    {
        $this->household = $household;

        return $this;
    }

    /**
     * Get household
     *
     * @return string
     */
    public function getHousehold()
    {
        return $this->household;
    }

    /**
     * Set resource
     *
     * @param integer $resource
     *
     * @return ResourceLimit
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get resource
     *
     * @return int
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set isIleDeFrance
     *
     * @param boolean $isIleDeFrance
     *
     * @return ResourceLimit
     */
    public function setIsIleDeFrance($isIleDeFrance)
    {
        $this->isIleDeFrance = $isIleDeFrance;

        return $this;
    }

    /**
     * Get isIleDeFrance
     *
     * @return boolean
     */
    public function getIsIleDeFrance()
    {
        return $this->isIleDeFrance;
    }
}
