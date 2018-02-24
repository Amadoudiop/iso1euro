<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LandingPage
 *
 * @ORM\Table(name="landing_page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LandingPageRepository")
 */
class LandingPage
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
     * @ORM\Column(name="header_title", type="string", length=125)
     */
    private $header_title;

    /**
     * @var string
     *
     * @ORM\Column(name="header_subtitle", type="string", length=125)
     */
    private $header_subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="header_button", type="string", length=50)
     */
    private $header_button;

    /**
     * @var string
     *
     * @ORM\Column(name="first_title", type="string", length=125)
     */
    private $first_title;

    /**
     * @var string
     *
     * @ORM\Column(name="first_description", type="text")
     */
    private $first_description;

    /**
     * @var string
     *
     * @ORM\Column(name="first_button", type="string", length=50)
     */
    private $first_button;

    /**
     * @var string
     *
     * @ORM\Column(name="second_title", type="string", length=125)
     */
    private $second_title;

    /**
     * @var string
     *
     * @ORM\Column(name="second_description", type="text")
     */
    private $second_description;

    /**
     * @var string
     *
     * @ORM\Column(name="second_button", type="string", length=50)
     */
    private $second_button;

    /**
     * @var string
     *
     * @ORM\Column(name="third_title", type="string", length=125)
     */
    private $third_title;

    /**
     * @var string
     *
     * @ORM\Column(name="third_description", type="text")
     */
    private $third_description;

    /**
     * @var string
     *
     * @ORM\Column(name="third_button", type="string", length=50)
     */
    private $third_button;

    /**
     * @var string
     *
     * @ORM\Column(name="fourth_title", type="string", length=125)
     */
    private $fourth_title;

    /**
     * @var string
     *
     * @ORM\Column(name="fourth_description", type="text")
     */
    private $fourth_description;

    /**
     * @var string
     *
     * @ORM\Column(name="fourth_button", type="string", length=50)
     */
    private $fourth_button;

    /**
     * @var string
     *
     * @ORM\Column(name="fifth_title", type="string", length=125)
     */
    private $fifth_title;

    /**
     * @var string
     *
     * @ORM\Column(name="fifth_description", type="text")
     */
    private $fifth_description;

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
     * Set headerTitle
     *
     * @param string $headerTitle
     *
     * @return LandingPage
     */
    public function setHeaderTitle($headerTitle)
    {
        $this->header_title = $headerTitle;

        return $this;
    }

    /**
     * Get headerTitle
     *
     * @return string
     */
    public function getHeaderTitle()
    {
        return $this->header_title;
    }

    /**
     * Set headerSubtitle
     *
     * @param string $headerSubtitle
     *
     * @return LandingPage
     */
    public function setHeaderSubtitle($headerSubtitle)
    {
        $this->header_subtitle = $headerSubtitle;

        return $this;
    }

    /**
     * Get headerSubtitle
     *
     * @return string
     */
    public function getHeaderSubtitle()
    {
        return $this->header_subtitle;
    }

    /**
     * Set headerButton
     *
     * @param string $headerButton
     *
     * @return LandingPage
     */
    public function setHeaderButton($headerButton)
    {
        $this->header_button = $headerButton;

        return $this;
    }

    /**
     * Get headerButton
     *
     * @return string
     */
    public function getHeaderButton()
    {
        return $this->header_button;
    }

    /**
     * Set firstTitle
     *
     * @param string $firstTitle
     *
     * @return LandingPage
     */
    public function setFirstTitle($firstTitle)
    {
        $this->first_title = $firstTitle;

        return $this;
    }

    /**
     * Get firstTitle
     *
     * @return string
     */
    public function getFirstTitle()
    {
        return $this->first_title;
    }

    /**
     * Set firstDescription
     *
     * @param string $firstDescription
     *
     * @return LandingPage
     */
    public function setFirstDescription($firstDescription)
    {
        $this->first_description = $firstDescription;

        return $this;
    }

    /**
     * Get firstDescription
     *
     * @return string
     */
    public function getFirstDescription()
    {
        return $this->first_description;
    }

    /**
     * Set firstButton
     *
     * @param string $firstButton
     *
     * @return LandingPage
     */
    public function setFirstButton($firstButton)
    {
        $this->first_button = $firstButton;

        return $this;
    }

    /**
     * Get firstButton
     *
     * @return string
     */
    public function getFirstButton()
    {
        return $this->first_button;
    }

    /**
     * Set secondTitle
     *
     * @param string $secondTitle
     *
     * @return LandingPage
     */
    public function setSecondTitle($secondTitle)
    {
        $this->second_title = $secondTitle;

        return $this;
    }

    /**
     * Get secondTitle
     *
     * @return string
     */
    public function getSecondTitle()
    {
        return $this->second_title;
    }

    /**
     * Set secondDescription
     *
     * @param string $secondDescription
     *
     * @return LandingPage
     */
    public function setSecondDescription($secondDescription)
    {
        $this->second_description = $secondDescription;

        return $this;
    }

    /**
     * Get secondDescription
     *
     * @return string
     */
    public function getSecondDescription()
    {
        return $this->second_description;
    }

    /**
     * Set secondButton
     *
     * @param string $secondButton
     *
     * @return LandingPage
     */
    public function setSecondButton($secondButton)
    {
        $this->second_button = $secondButton;

        return $this;
    }

    /**
     * Get secondButton
     *
     * @return string
     */
    public function getSecondButton()
    {
        return $this->second_button;
    }

    /**
     * Set thirdTitle
     *
     * @param string $thirdTitle
     *
     * @return LandingPage
     */
    public function setThirdTitle($thirdTitle)
    {
        $this->third_title = $thirdTitle;

        return $this;
    }

    /**
     * Get thirdTitle
     *
     * @return string
     */
    public function getThirdTitle()
    {
        return $this->third_title;
    }

    /**
     * Set thirdDescription
     *
     * @param string $thirdDescription
     *
     * @return LandingPage
     */
    public function setThirdDescription($thirdDescription)
    {
        $this->third_description = $thirdDescription;

        return $this;
    }

    /**
     * Get thirdDescription
     *
     * @return string
     */
    public function getThirdDescription()
    {
        return $this->third_description;
    }

    /**
     * Set thirdButton
     *
     * @param string $thirdButton
     *
     * @return LandingPage
     */
    public function setThirdButton($thirdButton)
    {
        $this->third_button = $thirdButton;

        return $this;
    }

    /**
     * Get thirdButton
     *
     * @return string
     */
    public function getThirdButton()
    {
        return $this->third_button;
    }

    /**
     * Set fourthTitle
     *
     * @param string $fourthTitle
     *
     * @return LandingPage
     */
    public function setFourthTitle($fourthTitle)
    {
        $this->fourth_title = $fourthTitle;

        return $this;
    }

    /**
     * Get fourthTitle
     *
     * @return string
     */
    public function getFourthTitle()
    {
        return $this->fourth_title;
    }

    /**
     * Set fourthDescription
     *
     * @param string $fourthDescription
     *
     * @return LandingPage
     */
    public function setFourthDescription($fourthDescription)
    {
        $this->fourth_description = $fourthDescription;

        return $this;
    }

    /**
     * Get fourthDescription
     *
     * @return string
     */
    public function getFourthDescription()
    {
        return $this->fourth_description;
    }

    /**
     * Set fourthButton
     *
     * @param string $fourthButton
     *
     * @return LandingPage
     */
    public function setFourthButton($fourthButton)
    {
        $this->fourth_button = $fourthButton;

        return $this;
    }

    /**
     * Get fourthButton
     *
     * @return string
     */
    public function getFourthButton()
    {
        return $this->fourth_button;
    }

    /**
     * Set fifthTitle
     *
     * @param string $fifthTitle
     *
     * @return LandingPage
     */
    public function setFifthTitle($fifthTitle)
    {
        $this->fifth_title = $fifthTitle;

        return $this;
    }

    /**
     * Get fifthTitle
     *
     * @return string
     */
    public function getFifthTitle()
    {
        return $this->fifth_title;
    }

    /**
     * Set fifthDescription
     *
     * @param string $fifthDescription
     *
     * @return LandingPage
     */
    public function setFifthDescription($fifthDescription)
    {
        $this->fifth_description = $fifthDescription;

        return $this;
    }

    /**
     * Get fifthDescription
     *
     * @return string
     */
    public function getFifthDescription()
    {
        return $this->fifth_description;
    }

}

