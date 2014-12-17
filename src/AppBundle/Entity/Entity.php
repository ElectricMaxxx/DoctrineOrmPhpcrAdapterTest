<?php

namespace AppBundle\Entity;

use AppBundle\Document\Page;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\ODMAdapter\Mapping\Annotations as ODMAdapter;

/**
 * Redirect
 *
 * @ORM\Table()
 * @ORM\Entity()
 *
 * @ODMAdapter\ObjectAdapter
 */
class Entity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    public $uuid;

    /**
     * @var \AppBundle\Document\Page
     *
     * @ODMAdapter\ReferencePhpcr(
     *  referencedBy="uuid",
     *  inversedBy="uuid",
     *  targetObject="AppBundle\Document\Page"
     * )
     */
    public $target;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     * @return $this
     */
    public function setTarget(Page $target)
    {
        $this->target = $target;
        return $this;
    }
}
