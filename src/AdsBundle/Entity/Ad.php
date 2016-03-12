<?php

namespace AdsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Entity as Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Ad
 */
class Ad extends Entity
{
    /**
     * @var integer
     */
    private $id;
    
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $image;
    
    /**
     * @var string
     */
    private $body;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \DateTime
     */
    private $deletedAt;


    /**
     * Set objectId
     *
     * @param integer $objectId
     * @return Ad
     */
    public function setId($id)
    {
        $this->objectId = $id;

        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set objectId
     *
     * @param integer $objectId
     * @return Ad
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Ad
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
     * Set title
     *
     * @param string $title
     * @return Page
     */
    public function setImage(UploadedFile $file = null)
    {
        
        $filename = sha1(uniqid(mt_rand(), true));
        $filename = $filename.'.'.$file->guessExtension();
        $file->move($this->getUploadRootDir(), $filename);
        
        $this->image = $filename;

        return $this;
    }
    
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/uploads/ads';
    }
    
    /**
     * Get the image URL
     *
     * @return null|string
     */
    public function getWebPath()
    {
        return '/uploads/pages/' . $this->getImage();
    }
    
    /**
     * Get title
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
    
    
    /**
     * Set body
     *
     * @param string $body
     * @return Ad
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Ad
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Ad
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Ad
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
}
