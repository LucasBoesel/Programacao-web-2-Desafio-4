<?php

class Pessoa {
    private $nome;
    private $peso;
    private $altura;

    public function __construct($nome, $peso, $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC() {
        return $this->peso / pow($this->altura, 2);
    }

    public function classificarIMC() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return 'Abaixo do peso';
        } elseif ($imc < 25) {
            return 'Peso normal';
        } elseif ($imc < 30) {
            return 'Sobrepeso';
        } else {
            return 'Obesidade';
        }
    }

    public function getResumo() {
        return [
            'nome' => $this->nome,
            'imc' => number_format($this->calcularIMC(), 2, ',', '.'),
            'classificacao' => $this->classificarIMC()
        ];
    }
}
