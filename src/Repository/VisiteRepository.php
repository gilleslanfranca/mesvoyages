<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method Visite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visite[]    findAll()
 * @method Visite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }

    // /**
    //  * @return Visite[] Returns an array of Visite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Visite
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
   
   public function findAllOrderBy($champ, $ordre): array{
       return $this->createQueryBuilder('v')
               ->orderBy('v.'.$champ, $ordre)
               ->getQuery()
               ->getResult();
   }
   
   /**
    * Enregistrements dont un champ est egal à une valeur
    * ou bien à tous les enregistrements si aucune valeur
    * @param type $champ
    * @param type $valeur
    * @return Visite[]
    */
   public function findByEqualValue($champ, $valeur): array{
       if($valeur==""){
           return $this->createQueryBuilder('v')
                   ->orderBy('v.'.$champ, 'ASC')
                   ->getQuery()
                   ->getResult();
       }else{
           return $this->createQueryBuilder('v')
                   ->where('v.'.$champ.'=:valeur')
                   ->setParameter('valeur', $valeur)
                   ->orderBy('v.datecreation', 'DESC')
                   ->getQuery()                   
                   ->getResult();
       }
   }
}