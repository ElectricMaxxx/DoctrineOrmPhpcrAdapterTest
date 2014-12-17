<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Document\Page;
use AppBundle\Entity\Entity;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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

    public function testIndex()
    {
        $page = $this->findPage();

        $entity = new Entity();
        $entity->target = $page;

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

            $this->dm->persist($page);
            $this->dm->flush();
        }
    }

    private function findPage()
    {
        return $this->dm->find(null, '/page');
    }
}
