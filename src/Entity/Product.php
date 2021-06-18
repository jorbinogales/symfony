<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Category;

use App\Repository\ProductRepository;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\Table(name="Product")
 * @ORM\Entity()
 */

class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "The code  {{ limit }} characters long",
     *      maxMessage = "The code {{ limit }} characters long"
     * )
     *  @Assert\Regex( 
     * pattern = "/^[a-z0-9]*$/i", 
     * htmlPattern = "^[a-zA-Z0-9]*$", 
     * message="the code just contain text and number"
     * ) 
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "The code  {{ limit }} characters long",
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    // private $description;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $brand;

    // /**
    //  * @ORM\ManyToOne(targetEntity=Category::class)
    //  * @ORM\JoinColumn(nullable=false)
    //  */
    // private $category;

    // /**
    //  * @ORM\Column(type="float")
    //  */
    // private $price;



    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

     /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    // public function getDescription(): ?string
    // {
    //     return $this->description;
    // }

    // public function setDescription(string $description): self
    // {
    //     $this->description = $description;

    //     return $this;
    // }

    // public function getBrand(): ?string
    // {
    //     return $this->brand;
    // }

    // public function setBrand(string $brand): self
    // {
    //     $this->brand = $brand;

    //     return $this;
    // }

    // public function getPrice(): ?float
    // {
    //     return $this->price;
    // }

    // public function setPrice(float $price): self
    // {
    //     $this->price = $price;

    //     return $this;
    // }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTimeInterface $timestamp): void
    {
        $this->createdAt = new \DateTime();
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(?DateTimeInterface $timestamp): void
    {
        $this->updatedAt =new \DateTime();
    }

    
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {

        $this->category = $category;

        return $this;
    }
    

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtAutomatically()
    {
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime());
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtAutomatically()
    {
        $this->setUpdatedAt(new DateTime());
    }



}
