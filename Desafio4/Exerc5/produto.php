<?php

class Produto {
    private $nome;
    private $estoque;
    private $valorUnitario;

    public function __construct($nome, $estoque, $valorUnitario) {
        $this->nome = $nome;
        $this->estoque = $estoque;
        $this->valorUnitario = $valorUnitario;
    }

    public function entradaEstoque($quantidade) {
        $this->estoque += $quantidade;
    }

    public function saidaEstoque($quantidade) {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
        } else {
            throw new Exception("Quantidade insuficiente em estoque.");
        }
    }

    public function getValorTotal() {
        return $this->estoque * $this->valorUnitario;
    }

    public function getResumo() {
        return [
            'nome' => $this->nome,
            'estoque' => $this->estoque,
            'valor_unitario' => number_format($this->valorUnitario, 2, ',', '.'),
            'valor_total' => number_format($this->getValorTotal(), 2, ',', '.')
        ];
    }
}
