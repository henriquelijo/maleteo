<?php

namespace App\Repository;

use App\Entity\FormMaleteo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormMaleteo|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormMaleteo|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormMaleteo[]    findAll()
 * @method FormMaleteo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormMaleteoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormMaleteo::class);
    }

    // /**
    //  * @return FormMaleteo[] Returns an array of FormMaleteo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormMaleteo
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
