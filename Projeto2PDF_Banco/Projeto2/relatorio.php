<?php
//relatorio.php
require_once 'config.php';

//inclui a biblioteca FPDF
require_once 'fpdf/fpdf.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, utf8_decode('Relatório de Produtos'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }
}

$pdo = conectarBanco();
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

//Cabeçalho da tabela
$pdf->SetFillColor(200, 220, 255);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(50, 10, utf8_decode('Nome'), 1, 0, 'C', true);
$pdf->Cell(80, 10, utf8_decode('Descrição'), 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Estoque'), 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Valor Unitário'), 1, 0, 'C', true);
$pdf->Ln();

//Dados dos produtos
$stmt = $pdo->query('SELECT * FROM produto');
$fill = false;
while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //mb_strimwidth LIMITA OS CARACTERES EM 40
    $descricao = mb_strimwidth($produto['descricao'], 0, 40, '...');
    $pdf->SetFillColor(240, 240, 240); //cor do fundo da linha
    $pdf->Cell(10, 10, $produto['id_produto'], 1, 0, 'C', $fill);
    $pdf->Cell(50, 10, utf8_decode($produto['nome_prod']), 1, 0, 'L', $fill);
    $pdf->Cell(80, 10, utf8_decode($descricao), 1, 0, 'L', $fill);
    $pdf->Cell(20, 10, $produto['qtde'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 10, utf8_decode('R$ ' . number_format($produto['valor_unit'], 2, ',', '.')), 1, 1, 'R', $fill);
    $fill = !$fill; //alterna a cor
}

$pdf->Output();