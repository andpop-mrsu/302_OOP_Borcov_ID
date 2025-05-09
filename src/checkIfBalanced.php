<?php

namespace App;

function checkIfBalanced(string $expression): bool
{
    $stack = new Stack();
    $pairs = [
        '<' => '>',
        '{' => '}',
        '[' => ']',
        '(' => ')',
    ];

    for ($i = 0; $i < strlen($expression); $i++) {
        $char = $expression[$i];
        if (array_key_exists($char, $pairs)) {
            $stack->push($char);
        } elseif (in_array($char, $pairs)) {
            if ($stack->isEmpty() || $pairs[$stack->pop()] !== $char) {
                return false;
            }
        }
    }

    return $stack->isEmpty();
}