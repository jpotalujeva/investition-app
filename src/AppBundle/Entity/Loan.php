<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Loan
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $amount;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $availableForInvestments;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank()
     */
    private $investments;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAvailableForInvestments()
    {
        return $this->availableForInvestments;
    }

    /**
     * @param $availableForInvestments
     */
    public function setAvailableForInvestments($availableForInvestments)
    {
        $this->availableForInvestments = $availableForInvestments;
    }

    /**
     * @return mixed
     */
    public function getInvestments()
    {
        return $this->investments;
    }

    /**
     * @param mixed $investments
     */
    public function setInvestments($investments)
    {
        $this->investments = $investments;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}