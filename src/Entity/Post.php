<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
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
    private $IdUtilisateur;

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

    public function getIdUtilisateur(): ?User
    {
        return $this->IdUtilisateur;
    }

    public function setIdUtilisateur(?User $IdUtilisateur): self
    {
        $this->IdUtilisateur = $IdUtilisateur;

        return $this;
    }
}
