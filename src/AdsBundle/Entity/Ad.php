<?php

namespace AdsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Entity as Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
//use AdsBundle\Repository\Ad;

/**
 * Class Ad
 * @package AdBundle\Entity
 * @ORM\Entity(repositoryClass="AdsBundle\Repository\Ad")
 * @ORM\Table(name="app_ad")
 */
class Ad extends Entity
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
     * @ORM\Column(name="image", length=255, nullable=true)
     * 
     * @var string
     */
    private $image;
    
    /**
     * @ORM\Column(length=255)
     * @Assert\NotNull
     * 
     * @var string
     */
    private $title;
    
    /**
     * @ORM\Column
     * 
     * @var text
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     * 
     * @var \DateTime
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "body"})
     * 
     * @var \DateTime
     */
    private $updated;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * 
     * @var \DateTime
     */
    private $deleted;


    /**
     * Set id
     *
     * @param integer $id
     * @return Ad
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
     * Set image
     *
     * @param string $image
     */
    public function setImage(UploadedFile $file = null)
    {
        $filename = sha1(uniqid(mt_rand(), true));
        $filename = $filename.'.'.$file->guessExtension();
        $file->move($this->getUploadRootDir(), $filename);
        
        $this->image = $filename;

        return $this;
    }
    
    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
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
     * Set created
     *
     * @param \DateTime $created
     * @return Ad
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Ad
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set deleted
     *
     * @param \DateTime $deleted
     * @return Ad
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return \DateTime 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
    
    /**
     * Get Array
     * @return array
     */
//    public function toArray()
//    {
//        return array(
//            'id' => $this->getId(),
//            'title' => $this->getTitle(),
//            'image' => $this->getImage(),
//            'body' => $this->getBody()
//        );
//    }
    
    /**
     * Get UploadRootDir
     * 
     * @return type
     */
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
}
