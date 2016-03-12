<?php

namespace GalleriesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
//use Kit\SystemBundle\Entity\Entity as Entity;

/**
 * Gallery
 */
class GalleryImage //extends Entity
{
    /**
     * @var integer
     */
    private $id;

    
    /**
     * @var string
     */
    private $gallery;
    
    /**
     * @var string
     */
    private $gallery_id;
    
    /**
     * @var string
     */
    private $image;

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

    
    private $path = 'web/bundles/galleries/images';
    
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
     * Set objectId
     *
     * @param integer $objectId
     * @return Gallery
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
     * @return Gallery
     */
    public function setGalleryId($galleryId)
    {
        $this->gallery_id = $galleryId;

        return $this;
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return Gallery
     */
    public function getGalleryId()
    {
        return $this->gallery_id;
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
     * @return Gallery
     */
    public function setImage(UploadedFile $file = null)
    {
        $filename = sha1(uniqid(mt_rand(), true));
        $filename = $filename.'.'.$file->guessExtension();
        $file->move($this->getUploadRootDir(), $filename);
        

        
        $this->image = $filename;
    }

    public function preUpload()
    {
        if (null !== $this->getImage()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getFile()->guessExtension();
        }
    }
    
   /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getImage()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getImage()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }
    
    
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/uploads/galleries';
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir() . DIRECTORY_SEPARATOR . $this->getImage();
    }
    
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/galleries';
    }
    
  /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }
    
    
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Gallery
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
     * @return Gallery
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
     * @return Gallery
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
    
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;
        return $this;
    }
}
