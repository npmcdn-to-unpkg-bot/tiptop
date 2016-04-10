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
    
    public function toArray()
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

        $annotationReader = $kernel->getContainer()->get('annotation_reader');

        $object = new \ReflectionObject($this);

        if ($configuration = $annotationReader->getClassAnnotation($object, 'Doctrine\ORM\Mapping\Entity')) {
            if (!is_null($configuration->repositoryClass)) {
                $repository = $kernel->getContainer()->get('doctrine.orm.entity_manager')->getRepository(get_class($this));

                return $repository;
            }
        }

        return null;

    }
    
}