<?php

namespace App\Repository;

use App\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GrupoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grupo::class);
    }

    public function listar() {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT g FROM App\Entity\Grupo g")
            ->getResult();
    }

    public function nuevo()
    {
        $grupo = new Grupo();
        $this->getEntityManager()->persist($grupo);

        return $grupo;
    }

    public function guardar()
    {
        $this->getEntityManager()->flush();
    }

    public function eliminar(Grupo $grupo)
    {
        $this->getEntityManager()->remove($grupo);
        $this->guardar();
    }
}