<?php
namespace App\Traits;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
trait TimeStampTrait{
    #[ORM\Column(nullable: true)]
    private ?\DateTime $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    #[ORM\PrePersist()]
    public function onPrePersist(){
        $this->createdAt=new \DateTime();
        $this->updatedAt=new \DateTime();
    }
    #[ORM\PreUpdate()]
    public function onPreUpdate(){
        $this->updatedAt=new \DateTime();
    }
}