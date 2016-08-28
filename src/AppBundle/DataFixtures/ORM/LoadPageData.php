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
use AppBundle\Entity\Page;

class LoadPageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // home page
        $homePage = new Page();
        $homePage->setSlug('home');
        $homePage->setTitle('Главная');
        $homePage->setImage('3b17572a9a8f0d597988e1c02d69a2b04563f58b.jpeg');
        $homePage->setNameInMenu('Главная');
        $homePage->setBody('<h4 class="title">КУХНИ НА ЗАКАЗ В МИНСКЕ</h4>\r\n<h5 style="text-align: right;"><strong>Кухня &mdash; это место, о котором мужчины думают, что там готовится еда,</strong><br /><strong>а женщины &mdash; что там проходят их лучшие годы.</strong></h5>\r\n<p>По исследованиям британских ученых женщины проводят на кухне в среднем три года своей жизни. Почти половина респондентов при этом считает кухню главным пространством в квартире или доме.</p>\r\n<p>Сделайте свою кухню максимально функциональной и эстетичной с помощью специалистов EcoGroup.by!</p>');
        $homePage->setKeywords('кухни минск');
        $homePage->setDescription('кухни на заказ');
        $homePage->setCreated(new \DateTime("now"));
        $homePage->setUpdated(NULL);
        $homePage->setDeleted(NULL);
        $manager->persist($homePage);

        // contact page
        $contactPage = new Page();
        $contactPage->setSlug('contacts');
        $contactPage->setTitle('Контакты');
        $contactPage->setImage('adb07e76e4615650ff5ba580ff68deeb684dd008.jpeg');
        $contactPage->setNameInMenu('Контакты');
        $contactPage->setBody('<p>Контактные номера телефонов:&nbsp;(029) 647-08-08 (vel), (033) 647-08-08 (мтс)</p>\r\n<p>E-mail:&nbsp;<a href="mailto:kitchenBy@yandex.ru">KitchenBy@yandex.ru</a></p>\r\n<p>Юридический адрес:<br />Республика Беларусь<br />г.Минск<br />просп. Победителей д.103, офис 907</p>\r\n<p>Мы работаем&nbsp;пн-пт с 10:00 до 20:00</p>');
        $contactPage->setKeywords('кухни, связаться');
        $contactPage->setDescription('Кухни в минске, контакты');
        $contactPage->setCreated(new \DateTime("now"));
        $contactPage->setUpdated(NULL);
        $contactPage->setDeleted(NULL);
        $manager->persist($contactPage);

        // galleries page
        $galleriesPage = new Page();
        $galleriesPage->setSlug('galleries');
        $galleriesPage->setTitle('Гелереи');
        $galleriesPage->setImage('64267eb277e5fceda74948e1ea298321e1750df8.jpeg');
        $galleriesPage->setNameInMenu('Галереи');
        $galleriesPage->setBody('<p>Тут вы можете ознакомится с примероми работ</p>');
        $galleriesPage->setKeywords('гарелереи');
        $galleriesPage->setDescription('гелереи');
        $galleriesPage->setCreated(new \DateTime("now"));
        $galleriesPage->setUpdated(NULL);
        $galleriesPage->setDeleted(NULL);
        $manager->persist($galleriesPage);

        // bonus page
        $bonusPage = new Page();
        $bonusPage->setSlug('bonus');
        $bonusPage->setTitle('Акции');
        $bonusPage->setImage('201308d051a3383e3bd66ce6a8810eabd3d51d26.jpeg');
        $bonusPage->setNameInMenu('Акции');
        $bonusPage->setBody('Временно не доступно');
        $bonusPage->setKeywords('акции');
        $bonusPage->setDescription('акции');
        $bonusPage->setCreated(new \DateTime("now"));
        $bonusPage->setUpdated(NULL);
        $bonusPage->setDeleted(NULL);
        $manager->persist($bonusPage);
        
        // bonus page
        $pokerPage = new Page();
        $pokerPage->setSlug('poker');
        $pokerPage->setTitle('Покер');
        $pokerPage->setImage('201308d051a3383e3bd66ce6a8810eabd3d51d26.jpeg');
        $pokerPage->setNameInMenu('Покер');
        $pokerPage->setBody('Покер');
        $pokerPage->setKeywords('покер');
        $pokerPage->setDescription('покер');
        $pokerPage->setCreated(new \DateTime("now"));
        $pokerPage->setUpdated(NULL);
        $pokerPage->setDeleted(NULL);
        $manager->persist($pokerPage);

        $manager->flush();
    }
}