<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Loan
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $amount;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $available_for_investments;

    /**
     * @ORM\Column(type="text")
     * @ORM\OneToMany(targetEntity="Investment", mappedBy="loan")
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
        return $this->available_for_investments;
    }

    /**
     * @param $available_for_investments
     */
    public function setAvailableForInvestments($available_for_investments)
    {
        $this->available_for_investments = $available_for_investments;
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