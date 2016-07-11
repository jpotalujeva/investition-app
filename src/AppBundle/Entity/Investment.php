<?php
/**
 * Created by PhpStorm.
 * User: jpotalujeva
 * Date: 7/11/16
 * Time: 2:31 PM
 */

namespace AppBundle\Entity;


class Investment
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
     * @ORM\Column(type="int")
     * @Assert\NotBlank()
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", inversedBy="id")
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
    public function getId()
    {
        return $this->id;
    }
}