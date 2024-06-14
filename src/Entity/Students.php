<?php

namespace App\Entity;

use App\Repository\StudentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

#[ORM\Entity(repositoryClass: StudentsRepository::class)]
class Students
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Name should not be blank.")]
    #[Assert\Length(min: 6, minMessage: "Name must be at least 6 characters long.")]
    #[Assert\Length(max: 50, maxMessage: "Name cannot be longer than 50 characters.")]
    private ?string $Name = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message: "Department should not be blank.")]
    private ?string $department = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Enrollment ID should not be blank.")]
    #[Assert\Type(type: "integer", message: "Enrollment ID must be an integer.")]
    private ?int $enrollmentId = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Address should not be blank.")]
    #[Assert\Length(min: 6, minMessage: "Address must be at least 6 characters long.")]
    #[Assert\Length(max: 255, maxMessage: "Address cannot be longer than 255 characters.")]
    private ?string $address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): static
    {
        $this->department = $department;

        return $this;
    }

    public function getEnrollmentId(): ?int
    {
        return $this->enrollmentId;
    }

    public function setEnrollmentId(int $enrollmentId): static
    {
        $this->enrollmentId = $enrollmentId;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }
}
