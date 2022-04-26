<?php

namespace App\Repository;

use App\Entity\Requisito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RequisitoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Requisito::class);
    }

    public function listar() {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT r FROM App\Entity\Requisito r")
            ->getResult();
    }

    public function nuevo()
    {
        $requisito = new Requisito();
        $this->getEntityManager()->persist($requisito);

        return $requisito;
    }

    public function guardar()
    {
        $this->getEntityManager()->flush();
    }

    public function eliminar(Requisito $requisito)
    {
        $this->getEntityManager()->remove($requisito);
        $this->guardar();
    }
}