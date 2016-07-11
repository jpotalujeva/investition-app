<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $investment_count;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $loan_count;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $investment_count
     */
    public function setInvestmentCount($investment_count)
    {
        $this->investment_count = $investment_count;
    }

    /**
     * @return mixed
     */
    public function getInvestmentCount()
    {
        return $this->investment_count;
    }

    /**
     * @param $loan_count
     */
    public function setLoanCount($loan_count)
    {
        $this->loan_count = $loan_count;
    }

    /**
     * @return mixed
     */
    public function getLoanCount()
    {
        return $this->loan_count;
    }

    public function getId()
    {
        return $this->id;
    }
}