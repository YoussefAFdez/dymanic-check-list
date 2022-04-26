<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="requisito")
 */
class Requisito
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $descripcion;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDescripcion(): ?int
    {
        return $this->descripcion;
    }

    /**
     * @param int $descripcion
     * @return Requisito
     */
    public function setDescripcion(int $descripcion): Requisito
    {
        $this->descripcion = $descripcion;
        return $this;
    }

}