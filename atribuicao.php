<?php
session_start();

// Inicializa o saldo se não estiver definido
if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 0.00; // Saldo inicial para visualização
    $_SESSION['creditos'] = 0.00;
}

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['acao']) && $_POST['acao'] == 'zerar') {
        $_SESSION['saldo'] = 0.00; // Reseta o saldo para o valor inicial
        $_SESSION['creditos'] = 0;

    } else {
        $operacao = $_POST['operacao'];
        $valor = floatval($_POST['valor']);
        $saldo = floatval($_POST['saldo']);

        // Atualiza o saldo com base na operação
        if ($operacao == 'adicao') {
            $saldo += $valor; // Adiciona o valor ao saldo
            $_SESSION['creditos'] += $valor*2;
        } else if(($saldo - $valor) < 0 && $operacao == "subtracao"){
            $saldo -= $valor;
            $_SESSION['creditos'] -= $valor*3;
        }
        $_SESSION['saldo'] = $saldo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Saldo Bancário</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Calculadora de Saldo Bancário</h2>

    <div class="alert alert-info mt-4">
        Saldo atual: R$ <?= number_format($_SESSION['saldo'], 2, ',', '.') ?><br>
        Créditos sociais: <?= number_format($_SESSION['creditos'],2,',', '.') ?>
    </div>

    <form method="post" action="" class="mt-4">
        <div class="form-group">
            <label for="operacao">Operação:</label>
            <select class="form-control" id="operacao" name="operacao" required>
                <option value="adicao">Depósito</option>
                <option value="subtracao">Saque</option>
            </select>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Executar Operação</button>
    </form>

    <form method="post" action="" class="mt-4">
        <input type="hidden" name="acao" value="zerar">
        <button type="submit" class="btn btn-danger">Zerar Conta</button>
    </form>
</div>
</body>
</html>
