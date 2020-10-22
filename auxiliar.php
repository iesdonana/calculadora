<?php

function selected($op, $o)
{
    return $op == $o ? 'selected' : '';
}

/**
 * Muestra un mensaje de error en pantalla.
 *
 * @param  string $mensaje
 * @return bool   Devuelve true
 */
function error($mensaje)
{
    echo "<h3>Error: $mensaje</h3>";
    return true;
}

/**
 * Calcula el resultado de realizar la operación indicada
 * en $op sobre los operandos $op1 y $op2.
 *
 * @param  mixed $op1
 * @param  mixed $op2
 * @param  mixed $op
 * @return mixed El resultado de la operación
 */
function calcular($op1, $op2, $op)
{
    eval("\$res = \$op1 $op \$op2;");

    return $res;
}