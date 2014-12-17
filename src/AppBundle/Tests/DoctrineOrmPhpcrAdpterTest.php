<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use AppBundle\Document\Page;
use AppBundle\Entity\Entity;
use AppBundle\Entity\Object;

class DoctrineOrmPhpcrAdpterTest extends WebTestCase
{
    private $container;

    private $em;

    private $dm;

    public function setUp()
    {
        static::bootKernel();

        $this->container = static::$kernel->getContainer();

        $this->em = $this->container->get('doctrine.orm.entity_manager');
        $this->dm = $this->container->get('doctrine_phpcr.odm.document_manager');

        $this->createPageIfNotExists();
    }

    public function testEntity()
    {
        $page = $this->findPage();

        $entity = new Entity();
        $entity->target = $page;

        $this->em->persist($entity);
        $this->em->flush();
    }

    public function testObject()
    {
        $page = $this->findPage();
        $page->commonField = 'test-value';
        $entity = new Object();
        $entity->setDocument($page);

        $this->em->persist($entity);
        $this->em->flush();
    }

    private function createPageIfNotExists()
    {
        if (!$this->findPage()) {
            $parent = $this->dm->find(null, '/');

            $page = new Page();
            $page->parentDocument = $parent;
            $page->name = 'page';
            $page->commonField = 'some common';

            $this->dm->persist($page);
            $this->dm->flush();
        }
    }

    private function findPage()
    {
        return $this->dm->find(null, '/page');
    }
}
