<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\User;
use AppBundle\Entity\Activity;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentRepository")
 */
class Comment {

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
	 * @ORM\Column (type="text")
	 */
	private $comment;
	
	/**
	 *
	 * @var int
	 * @ORM\Column (type="integer")
	 * @Assert\NotBlank()
	 * @Assert\LessThanOrEqual(value=5, message="This value should be less than or equal to {{ compared_value }}")
	 * @Assert\GreaterThanOrEqual(value=0, message="This value should be greater than or equal to {{ compared_value }}")
	 */
	private $note;
	
	/**
	 *
	 * @var date
	 * @ORM\Column (type="date")
	 */
	private $date;
	
	/**
	 *
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
	 */
	private $user;
	
	/**
	 *
	 * @var Activity
	 * @ORM\ManyToOne(targetEntity="Activity")
	 * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", nullable=false)
	 */
	private $activity;
	
	
	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	public function getComment() {
		return $this->comment;
	}

	public function getNote() {
		return $this->note;
	}

	public function getDate() {
		return $this->date;
	}

	public function getUser() {
		return $this->user;
	}

	public function getActivity() {
		return $this->activity;
	}

	public function setComment($comment) {
		$this->comment = $comment;
		return $this;
	}

	public function setNote($note) {
		$this->note = $note;
		return $this;
	}

	public function setDate(date $date) {
		$this->date = $date;
		return $this;
	}

	public function setUser(User $user) {
		$this->id_user = $user;
		return $this;
	}

	public function setActivity(Activity $activity) {
		$this->id_activity = $activity;
		return $this;
	}

}
