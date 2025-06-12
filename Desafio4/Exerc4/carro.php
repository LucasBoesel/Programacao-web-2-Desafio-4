<?php

class Carro {
    private $modelo;
    private $combustivel;
    private $tanque;
    private $consumo;
    private $kmRodados;

    public function __construct($modelo, $combustivel, $tanque, $consumo, $kmRodados) {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->tanque = $tanque;
        $this->consumo = $consumo;
        $this->kmRodados = $kmRodados;
    }

    private function getPrecoCombustivel() {
        return $this->combustivel === 'etanol' ? 3.50 : 5.80;
    }

    public function calcularAutonomia() {
        return $this->tanque * $this->consumo;
    }

    public function calcularCustoPorKm() {
        return $this->getPrecoCombustivel() / $this->consumo;
    }

    public function precisaRevisao() {
        return $this->kmRodados >= 10000 ? 'Sim' : 'Não';
    }

    public function getResumo() {
        return [
            'modelo' => $this->modelo,
            'autonomia' => number_format($this->calcularAutonomia(), 2, ',', '.'),
            'custo_km' => number_format($this->calcularCustoPorKm(), 2, ',', '.'),
            'revisao' => $this->precisaRevisao()
        ];
    }
}
