<?php

namespace App\Repository;

use App\Entity\JarItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JarItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method JarItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method JarItem[]    findAll()
 * @method JarItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JarItemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JarItem::class);
    }

    // /**
    //  * @return JarItem[] Returns an array of JarItem objects
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
    public function findOneBySomeField($value): ?JarItem
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
