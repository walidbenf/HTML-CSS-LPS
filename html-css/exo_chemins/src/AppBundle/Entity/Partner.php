<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Partner
 *
 * @ORM\Table(name="partner")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartnerRepository")
 * @UniqueEntity(fields="email", message="This email already exists")
 * @UniqueEntity(fields="pseudo", message="This username is not available")
 * @UniqueEntity(fields="company", message="This company has already an account")
 * @UniqueEntity(fields="commercialRegistry", message="This commercial registry is already used")
 */
class Partner {

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=100, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 3,
	 *      max = 100,
	 *      minMessage = "Your company name must be at least {{ limit }} characters long",
	 *      maxMessage = "Your company name cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $company;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=45)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 3,
	 *      max = 45,
	 *      minMessage = "Your contact firstname must be at least {{ limit }} characters long",
	 *      maxMessage = "Your contact firstname cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $firstname;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string" , length=45)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 3,
	 *      max = 45,
	 *      minMessage = "Your contact lastname must be at least {{ limit }} characters long",
	 *      maxMessage = "Your contact lastname cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $lastname;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=45)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 3,
	 *      max = 45,
	 *      minMessage = "Your login must be at least {{ limit }} characters long",
	 *      maxMessage = "Your login cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $pseudo;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=45, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Email(
	 *     message = "The email '{{ value }}' is not a valid email.",
	 *     checkMX = true
	 * )
	 */
	private $email;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string")
	 * 
	 */
	private $password;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=14, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Regex(
	 *     pattern="/^[0-9]$/",
	 *     match=true,
	 *     message="Your commercial registry must contain numbers only"
	 * )
	 * @Assert\Length(
	 *      min = 14,
	 *      max = 14,
	 *      exactMessage = "This value should have exactly {{ limit }} characters."
	 * )
	 */
	private $commercialRegistry;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=250)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 5,
	 *      max = 250,
	 *      minMessage = "Your address must be at least {{ limit }} characters long",
	 *      maxMessage = "Your address cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $address;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=5)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 5,
	 *      max = 5,
	 *      exactMessage = "This value should have exactly {{ limit }} characters."
	 * )
	 */
	private $zip;

	/**
	 *
	 * @var string
	 * @ORM\Column (type="string", length=100)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *      min = 5,
	 *      max = 250,
	 *      minMessage = "The city must be at least {{ limit }} characters long",
	 *      maxMessage = "The city cannot be longer than {{ limit }} characters"
	 * )
	 */
	private $city;

	/**
	 *
	 * @var date
	 * @ORM\Column (type="date")
	 */
	private $registerDate;

	/**
	 *
	 * @var string
	 * @Assert\NotBlank()
	 * @Assert\Length(min="6")
	 */
	private $plainPassword; //password en clair, pas encore encrypté

	
	/**
	 *
	 * @var ArrayCollection
	 * @ORM\OneToMany(targetEntity="Activity", mappedBy="id_partner")
	 */
	private $activities;


	public function getId() {
		return $this->id;
	}

	public function getCompany() {
		return $this->company;
	}

	public function getFirstname() {
		return $this->firstname;
	}

	public function getLastname() {
		return $this->lastname;
	}

	public function getPseudo() {
		return $this->pseudo;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getCommercialRegistry() {
		return $this->commercialRegistry;
	}

	public function getAddress() {
		return $this->address;
	}

	public function getZip() {
		return $this->zip;
	}

	public function getCity() {
		return $this->city;
	}

	public function getRegisterDate() {
		return $this->registerDate;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setCompany($company) {
		$this->company = $company;
		return $this;
	}

	public function setFirstname($firstname) {
		$this->firstname = $firstname;
		return $this;
	}

	public function setLastname($lastname) {
		$this->lastname = $lastname;
		return $this;
	}

	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
		return $this;
	}

	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}

	public function setCommercialRegistry($commercialRegistry) {
		$this->commercialRegistry = $commercialRegistry;
		return $this;
	}

	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}

	public function setZip($zip) {
		$this->zip = $zip;
		return $this;
	}

	public function setCity($city) {
		$this->city = $city;
		return $this;
	}

	public function setRegisterDate(date $registerDate) {
		$this->registerDate = $registerDate;
		return $this;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getPlainPassword() {
		return $this->plainPassword;
	}

	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}

	public function setPlainPassword($plainPassword) {
		$this->plainPassword = $plainPassword;
		return $this;
	}
	
	public function setActivities(ArrayCollection $activities){
		$this->articles= $activities;
	}
	
	public function addActivity(Activity $activity){
		$this->articles[]= $activity;
	}
	
	public function removeActivity(Activity $activity){
		$this->articles->removeElement($activity);
	}
}
