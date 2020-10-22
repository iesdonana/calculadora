<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        require './auxiliar.php';

        const OPS = ['+', '-', '*', '/', '**'];

        $op1 = isset($_GET['op1']) ? trim($_GET['op1']) : null;
        $op2 = isset($_GET['op2']) ? trim($_GET['op2']) : null;
        $op  = isset($_GET['op'])  ? trim($_GET['op'])  : null;
        $res = '';

        if (isset($op1, $op2, $op)) {
            $error = false;
            if (!is_numeric($op1)) {
                $error = error('El primer operando no es un número');
            }
            if (!is_numeric($op2)) {
                $error = error('El segundo operando no es un número');
            }
            if (!in_array($op, OPS)) {
                $error = error('El operador no es válido');
            }

            if (!$error) {
                $res = calcular($op1, $op2, $op);
            }
        }
        ?>
        <form action="" method="get">
            <label for="op1">Primer operando:</label>
            <input type="number" name="op1" value="<?= $op1 ?>" id="op1"><br>

            <label for="op2">Segundo operando:</label>
            <input type="text" name="op2" value="<?= $op2 ?>" id="op2"><br>

            <label for="op">Operación:</label>
            <select name="op" id="op">
                <?php foreach (OPS as $o): ?>
                    <option value="<?= $o ?>" <?= selected($op, $o) ?> >
                        <?= $o ?>
                    </option>
                <?php endforeach ?>
            </select><br>

            <button type="submit">Calcular</button><br>

            <label for="res">Resultado:</label>
            <input type="text" value="<?= $res ?>" id="res" readonly><br>
        </form>
    </body>
</html>