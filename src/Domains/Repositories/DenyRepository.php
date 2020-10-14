<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Deny;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DenyRepository
{
    /** @var EntityRepository */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em->getRepository(Deny::class);
    }

    public function findOneByCityAndType(string $city, string $type)
    {
        return $this->em->findOneBy(['city' => $city, 'type' => $type]);
    }
}
