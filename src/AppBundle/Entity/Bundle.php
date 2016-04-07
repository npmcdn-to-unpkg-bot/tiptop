<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bundle
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="app_bundles")
 */
class Bundle
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * 
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(length=40)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="isActive", type="integer")
     * @var bool
     */
    private $isActive;

    /**
     * @ORM\Column(name="isSystem", type="integer")
     * @var bool
     */
    private $isSystem;
    
    /**
     * @ORM\Column(name="orderBy", type="integer")
     * @var int
     */
    private $orderBy;
    
    /**
     * Set id
     *
     * @param integer $id
     * @return Bundle
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set name
     *
     * @param string $name
     * @return Bundle
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isActive
     *
     * @param \bool $isActive
     * @return Bundle
     */
    public function setIsActive(\bool $isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return \bool 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * Set isSystem
     *
     * @param \bool $isSystem
     * @return Bundle
     */
    public function setIsSystem(\bool $isSystem)
    {
        $this->isSystem = $isSystem;

        return $this;
    }

    /**
     * Get isSystem
     *
     * @return \bool 
     */
    public function getIsSystem()
    {
        return $this->isSystem;
    }
    
    /**
     * Set orderBy
     *
     * @param \int $orderBy
     * @return Bundle
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get orderBy
     *
     * @return \int 
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }
}
