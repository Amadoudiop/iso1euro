<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Footer
 *
 * @ORM\Table(name="footer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FooterRepository")
 */
class Footer
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
     * @ORM\Column(name="twitter_link", type="string", length=255)
     */
    private $twitterLink;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_link", type="string", length=255)
     */
    private $facebookLink;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin_link", type="string", length=255)
     */
    private $linkedinLink;

    /**
     * @var string
     *
     * @ORM\Column(name="copyright", type="string", length=255)
     */
    private $copyright;


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
     * Set twitterLink
     *
     * @param string $twitterLink
     *
     * @return Footer
     */
    public function setTwitterLink($twitterLink)
    {
        $this->twitterLink = $twitterLink;

        return $this;
    }

    /**
     * Get twitterLink
     *
     * @return string
     */
    public function getTwitterLink()
    {
        return $this->twitterLink;
    }

    /**
     * Set facebookLink
     *
     * @param string $facebookLink
     *
     * @return Footer
     */
    public function setFacebookLink($facebookLink)
    {
        $this->facebookLink = $facebookLink;

        return $this;
    }

    /**
     * Get facebookLink
     *
     * @return string
     */
    public function getFacebookLink()
    {
        return $this->facebookLink;
    }

    /**
     * Set linkedinLink
     *
     * @param string $linkedinLink
     *
     * @return Footer
     */
    public function setLinkedinLink($linkedinLink)
    {
        $this->linkedinLink = $linkedinLink;

        return $this;
    }

    /**
     * Get linkedinLink
     *
     * @return string
     */
    public function getLinkedinLink()
    {
        return $this->linkedinLink;
    }

    /**
     * Set copyright
     *
     * @param string $copyright
     *
     * @return Footer
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * Get copyright
     *
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }
}

