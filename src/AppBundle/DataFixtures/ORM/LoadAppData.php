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
use AppBundle\Entity\Bundle;

class LoadAppData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // ads bundle
        $adsBundle = new Bundle();
        $adsBundle->setName('AdsBundle');
        $adsBundle->setIsActive(true);
        $adsBundle->setIsSystem(false);
        $adsBundle->setOrderBy(1);
        $manager->persist($adsBundle);

        // articlesBundle bundle
        $articlesBundle = new Bundle();
        $articlesBundle->setName('ArticlesBundle');
        $articlesBundle->setIsActive(true);
        $articlesBundle->setIsSystem(false);
        $articlesBundle->setOrderBy(2);
        $manager->persist($articlesBundle);

        // chat bundle
        $chatBundle = new Bundle();
        $chatBundle->setName('ChatBundle');
        $chatBundle->setIsActive(true);
        $chatBundle->setIsSystem(false);
        $chatBundle->setOrderBy(3);
        $manager->persist($chatBundle);

        $manager->flush();
    }
}