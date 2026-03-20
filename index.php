<?php
$bilhetes = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantidade = (int) $_POST['quantidade'];
    $campanha = $_POST['campanha'];
    $premio = $_POST['premio'];
    $valor = $_POST['valor'];

    for ($i = 1; $i <= $quantidade; $i++) {
        $numero = str_pad($i, 3, "0", STR_PAD_LEFT);
        $bilhetes[] = $numero;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gerador de Rifas</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h1>🎟️ Gerador de Rifas</h1>

<form method="POST" id="formRifa">
    <input type="text" name="campanha" placeholder="Nome da campanha" required>
    <input type="text" name="premio" placeholder="Prêmio" required>
    <input type="text" name="valor" placeholder="Valor (R$)" required>
    <input type="number" name="quantidade" placeholder="Quantidade de bilhetes" required>
    <button type="submit">Gerar Bilhetes</button>
</form>

<?php if (!empty($bilhetes)): ?>

<div class="container">
    <?php foreach ($bilhetes as $b): ?>
        
        <div class="bilhete">

            <!-- Parte principal -->
            <div class="ticket-main">
                <div class="titulo"><?= $campanha ?></div>
                <p>🎁 <?= $premio ?></p>
                <p>💰 R$ <?= $valor ?></p>

                <div class="numero">Nº <?= $b ?></div>

                <div class="comprador">
                    Nome: ______________________
                </div>
            </div>

            <!-- Linha pontilhada -->
            <div class="ticket-divider"></div>

            <!-- Canhoto -->
            <div class="ticket-stub">
                <div class="titulo"><?= $campanha ?></div>
                <div class="numero"><?= $b ?></div>
            </div>

        </div>

    <?php endforeach; ?>
</div>

<button class="print-btn" onclick="imprimir()">🖨️ Imprimir</button>

<button class="back-btn" onclick="voltar()">⬅️ Voltar</button>
<?php endif; ?>

<script src="script.js"></script>
</body>
</html>