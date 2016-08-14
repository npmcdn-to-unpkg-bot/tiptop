<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 16.03.15
 * Time: 9:23
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Object as Object;
use Doctrine\Common\Annotations\AnnotationReader;

abstract class Entity
{
    /**
     * @var integer
     */
    protected $objectId;
    
    public function createObject()
    {   
        if ( is_null($this->objectId) )
        {
            $em = $this->getDoctrine()->getManager();
            $object = new Object();
            $object->setType(get_class($this));
            $em->persist($object);
            $em->flush();
        }
    }
    
    public function getData()
    {
        $repository = $this->getRepository();
        $fields = $repository->getFieldNames();
        $array = array();
        foreach ($fields as $field) {
            $array[$field] = $repository->getFieldValue($this, $field);
        }
        return $array;
    }

    /**
     * 
     * @param array $data
     * @return \AppBundle\Entity\Entity
     */
    public function setData(array $data)
    {
        if ($data)
        {
            foreach ($data as $key=>$val)
            {
                $method = "set" . ucfirst($key);
                if (method_exists($this, $method)) {
                    \call_user_func_array(array($this,$method), array($val));
                }
            }
        }
        return $this;
    }

    /**
     * Return the actual entity repository
     * 
     * @return entity repository or null
     */
    protected function getRepository()
    {
        global $kernel;

        if ('AppCache' == get_class($kernel)) {
            $kernel = $kernel->getKernel();
        }

        /* @var $annotationReader \Doctrine\Common\Annotations\AnnotationReader */
        $annotationReader = $kernel->getContainer()->get('annotation_reader');

        $object = new \ReflectionObject($this);
        
        if ($configuration = $annotationReader->getClassAnnotation($object, 'Doctrine\ORM\Mapping\Entity'))
        {
            if (!is_null($configuration->repositoryClass))
            {
                $repository = $kernel->getContainer()->get('doctrine.orm.entity_manager')->getRepository(get_class($this));

                return $repository;
            }
        }

        return null;

    }
    
}