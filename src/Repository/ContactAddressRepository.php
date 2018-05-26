<?php

namespace App\Repository;

use App\Entity\ContactAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactAddress[]    findAll()
 * @method ContactAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactAddressRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactAddress::class);
    }

//    /**
//     * @return ContactAddress[] Returns an array of ContactAddress objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContactAddress
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
