<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Activity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product {

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
	 * @var integer 
	 * @ORM\Column(name="stock", type="integer")
	 * @Assert\GreaterThanOrEqual(
	 * value = 0,
	 * message="This value should be greater than or equal to {{ compared_value }}."
	 * )
	 * 
	 */
	private $stock;

	/**
	 *
	 * @var float
	 * @ORM\Column(name="id", type="integer")
	 * @Assert\NotBlank()
	 */
	private $price;

	/**
	 *
	 * @var date
	 * @ORM\Column(name="id", type="integer")
	 */
	private $date;

	/**
	 *
	 * @var Activity
	 * @ORM\ManyToOne (targetEntity="Activity", inversedBy="products")
	 * @ORM\JoinColumn (name="activity_id", referencedColumnName="id", nullable=false)
	 */
	private $activity;

	/**
	 *
	 * @var arrayCollection
	 * @ORM\OneToMany(targetEntity="Article", mappedBy="product")
	 */
	private $productAttributes;

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	public function getStock() {
		return $this->stock;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getDate() {
		return $this->date;
	}

	public function getActivity() {
		return $this->activity;
	}

	public function getProductAttributes() {
		return $this->productAttributes;
	}

	public function setStock($stock) {
		$this->stock = $stock;
		return $this;
	}

	public function setPrice($price) {
		$this->price = $price;
		return $this;
	}

	public function setDate(date $date) {
		$this->date = $date;
		return $this;
	}

	public function setActivity(Activity $activity) {
		$this->activity = $activity;
		return $this;
	}

	public function setProductAttributes(arrayCollection $productAttributes) {
		$this->productAttributes = $productAttributes;
		return $this;
	}

}
