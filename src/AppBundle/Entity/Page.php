<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Page
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Page")
 * @ORM\Table(name="app_page")
 */
class Page
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
     * @ORM\Column(length=255)
     * 
     * @var string
     */
    private $slug;
    
    /**
     * @ORM\Column(length=255)
     * @Assert\NotNull
     * 
     * @var string
     */
    private $title;
    
    /**
     * @ORM\Column(length=255)
     * 
     * @var string
     */
    private $image;
    
    /**
     * @ORM\Column(name="nameInMenu", length=255)
     * 
     * @var string
     */
    private $nameInMenu;    

    /**
     * @ORM\Column(name="body", type="text")
     * 
     * @var text
     */
    private $body;

    /**
     * @ORM\Column(length=255)
     * 
     * @var string
     */
    private $keywords;

    /**
     * @ORM\Column(length=255)
     * 
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="datetime", nullable=false)
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
     * @return Page
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
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return Page
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
        if (null !== $file)
        {
            $filename = sha1(uniqid(mt_rand(), true));
            $filename = $filename.'.'.$file->guessExtension();
            $file->move($this->getUploadRootDir(), $filename);

            $this->image = $filename;
        }

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
     * Set nameInMenu
     *
     * @param string $nameInMenu
     * @return Page
     */
    public function setNameInMenu($nameInMenu)
    {
        $this->nameInMenu = $nameInMenu;

        return $this;
    }
    
    /**
     * Get nameInMenu
     *
     * @return string 
     */
    public function getNameInMenu()
    {
        return $this->nameInMenu;
    }
    
    /**
     * Set body
     *
     * @param string $body
     * @return Page
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
     * Set keywords
     *
     * @param string $keywords
     * @return Page
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }
    
    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Page
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
     * Set created
     *
     * @param \DateTime $created
     * @return Page
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
    
    /**
     * Get createdAt
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
     * @param \DateTime $updatedAt
     * @return Page
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
     * @return Page
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
    
    /*
     * Get UploadRootDir
     * 
     * @return string
     */
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/uploads/pages';
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
