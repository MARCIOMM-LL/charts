<?php

namespace App\Entity;

use App\Repository\GrathRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrathRepository::class)
 */
class Grath
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $preco;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $vendasMensais;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantidadeEmStock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function setPreco(?float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getVendasMensais(): ?float
    {
        return $this->vendasMensais;
    }

    public function setVendasMensais(?float $vendasMensais): self
    {
        $this->vendasMensais = $vendasMensais;

        return $this;
    }

    public function getQuantidadeEmStock(): ?int
    {
        return $this->quantidadeEmStock;
    }

    public function setQuantidadeEmStock(?int $quantidadeEmStock): self
    {
        $this->quantidadeEmStock = $quantidadeEmStock;

        return $this;
    }
}
