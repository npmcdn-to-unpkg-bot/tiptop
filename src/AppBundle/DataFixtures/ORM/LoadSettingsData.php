<?php
/**
 * Created by PhpStorm.
 * User: NovikovAV
 * Date: 19.08.2016
 * Time: 16:19
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Setting;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSettingsData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // route
        $settingLogo = new Setting();
        $settingLogo->setName('system_logo');
        $settingLogo->setValue('50176f5cf298053e53cbf8b42de7c528ac169924.jpeg');
        $settingLogo->setType('image');
        $settingLogo->setSection('main');
        $manager->persist($settingLogo);

        // route
        $settingRoute = new Setting();
        $settingRoute->setName('system_mainpage_route');
        $settingRoute->setValue('_ads_index');
        $settingRoute->setType('route');
        $settingRoute->setSection('main');
        $manager->persist($settingRoute);

        // route params
        $settingRouteParams = new Setting();
        $settingRouteParams->setName('system_mainpage_route_params');
        $settingRouteParams->setValue('{"slug":"home"}');
        $settingRouteParams->setType('string');
        $settingRouteParams->setSection('main');
        $manager->persist($settingRouteParams);

        $manager->flush();
    }
}