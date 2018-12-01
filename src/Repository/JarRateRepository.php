<?php

namespace App\Repository;

use App\Entity\JarRate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JarRate|null find($id, $lockMode = null, $lockVersion = null)
 * @method JarRate|null findOneBy(array $criteria, array $orderBy = null)
 * @method JarRate[]    findAll()
 * @method JarRate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JarRateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JarRate::class);
    }

    // /**
    //  * @return JarRate[] Returns an array of JarRate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JarRate
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
