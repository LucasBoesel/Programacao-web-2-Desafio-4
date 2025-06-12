<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = strtolower($tipoCliente);
    }

    public function getTotalBruto(): float {
        return $this->quantidade * $this->precoUnitario;
    }

    public function getDesconto(): float {
        return $this->tipoCliente === 'premium' ? $this->getTotalBruto() * 0.10 : 0;
    }

    public function getImposto(): float {
        return $this->getTotalBruto() * 0.08;
    }

    public function getTotalFinal(): float {
        return $this->getTotalBruto() - $this->getDesconto() + $this->getImposto();
    }

    public function getResumo(): array {
        return [
            'produto' => $this->produto,
            'total_bruto' => number_format($this->getTotalBruto(), 2, ',', '.'),
            'desconto' => number_format($this->getDesconto(), 2, ',', '.'),
            'imposto' => number_format($this->getImposto(), 2, ',', '.'),
            'total_final' => number_format($this->getTotalFinal(), 2, ',', '.')
        ];
    }
}
?>
