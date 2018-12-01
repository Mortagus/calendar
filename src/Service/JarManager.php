<?php

namespace App\Service;

use App\Entity\Jar;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

/**
 * Class JarManager
 * @package App\Service
 */
class JarManager
{
    public const MAX_JAR = 6;
    public const MAX_TOTAL_RATE = 100;

    /**
     * @var EntityManager
     */
    private $entityMananger;

    public function __construct(ObjectManager $entityMananger)
    {
        $this->entityMananger = $entityMananger;
    }

    /**
     * @return Jar[]
     */
    public function getAllJars(): array
    {
        return $this->getEntityMananger()->getRepository(Jar::class)->findAll();
    }

    /**
     * @return EntityManager
     */
    public function getEntityMananger(): EntityManager
    {
        return $this->entityMananger;
    }

    /**
     * @param Jar $jarObject
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(Jar $jarObject): void
    {
        $this->getEntityMananger()->persist($jarObject);
        $this->getEntityMananger()->flush($jarObject);
    }
}