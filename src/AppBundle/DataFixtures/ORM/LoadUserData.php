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
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // user admin
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setIsActive(true);
        $role = $manager->getRepository('AppBundle:Role')->findOneBy(["role" => "ROLE_ADMIN"]);
        $userAdmin->setRoleId( $role->getId() );
        $userAdmin->setPassword('$2y$13$8zwg8EDs4qTDnOootnuK4OOrbv/73tEDaUVMiYw/uJSqS4knzPuK.');
        $manager->persist($userAdmin);

        // user test
        $userTest = new User();
        $userTest->setUsername('test');
        $userTest->setEmail('test@test.com');
        $userTest->setIsActive(true);
        $role = $manager->getRepository('AppBundle:Role')->findOneBy(["role" => "ROLE_USER"]);
        $userTest->setRoleId( $role->getId() );
        $userTest->setPassword('$2y$13$8zwg8EDs4qTDnOootnuK4OOrbv/73tEDaUVMiYw/uJSqS4knzPuK.');
        $manager->persist($userTest);

        $manager->flush();
    }
}