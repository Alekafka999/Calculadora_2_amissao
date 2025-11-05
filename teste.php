<?php
// Inicializa variáveis
$resultado = "";
$erro = "";

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Valida se os campos foram preenchidos e são numéricos
    if (isset($_POST["num1"], $_POST["num2"], $_POST["operacao"]) &&
        is_numeric($_POST["num1"]) && is_numeric($_POST["num2"])) {
        
        $num1 = (float) $_POST["num1"];
        $num2 = (float) $_POST["num2"];
        $operacao = $_POST["operacao"];

        // Executa a operação escolhida
        switch ($operacao) {
            case "soma":
                $resultado = $num1 + $num2;
                break;
            case "subtracao":
                $resultado = $num1 - $num2;
                break;
            case "multiplicacao":
                $resultado = $num1 * $num2;
                break;
            case "divisao":
                if ($num2 == 0) {
                    $erro = "Erro: divisão por zero não é permitida.";
                } else {
                    $resultado = $num1 / $num2;
                }
                break;
            default:
                $erro = "Operação inválida.";
        }
    } else {
        $erro = "Por favor, insira valores numéricos válidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Simples em PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; width: 300px; }
        input, select, button { width: 100%; padding: 8px; margin: 5px 0; }
        .resultado { margin-top: 15px; font-weight: bold; }
        .erro { color: red; }
    </style>
</head>
<body>

<h2>Calculadora Simples</h2>
<form method="post" action="">
    <input type="text" name="num1" placeholder="Primeiro número" required>
    <input type="text" name="num2" placeholder="Segundo número" required>
    
    <select name="operacao" required>
        <option value="soma">Soma (+)</option>
        <option value="subtracao">Subtração (-)</option>
        <option value="multiplicacao">Multiplicação (×)</option>
        <option value="divisao">Divisão (÷)</option>
    </select>
    
    <button type="submit">Calcular</button>
</form>

<?php if ($erro): ?>
    <div class="erro"><?= htmlspecialchars($erro) ?></div>
<?php elseif ($resultado !== ""): ?>
    <div class="resultado">Resultado: <?= htmlspecialchars($resultado) ?></div>
<?php endif; ?>

</body>
</html>


