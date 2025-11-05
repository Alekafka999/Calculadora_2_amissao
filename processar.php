<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ler e sanitizar entradas (aceita vírgula ou ponto como separador decimal)
    $nota1 = isset($_POST['n1']) ? floatval(str_replace(',', '.', $_POST['n1'])) : 0.0;
    $nota2 = isset($_POST['n2']) ? floatval(str_replace(',', '.', $_POST['n2'])) : 0.0;
   
    $operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';
    $resultado = 0;
    
    if ($operacao === '+') {
        $resultado = $nota1 + $nota2;
        $status = 'Resultado da Soma';
    } elseif ($operacao  === '-') {
        $resultado = $nota1 - $nota2;
        $status = 'Resultado da Subtração';
    } elseif ($operacao === '*') {
        $resultado = $nota1 * $nota2;
        $status = 'Resultado da Multiplicação';
    } elseif ($operacao === '/') {
        if ($nota2 != 0) {
            $resultado = $nota1 / $nota2;
            $status = 'Resultado da Divisão';
        } else {
            $resultado = 'Erro: Divisão por zero';
            $status = 'Erro';
        }
    }

} else {
    header('Location: formulario.html');
    exit;
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Cálculo</title>
</head>
<body>
<h1> Resultado do Cálculo: </h1>

<p> Número 1: <?php echo $nota1; ?> </p>
<p> Número 2: <?php echo $nota2; ?> </p>
<h2>Resultado:</h2>
<p>
    <?php 
    if (is_numeric($resultado)) {
        echo number_format($resultado, 2, ',', '.');
    } else {
        echo $resultado;
    }
    ?>
</p>

</body>
</html>