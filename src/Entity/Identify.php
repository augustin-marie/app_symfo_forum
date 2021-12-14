<?php

namespace App\Entity;

use App\Repository\IdentifyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdentifyRepository::class)
 */
class Identify
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdPost;

    /**
     * @ORM\ManyToOne(targetEntity=Tag::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdTag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPost(): ?Post
    {
        return $this->IdPost;
    }

    public function setIdPost(?Post $IdPost): self
    {
        $this->IdPost = $IdPost;

        return $this;
    }

    public function getIdTag(): ?Tag
    {
        return $this->IdTag;
    }

    public function setIdTag(?Tag $IdTag): self
    {
        $this->IdTag = $IdTag;

        return $this;
    }
}
