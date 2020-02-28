<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\SexRepository")
 */
class Sex
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Beneficiary", mappedBy="sex")
     */
    private $beneficiary;

    public function __construct()
    {
        $this->beneficiary = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|Beneficiary[]
     */
    public function getBeneficiary(): Collection
    {
        return $this->beneficiary;
    }

    public function addBeneficiary(Beneficiary $beneficiary): self
    {
        if (!$this->beneficiary->contains($beneficiary)) {
            $this->beneficiary[] = $beneficiary;
            $beneficiary->setSex($this);
        }

        return $this;
    }

    public function removeBeneficiary(Beneficiary $beneficiary): self
    {
        if ($this->beneficiary->contains($beneficiary)) {
            $this->beneficiary->removeElement($beneficiary);
            // set the owning side to null (unless already changed)
            if ($beneficiary->getSex() === $this) {
                $beneficiary->setSex(null);
            }
        }

        return $this;
    }
}
