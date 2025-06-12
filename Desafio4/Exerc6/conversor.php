<?php

class ConversorMoeda {
    private $valor;
    private $moeda;
    private $cotacao;

    public function __construct($valor, $moeda, $cotacao) {
        $this->valor = $valor;
        $this->moeda = $moeda;
        $this->cotacao = $cotacao;
    }

    public function converter() {
        $convertido = $this->valor / $this->cotacao;

        switch ($this->moeda) {
            case 'USD':
                return '$ ' . number_format($convertido, 2, '.', ',');
            case 'EUR':
                return '€ ' . number_format($convertido, 2, '.', ',');
            default:
                return 'Moeda inválida';
        }
    }
}
