<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Investment
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
    private $money;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Loan", inversedBy="investments")
     * @ORM\JoinColumn(name="investments", referencedColumnName="investments")
     */
    private $investments;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="User", inversedBy="investments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user_id;

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }

    /**
     * @return mixed
     */
    public function getInvestments()
    {
        return $this->investments;
    }

    /**
     * @param $investments
     */
    public function setInvestments($investments)
    {
        $this->investments = $investments;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}