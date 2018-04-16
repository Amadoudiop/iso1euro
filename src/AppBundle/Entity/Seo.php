<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seo
 *
 * @ORM\Table(name="seo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeoRepository")
 */
class Seo
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
     * @ORM\Column(name="title", type="string", length=125)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="string", length=255)
     */
    private $meta_description;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_author", type="string", length=125)
     */
    private $meta_author;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Seo
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set metaDescription.
     *
     * @param string $metaDescription
     *
     * @return Seo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription.
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }

    /**
     * Set metaAuthor.
     *
     * @param string $metaAuthor
     *
     * @return Seo
     */
    public function setMetaAuthor($metaAuthor)
    {
        $this->meta_author = $metaAuthor;

        return $this;
    }

    /**
     * Get metaAuthor.
     *
     * @return string
     */
    public function getMetaAuthor()
    {
        return $this->meta_author;
    }
}
