<?php
namespace App\Traits;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
trait SlugTrait{
    #[ORM\Column(length: 100)]
    private ?string $slug = null;
    public function getSlug():?string
    {
        return $this->slug;
    }
    public function setSlug(string $slug):self
    {
        $this->slug=$slug;
        return $this;
    }
}