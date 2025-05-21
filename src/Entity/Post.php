<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[Entity(repositoryClass: PostRepository::class)]
#[Table(name: 'posts')]
#[Gedmo\SoftDeleteable]
class Post
{
    use TimestampableEntity, SoftDeleteableEntity;

    #[Id, GeneratedValue]
    #[Column]
    private ?int $id = null;

    #[Column(type: 'string', length: 255)]
    private string $title;

    #[Column(type: 'text')]
    private string $content;

    #[OneToMany(targetEntity: Comment::class, mappedBy: 'post', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private ?Collection $comments = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}