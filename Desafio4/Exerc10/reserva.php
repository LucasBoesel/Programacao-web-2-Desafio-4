<?php

class ReservaHotel {
    private $nome;
    private $noites;
    private $quarto;

    public function __construct($nome, $noites, $quarto) {
        $this->nome = $nome;
        $this->noites = $noites;
        $this->quarto = $quarto;
    }

    private function getPrecoNoite() {
        switch ($this->quarto) {
            case 'simples':
                return 120;
            case 'luxo':
                return 200;
            case 'suite':
                return 350;
            default:
                return 0;
        }
    }

    public function calcularTotal() {
        $preco = $this->getPrecoNoite();
        $total = $this->noites * $preco;

        if ($this->noites > 5) {
            $total *= 0.9; // 10% de desconto
        }

        return $total;
    }

    public function getResumo() {
        return [
            'mensagem' => "Bem-vindo(a), {$this->nome}!",
            'quarto' => ucfirst($this->quarto),
            'noites' => $this->noites,
            'valor' => 'R$ ' . number_format($this->calcularTotal(), 2, ',', '.')
        ];
    }
}
