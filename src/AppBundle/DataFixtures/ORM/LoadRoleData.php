<?php
/**
 * Created by PhpStorm.
 * User: NovikovAV
 * Date: 19.08.2016
 * Time: 16:19
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Role;

class LoadRoleData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // role admin
        $roleAdmin = new Role();
        $roleAdmin->setName('admin');
        $roleAdmin->setRole('ROLE_ADMIN');
        $manager->persist($roleAdmin);

        // role user
        $roleUser = new Role();
        $roleUser->setName('user');
        $roleUser->setRole('ROLE_USER');
        $manager->persist($roleUser);

        $manager->flush();
    }
}