<?php

namespace App\Domains\Repositories;

use App\Domains\Models\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TypeRepository
{
    /** @var EntityRepository */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em->getRepository(Type::class);
    }

    public function findAll(): array
    {
        return $this->em->findAll();
    }
}
