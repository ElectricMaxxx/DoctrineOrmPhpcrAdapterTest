<?php

namespace AppBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCR;

/**
 * @PHPCR\Document(
 *      referenceable=true,
 *      mixins={"mix:lastModified"}
 * )
 */
class Page
{
    /**
     * @var string
     *
     * @PHPCR\Id
     */
    public $id;

    /**
     * @var string
     *
     * @PHPCR\Uuid
     */
    public $uuid;

    /**
     * @PHPCR\ParentDocument
     */
    public $parentDocument;

    /**
     * @PHPCR\Nodename
     */
    public $name;
}