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
use AppBundle\Entity\Role;

class LoadUserData implements FixtureInterface
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


        // user admin
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setIsActive(true);
        $userAdmin->setRoleId(1);
        $userAdmin->setPassword('$2y$13$8zwg8EDs4qTDnOootnuK4OOrbv/73tEDaUVMiYw/uJSqS4knzPuK.');
        $manager->persist($userAdmin);

        // user test
        $userTest = new User();
        $userTest->setUsername('test');
        $userTest->setEmail('test@test.com');
        $userTest->setIsActive(true);
        $userTest->setRoleId(2);
        $userTest->setPassword('$2y$13$8zwg8EDs4qTDnOootnuK4OOrbv/73tEDaUVMiYw/uJSqS4knzPuK.');
        $manager->persist($userTest);

        $manager->flush();
    }
}