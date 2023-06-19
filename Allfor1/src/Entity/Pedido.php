<?php

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidoRepository::class)]
class Pedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $deporte = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $hora = null;

    #[ORM\Column]
    private ?int $participantes = null;

    #[ORM\Column]
    private ?int $Cantidad_pago = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeporte(): ?string
    {
        return $this->deporte;
    }

    public function setDeporte(string $deporte): static
    {
        $this->deporte = $deporte;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): static
    {
        $this->hora = $hora;

        return $this;
    }

    public function getParticipantes(): ?int
    {
        return $this->participantes;
    }

    public function setParticipantes(int $participantes): static
    {
        $this->participantes = $participantes;

        return $this;
    }

    public function getCantidadPago(): ?int
    {
        return $this->Cantidad_pago;
    }

    public function setCantidadPago(int $Cantidad_pago): static
    {
        $this->Cantidad_pago = $Cantidad_pago;

        return $this;
    }
}
