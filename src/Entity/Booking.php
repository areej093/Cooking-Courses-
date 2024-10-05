<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
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
    private $customer_name;

    /**
     * @ORM\Column(type="date")
     */
    private $start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $end_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $choose_the_chef;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $choose_the_course;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $customer_email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerName(): ?string
    {
        return $this->customer_name;
    }

    public function setCustomerName(string $customer_name): self
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getChooseTheChef(): ?string
    {
        return $this->choose_the_chef;
    }

    public function setChooseTheChef(string $choose_the_chef): self
    {
        $this->choose_the_chef = $choose_the_chef;

        return $this;
    }
    public function getChooseTheCourse(): ?string
    {
        return $this->choose_the_course;
    }

    public function setChooseTheCourse(string $choose_the_course): self
    {
        $this->choose_the_course = $choose_the_course;

        return $this;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customer_email;
    }

    public function setCustomerEmail(string $customer_email): self
    {
        $this->customer_email = $customer_email;

        return $this;
    }
}
