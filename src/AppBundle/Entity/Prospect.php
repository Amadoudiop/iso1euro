<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as ProspectAssert;

/**
 * Prospect
 *
 * @ORM\Table(name="prospect")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProspectRepository")
 */
class Prospect
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
     * @var float

     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 10,
     *      minMessage = "minimum 10",
     * )
     * @ORM\Column(name="livrable_surface", type="float", length=10)
     */
    private $livrableSurface;

    /**
     * @var float
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 10,
     *      minMessage = "minimum 10",
     * )
     * @ORM\Column(name="loft_surface", type="float", length=10)
     */
    private $loftSurface;

    /**
     * @var int
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "Il doit avoir au moins une personne dans le foyer",
     * )
     * @ORM\Column(name="household", type="string", length=125)
     */
    private $household;

    /**
     * @var float
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      minMessage = "minimum 1su",
     * )
     * @ORM\Column(name="income_tax_reference", type="float", length=10)
     */
    private $incomeTaxReference;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="name", type="string", length=125)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="first_name", type="string", length=125)
     */
    private $firstName;

    /**
     * @var string
     * @Assert\NotBlank
     * @ProspectAssert\IsPhone
     * @ORM\Column(name="phone", type="string", length=12)
     */
    private $phone;

    /**
     * @var string
     * @Assert\NotBlank
     * @ProspectAssert\IsZipCode
     * @ORM\Column(name="zip_code", type="string", length=50)
     */
    private $zipCode;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(name="city", type="string", length=125)
     */
    private $city;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=125)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_update", type="date")
     */
    private $lastUpdate;

    /**
     * Many Prospects have One LoftType.
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="LoftType", inversedBy="prospects")
     * @ORM\JoinColumn(name="loft_type_id", referencedColumnName="id")
     */
    private $loftType;


    /**
     * Many Prospects have One HeatSystem.
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="HeatSystem", inversedBy="prospects")
     * @ORM\JoinColumn(name="heat_system_id", referencedColumnName="id")
     */
    private $heatSystem;

    /**
     * Many Prospects have One CallAvailability.
     * @ORM\ManyToOne(targetEntity="CallAvailability", inversedBy="prospects")
     * @ORM\JoinColumn(name="call_availability_id", referencedColumnName="id")
     */
    private $callAvailability;

    /**
     * Many Prospects have One Status.
     *
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="prospects")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;


    public function __construct()
    {
        $this->lastUpdate = new \DateTime();
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
     * Set livrableSurface
     *
     * @param float $livrableSurface
     *
     * @return Prospect
     */
    public function setLivrableSurface($livrableSurface)
    {
        $this->livrableSurface = $livrableSurface;

        return $this;
    }

    /**
     * Get livrableSurface
     *
     * @return float
     */
    public function getLivrableSurface()
    {
        return $this->livrableSurface;
    }

    /**
     * Set loftSurface
     *
     * @param float $loftSurface
     *
     * @return Prospect
     */
    public function setLoftSurface($loftSurface)
    {
        $this->loftSurface = $loftSurface;

        return $this;
    }

    /**
     * Get loftSurface
     *
     * @return float
     */
    public function getLoftSurface()
    {
        return $this->loftSurface;
    }

    /**
     * Set household
     *
     * @param string $household
     *
     * @return Prospect
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
     * Set incomeTaxReference
     *
     * @param float $incomeTaxReference
     *
     * @return Prospect
     */
    public function setIncomeTaxReference($incomeTaxReference)
    {
        $this->incomeTaxReference = $incomeTaxReference;

        return $this;
    }

    /**
     * Get incomeTaxReference
     *
     * @return float
     */
    public function getIncomeTaxReference()
    {
        return $this->incomeTaxReference;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Prospect
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Prospect
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Prospect
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Prospect
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Prospect
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Prospect
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
     * Set loftType
     *
     * @param \AppBundle\Entity\LoftType $loftType
     *
     * @return Prospect
     */
    public function setLoftType(\AppBundle\Entity\LoftType $loftType = null)
    {
        $this->loftType = $loftType;

        return $this;
    }

    /**
     * Get loftType
     *
     * @return \AppBundle\Entity\LoftType
     */
    public function getLoftType()
    {
        return $this->loftType;
    }

    /**
     * Set heatSystem
     *
     * @param \AppBundle\Entity\HeatSystem $heatSystem
     *
     * @return Prospect
     */
    public function setHeatSystem(\AppBundle\Entity\HeatSystem $heatSystem = null)
    {
        $this->heatSystem = $heatSystem;

        return $this;
    }

    /**
     * Get heatSystem
     *
     * @return \AppBundle\Entity\HeatSystem
     */
    public function getHeatSystem()
    {
        return $this->heatSystem;
    }

    /**
     * Set callAvailability
     *
     * @param \AppBundle\Entity\CallAvailability $callAvailability
     *
     * @return Prospect
     */
    public function setCallAvailability(\AppBundle\Entity\CallAvailability $callAvailability = null)
    {
        $this->callAvailability = $callAvailability;

        return $this;
    }

    /**
     * Get callAvailability
     *
     * @return \AppBundle\Entity\CallAvailability
     */
    public function getCallAvailability()
    {
        return $this->callAvailability;
    }

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     *
     * @return Prospect
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Prospect
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }
}
