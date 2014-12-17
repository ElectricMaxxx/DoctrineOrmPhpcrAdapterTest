<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\ODMAdapter\Mapping\Annotations as ODMAdapter;

/**
 * Redirect
 *
 * @ORM\Table()
 * @ORM\Entity()
 *
 * @ODMAdapter\ObjectAdapter()
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
     * @ORM\Column(type="string", nullable=true)
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
}
