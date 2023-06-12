<!DOCTYPE html>
<html>
<head>
    <title>Encriptador de Enteros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        h2 {
            margin-top: 30px;
            color: #333;
        }

        p {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <h1>Encriptador de Enteros</h1>

    <form method="POST" action="">
        <label for="entero">Ingrese un entero de cuatro dígitos:</label>
        <input type="text" name="entero" id="entero" maxlength="4" pattern="\d{4}" required>
        <br>
        <input type="submit" value="Encriptar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $entero = (int)$_POST['entero'];

        function intercambiar(&$a, &$b) {
            $temp = $a;
            $a = $b;
            $b = $temp;
        }

        $dígito1 = (int)($entero / 1000);
        $dígito2 = (int)($entero / 100) % 10;
        $dígito3 = (int)($entero / 10) % 10;
        $dígito4 = $entero % 10;

        $dígito1 = ($dígito1 + 7) % 10;
        $dígito2 = ($dígito2 + 7) % 10;
        $dígito3 = ($dígito3 + 7) % 10;
        $dígito4 = ($dígito4 + 7) % 10;

        intercambiar($dígito1, $dígito3);
        intercambiar($dígito2, $dígito4);

        $encriptado = $dígito1 * 1000 + $dígito2 * 100 + $dígito3 * 10 + $dígito4;

        echo "<h2>Resultado Encriptado:</h2>";
        echo "<p>$encriptado</p>";
    }
    ?>

</body>
</html>
