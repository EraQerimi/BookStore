<?php

function add($a, $b) {
    return $a + $b;
    // TODO: handle non-numeric inputs
}

function subtract($a, $b) {
    if (!is_numeric($a) || !is_numeric($b)) {
        return null;
    }
    return $a - $b;
}
