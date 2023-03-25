<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hobby
 *
 * @ORM\Table(name="hobby")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HobbyRepository")
 */
class Hobby
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
     *
     * @var int
     * 
     * @ORM\Column(name="note", type="integer", nullable=false)
     * @Assert\NotBlank()
     */
    private $note;
    
    /**
     *
     * @var User
     * 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="hobbies")
     */
    private $user;
    
    /**
     *
     * @var Category
     * 
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="hobbies")
     */
    private $category;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getNote() {
        return $this->note;
    }

    public function getUser() {
        return $this->user;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function setUser(User $user) {
        $this->user = $user;
        return $this;
    }

    public function setCategory(Category $category) {
        $this->category = $category;
        return $this;
    }


    
}

