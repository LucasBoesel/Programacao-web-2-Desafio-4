<?php
class Aluno {
    private string $nome;
    private string $disciplina;
    private array $notas;

    public function __construct(string $nome, string $disciplina, array $notas) {
        $this->nome = trim($nome);
        $this->disciplina = trim($disciplina);
        $this->notas = $this->validarNotas($notas);
    }

    private function validarNotas(array $notas): array {
        // Garante que as notas estão entre 0 e 10
        return array_map(function($nota) {
            $nota = floatval($nota);
            return ($nota < 0) ? 0 : (($nota > 10) ? 10 : $nota);
        }, $notas);
    }

    public function calcularMedia(): float {
        return array_sum($this->notas) / count($this->notas);
    }

    public function getStatus(): string {
        $media = $this->calcularMedia();
        if ($media >= 7) {
            return "Aprovado";
        } elseif ($media >= 4) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }
    
    // Método para retornar a classe CSS baseada no status
    public function getStatusClass(): string {
        $status = $this->getStatus();
        return match($status) {
            "Aprovado" => "status-aprovado",
            "Recuperação" => "status-recuperacao",
            "Reprovado" => "status-reprovado",
            default => ""
        };
    }

    // Getters públicos para nome e disciplina
    public function getNome(): string {
        return $this->nome;
    }

    public function getDisciplina(): string {
        return $this->disciplina;
    }

    // Opcional: resumo formatado (sem classe CSS no status)
    public function getResumo(): string {
        $media = number_format($this->calcularMedia(), 2, ',', '.');
        $status = $this->getStatus();
        return "Aluno: {$this->nome}<br>Disciplina: {$this->disciplina}<br>Média: {$media}<br>Status: <strong>{$status}</strong>";
    }
}
?>
