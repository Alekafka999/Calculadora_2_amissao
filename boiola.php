<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Boiolice 🌈</title>
  <style>
    body {
      background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
      font-family: 'Poppins', sans-serif;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }
    h1 {
      font-size: 2.5em;
      color: #ff3cac;
      text-shadow: 0 0 10px #fff;
    }
    form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      max-width: 400px;
    }
    input[type="text"] {
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      width: 80%;
      margin-bottom: 15px;
      font-size: 1em;
    }
    input[type="submit"] {
      background: linear-gradient(90deg, #ff8a00, #e52e71);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
      transition: transform 0.2s;
    }
    input[type="submit"]:hover {
      transform: scale(1.05);
    }
    .resultado {
      margin-top: 25px;
      padding: 15px;
      background: rgba(255,255,255,0.9);
      border-radius: 15px;
      font-size: 1.2em;
      color: #444;
    }
    .emoji {
      font-size: 2em;
    }
  </style>
</head>
<body>
  <h1>Calculadora de Boiolice 💖</h1>
  <form method="post">
    <input type="text" name="nome" placeholder="Digite seu nome aqui ✨" required><br>
    <input type="submit" value="Calcular meu nível 🌈">
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $nome = htmlspecialchars($_POST['nome']);
      $nivel = rand(0, 100);

      echo "<div class='resultado'>";
      echo "<p><strong>$nome</strong>, seu nível de boiolice é <strong>$nivel%</strong> 🌈</p>";

      if ($nivel < 30) {
        echo "<p class='emoji'>🧊 Frio igual planilha do Excel!</p>";
      } elseif ($nivel < 70) {
        echo "<p class='emoji'>🔥 Mistura perigosa de charme e caos!</p>";
      } else {
        echo "<p class='emoji'>💅 Absolutamente fabuloso! Solta o glitter!</p>";
      }

      echo "</div>";
    }
  ?>
</body>
</html>