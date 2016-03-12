<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DocumentsAdminControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/documents/list');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/documents/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/documents/edit');
    }

}
