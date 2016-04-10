<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile as UploadedFile;

/**
 * Class Setting
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Setting")
 * @ORM\Table(name="app_settings")
 */
class Setting {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * 
     * @var integer
     */
    private $name;
    
    /**
     * @ORM\Column
     * 
     * @var text
     */
    private $value;
    
    /**
     * @ORM\Column(length=64)
     * 
     * @var string
     */
    private $type;
    
    /**
     * @ORM\Column(length=64)
     * 
     * @var string
     */
    private $section;
    
    //protected $module_id;

    private $path = 'web/uploads/system';
    
    /**
     * Set name
     *
     * @param string $name
     * @return string
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
     * Set value
     *
     * @param text $value
     * @return Setting
     */
    public function setValue($value)
    {
        if ($value instanceof UploadedFile)
        {
            $filename = sha1(uniqid(mt_rand(), true));
            $filename = $filename.'.'.$value->guessExtension();
            $value->move($this->getUploadRootDir(), $filename);

            $this->value = $filename;            
        }
        else {
            $this->value = $value;    
        }
        return $this;
    }
    
    /**
     * Get value
     *
     * @return text 
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Set type
     *
     * @param string $type
     * @return Setting
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

    /**
     * Set section
     *
     * @param string $section
     * @return Setting
     */
    public function setSection($section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return string 
     */
    public function getSection()
    {
        return $this->section;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/uploads/system';
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir() . DIRECTORY_SEPARATOR . $this->getValue();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/system';
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }
    
    public function preUpload()
    {
        if (null !== $this->getValue()) {
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
        if (null === $this->getValue()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getValue()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->value = null;
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
}
