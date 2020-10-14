<?php

namespace App\Domains\Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="domain")
 */
class Deny
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    public $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $city;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    public $type;
}
