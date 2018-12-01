<?php

namespace App\Repository;

use App\Entity\Jar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jar[]    findAll()
 * @method Jar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jar::class);
    }

    // /**
    //  * @return Jar[] Returns an array of Jar objects
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
    public function findOneBySomeField($value): ?Jar
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
