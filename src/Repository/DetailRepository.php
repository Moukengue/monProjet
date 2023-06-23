<?php

namespace App\Repository;

use App\Entity\Detail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Detail>
 *
 * @method Detail|null find($id, $lockMode = null, $lockVersion = null)
 * @method Detail|null findOneBy(array $criteria, array $orderBy = null)
 * @method Detail[]    findAll()
 * @method Detail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detail::class);
    }

    public function save(Detail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Detail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Detail[] Returns an array of Detail objects
    */
   public function findCatPop(): array
   {
       return $this->createQueryBuilder('d')
        ->select('count(comm.id) as nombre_commandes, c.libelle, c.image')
        ->join('d.commande', 'comm')
        ->join('d.plat', 'p')
        ->join('p.categorie', 'c')
        ->groupby('c.id')
        ->orderBy('count(comm.id)', 'desc')
        ->setMaxResults(6)
        ->getQuery()
        ->getResult()
       ;
   }

   public function Plat3(): array
   {
       $queryBuilder = $this->createQueryBuilder('d');

       $queryBuilder
           ->select('count(p.id) AS nbr_vente, p.id, p.libelle, p.image')
           ->leftJoin('d.plat', 'p')
           ->leftJoin('d.commande', 'c')
        //    ->where('c.etat = 3')
           ->groupBy('p.id')
           ->orderBy('nbr_vente', 'DESC')
           ->setMaxResults(3);

       $result = $queryBuilder->getQuery()->getResult();
       return $result;
   }
   }


      

//    public function findOneBySomeField($value): ?Detail
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

