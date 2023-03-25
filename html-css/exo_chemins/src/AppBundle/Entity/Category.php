<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 */
class Category
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
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length="100")
     * @Assert\NotBlank()
     */
    private $name;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="description", type="string")
     * @Assert\NotBlank()
     * @Assert\Length(min = 20, minMessage = "Your category's description must be at least {{ limit }} characters long")
     */
    private $description;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="photo", type="text", nullable=true)
     */
    private $photo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }


    
}

