<?php

class CalculadoraGeometrica {
    private $figura;
    private $valor1;
    private $valor2;

    public function __construct($figura, $valor1, $valor2 = null) {
        $this->figura = $figura;
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function calcularArea() {
        switch ($this->figura) {
            case 'quadrado':
                $area = $this->valor1 ** 2;
                break;
            case 'retangulo':
                $area = $this->valor1 * $this->valor2;
                break;
            case 'circulo':
                $area = pi() * ($this->valor1 ** 2);
                break;
            default:
                $area = 0;
        }

        return number_format($area, 2, ',', '.');
    }

    public function getFigura() {
        return ucfirst($this->figura);
    }
}
