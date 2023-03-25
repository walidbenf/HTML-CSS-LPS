<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Partner;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivityRepository")
 */
class Activity {

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="participantSolo", type="boolean")
	 */
	private $participantSolo;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="participantDuo", type="boolean")
	 */
	private $participantDuo;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="participantFamily", type="boolean")
	 */
	private $participantFamily;

	/**
	 * @var bool
	 *
	 * @ORM\Column(name="participantFriend", type="boolean")
	 */
	private $participantFriend;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=255)
	 * @Assert\NotBlank()
	 * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Your activity's title must be at least {{ limit }} characters long",
     *      maxMessage = "Your activity's title cannot be longer than {{ limit }} characters"
     * )
	 * 
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="address", type="string", length=255)
	 * @Assert\NotBlank()
	 * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "Your activity's address must be at least {{ limit }} characters long",
     *      maxMessage = "Your activity's address cannot be longer than {{ limit }} characters"
     * )
	 */
	private $address;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="zip", type="string", length=5)
	 * @Assert\NotBlank()
	 * @Assert\Length(
     *      min = 5,
     *      max = 5,
     *      exactMessage = "Your activity's zip should have exactly {{ limit }} characters"
     * )
	 */
	private $zip;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="city", type="string", length=100)
	 */
	private $city;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 * @Assert\NotBlank()
	 * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Your activity's city must be at least {{ limit }} characters long",
     *      maxMessage = "Your activity's city cannot be longer than {{ limit }} characters"
     * )
	 */
	private $description;

	/**
	 * @var \Date
	 *
	 * @ORM\Column(name="recordingDate", type="date")
	 */
	private $recordingDate;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="category", type="integer")
	 * @ORM\ManyToOne(targetEntity="Category")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)	
	 */
	private $category;

	/**
	 * @var Partner
	 *
	 * @ORM\Column(name="partner", type="integer")
	 * @ORM\ManyToOne(targetEntity="Partner")
	 * @ORM\JoinColumn(name="partner_id", referencedColumnName="id", nullable=false)	
	 * 
	 */
	private $partner;
	

	/**
	 *
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="Product", mappedBy="activities")
	 */
	private $products;
	
	/**
	 *
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="Photo", mappedBy="activities")
	 */
	private $photos;
	
	/**
	 *
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="Comment", mappedBy="activities")
	 */
	private $comments;


	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set participantSolo
	 *
	 * @param boolean $participantSolo
	 *
	 * @return Activity
	 */
	public function setParticipantSolo($participantSolo) {
		$this->participantSolo = $participantSolo;

		return $this;
	}

	/**
	 * Get participantSolo
	 *
	 * @return bool
	 */
	public function getParticipantSolo() {
		return $this->participantSolo;
	}

	/**
	 * Set participantDuo
	 *
	 * @param boolean $participantDuo
	 *
	 * @return Activity
	 */
	public function setParticipantDuo($participantDuo) {
		$this->participantDuo = $participantDuo;

		return $this;
	}

	/**
	 * Get participantDuo
	 *
	 * @return bool
	 */
	public function getParticipantDuo() {
		return $this->participantDuo;
	}

	/**
	 * Set participantFamily
	 *
	 * @param boolean $participantFamily
	 *
	 * @return Activity
	 */
	public function setParticipantFamily($participantFamily) {
		$this->participantFamily = $participantFamily;

		return $this;
	}

	/**
	 * Get participantFamily
	 *
	 * @return bool
	 */
	public function getParticipantFamily() {
		return $this->participantFamily;
	}

	/**
	 * Set participantFriend
	 *
	 * @param boolean $participantFriend
	 *
	 * @return Activity
	 */
	public function setParticipantFriend($participantFriend) {
		$this->participantFriend = $participantFriend;

		return $this;
	}

	/**
	 * Get participantFriend
	 *
	 * @return bool
	 */
	public function getParticipantFriend() {
		return $this->participantFriend;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 *
	 * @return Activity
	 */
	public function setTitle($title) {
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set address
	 *
	 * @param string $address
	 *
	 * @return Activity
	 */
	public function setAddress($address) {
		$this->address = $address;

		return $this;
	}

	/**
	 * Get address
	 *
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Set zip
	 *
	 * @param string $zip
	 *
	 * @return Activity
	 */
	public function setZip($zip) {
		$this->zip = $zip;

		return $this;
	}

	/**
	 * Get zip
	 *
	 * @return string
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Set city
	 *
	 * @param string $city
	 *
	 * @return Activity
	 */
	public function setCity($city) {
		$this->city = $city;

		return $this;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Activity
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set recordingDate
	 *
	 * @param \DateTime $recordingDate
	 *
	 * @return Activity
	 */
	public function setRecordingDate($recordingDate) {
		$this->recordingDate = $recordingDate;

		return $this;
	}

	/**
	 * Get recordingDate
	 *
	 * @return \DateTime
	 */
	public function getRecordingDate() {
		return $this->recordingDate;
	}

	/**
	 * Set category
	 *
	 * @param integer $category
	 *
	 * @return Activity
	 */
	public function setCategory($category) {
		$this->category = $category;

		return $this;
	}

	/**
	 * Get category
	 *
	 * @return int
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Set partner
	 *
	 * @param integer $partner
	 *
	 * @return Activity
	 */
	public function setPartner(Partner $partner) {
		$this->partner = $partner;

		return $this;
	}

	/**
	 * Get partner
	 *
	 * @return int
	 */
	public function getPartner() {
		return $this->partner;
	}
	public function getProducts() {
		return $this->products;
	}

	public function getPhotos() {
		return $this->photos;
	}

	public function getComments() {
		return $this->comments;
	}

	public function setProducts(ArrayCollection $products) {
		$this->products = $products;
		return $this;
	}

	public function setPhotos(ArrayCollection $photos) {
		$this->photos = $photos;
		return $this;
	}

	public function setComments(ArrayCollection $comments) {
		$this->comments = $comments;
		return $this;
	}


}
