<?php

class CalculadoraFinanceira {
    private $valor;
    private $parcelas;
    private $juros;

    public function __construct($valor, $parcelas, $juros) {
        $this->valor = $valor;
        $this->parcelas = $parcelas;
        $this->juros = $juros / 100;
    }

    public function calcularParcela() {
        return $this->valor * pow(1 + $this->juros, $this->parcelas);
    }

    public function calcularTotal() {
        return $this->calcularParcela() * $this->parcelas;
    }

    public function calcularJurosPago() {
        return $this->calcularTotal() - $this->valor;
    }

    public function getResumo() {
        return [
            'parcela' => number_format($this->calcularParcela(), 2, ',', '.'),
            'total' => number_format($this->calcularTotal(), 2, ',', '.'),
            'juros' => number_format($this->calcularJurosPago(), 2, ',', '.')
        ];
    }
}
