<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="grupo")
 */
class Grupo
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
     * @ORM\Column(type="string")
     */
    private $nombre;

    /**
     * @var Requisito|Collection
     * @ORM\OneToMany(targetEntity="Requisito", mappedBy="grupo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $requisitos;

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
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Grupo
     */
    public function setNombre(string $nombre): Grupo
    {
        $this->nombre = $nombre;
        return $this;
    }

}