<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="need_proxy", type="boolean", unique=false, options={"default" : 0})
     */
    private $need_proxy;


    /**
     * @ORM\OneToMany(targetEntity="Proxy", mappedBy="event",cascade={"persist", "remove"})
     */
    private $proxies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proxys = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->date;
    }

    /**
     * Add proxy
     *
     * @param \AppBundle\Entity\Proxy $proxy
     *
     * @return Event
     */
    public function addProxy(\AppBundle\Entity\Proxy $proxy)
    {
        $this->proxys[] = $proxy;

        return $this;
    }

    /**
     * Remove proxy
     *
     * @param \AppBundle\Entity\Proxy $proxy
     */
    public function removeProxy(\AppBundle\Entity\Proxy $proxy)
    {
        $this->proxys->removeElement($proxy);
    }

    /**
     * Get proxys
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProxys()
    {
        return $this->proxys;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Event
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get proxies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProxies()
    {
        return $this->proxies;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set needProxy
     *
     * @param boolean $needProxy
     *
     * @return Event
     */
    public function setNeedProxy($needProxy)
    {
        $this->need_proxy = $needProxy;

        return $this;
    }

    /**
     * Get needProxy
     *
     * @return boolean
     */
    public function getNeedProxy()
    {
        return $this->need_proxy;
    }
}
