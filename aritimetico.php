<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies -->
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Calculadora PHP</h2>
    <form method="post" action="" class="mt-4">
        <div class="form-group">
            <label for="numero1">Número 1:</label>
            <input type="number" class="form-control" id="numero1" name="numero1" required>
        </div>
        <div class="form-group">
            <label for="numero2">Número 2:</label>
            <input type="number" class="form-control" id="numero2" name="numero2" required>
        </div>
        <div class="form-group">
            <label for="operacao">Operação:</label>
            <select class="form-control" id="operacao" name="operacao" required>
                <option value="adicao">Adição</option>
                <option value="sub">Subtração</option>
                <option value="div">Divisão</option>
                <option value="mult">Multiplicação</option>
                <otpion value="exp">Exponenciação</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = intval($_POST['numero1']);
        $numero2 = intval($_POST['numero2']);
        $operacao = $_POST['operacao'];
        $resultado = '';

        switch ($operacao) {
            case 'adicao':
                $resultado = $numero1 + $numero2;
                break;
            case 'sub':
                $resultado = $numero1 - $numero2;
                break;
            case 'div':
                if($numero2 === 0) {
                    $resultado = 'Não pode dividir por 0!!!';
                    break;
                }
                $resultado = $numero1 / $numero2;
                break;
            case 'mult':
                $resultado = $numero1 * $numero2;
                break;
            case 'exp':
                $resultado = $numero1 ** $numero2;
                break;
            default:
                $resultado = 'Operação inválida';
                break;
        }
        echo "<div class='mt-4 alert alert-info'>Resultado: $resultado</div>";
    }
    ?>

</div>

</body>
</html>