<?php

class Viagem {
    private $origem;
    private $destino;
    private $distancia;
    private $tempo;
    private $veiculo;
    private $precoCombustivel;

    public function __construct($origem, $destino, $distancia, $tempo, $veiculo, $precoCombustivel) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempo = $tempo;
        $this->veiculo = $veiculo;
        $this->precoCombustivel = $precoCombustivel;
    }

    private function getConsumoPorKm() {
        switch ($this->veiculo) {
            case 'moto':
                return 25;
            case 'caminhao':
                return 5;
            case 'carro':
            default:
                return 10;
        }
    }

    public function calcularVelocidadeMedia() {
        return $this->distancia / $this->tempo;
    }

    public function calcularConsumo() {
        return $this->distancia / $this->getConsumoPorKm();
    }

    public function calcularCusto() {
        return $this->calcularConsumo() * $this->precoCombustivel;
    }

    public function getResumo() {
        return [
            'origem' => $this->origem,
            'destino' => $this->destino,
            'velocidade' => number_format($this->calcularVelocidadeMedia(), 2, ',', '.'),
            'consumo' => number_format($this->calcularConsumo(), 2, ',', '.'),
            'custo' => number_format($this->calcularCusto(), 2, ',', '.')
        ];
    }
}
