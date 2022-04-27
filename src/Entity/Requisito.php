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
     * @var string
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @var Grupo
     * @ORM\ManyToOne(targetEntity="Grupo", inversedBy="requisitos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grupo;

    public function __toString() {
        return $this->getDescripcion();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Requisito
     */
    public function setDescripcion(string $descripcion): Requisito
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo(): ?Grupo
    {
        return $this->grupo;
    }

    /**
     * @param Grupo $grupo
     * @return Requisito
     */
    public function setGrupo(Grupo $grupo): Requisito
    {
        $this->grupo = $grupo;
        return $this;
    }

}