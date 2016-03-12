<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 */
class Object
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;


    /**
     * Set id
     *
     * @param \int $id
     * @return Object
     */
    public function setId(\int $id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return \int 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Object
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }
}
