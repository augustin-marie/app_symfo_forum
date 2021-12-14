<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Text;

    /**
     * @ORM\Column(type="integer")
     */
    private $UpVotes;

    /**
     * @ORM\Column(type="integer")
     */
    private $DownVotes;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdUser;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdPost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getUpVotes(): ?int
    {
        return $this->UpVotes;
    }

    public function setUpVotes(int $UpVotes): self
    {
        $this->UpVotes = $UpVotes;

        return $this;
    }

    public function getDownVotes(): ?int
    {
        return $this->DownVotes;
    }

    public function setDownVotes(int $DownVotes): self
    {
        $this->DownVotes = $DownVotes;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->IdUser;
    }

    public function setIdUser(?User $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
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
}
