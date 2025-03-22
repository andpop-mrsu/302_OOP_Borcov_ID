<?php

namespace App;

use function App\checkIfBalanced;

function runTest(): void
{
    echo "Тестирование методов стека:\n";

    // Тестирование стека
    $stack = new Stack(1, 2, 3);
    echo "Изначальный стек: " . $stack->__toString() . "\n";

    $popped = $stack->pop();
    echo "После вызова pop(), снятый элемент: " . $popped . "\n";
    echo "Стек после pop(): " . $stack->__toString() . "\n";

    $top = $stack->top();
    echo "Элемент на вершине стека (top): " . $top . "\n";

    $isEmpty = $stack->isEmpty() ? 'Да' : 'Нет';
    echo "Стек пуст? " . $isEmpty . "\n";

    $stack->push(4, 5);
    echo "Стек после push(4, 5): " . $stack->__toString() . "\n";

    $copy = $stack->copy();
    echo "Копия стека: " . $copy->__toString() . "\n";

    // Тестирование edge cases для стека
    echo "\nТестирование edge cases для стека:\n";

    $emptyStack = new Stack();
    echo "Пустой стек: " . $emptyStack->__toString() . "\n";
    echo "Стек пуст? " . ($emptyStack->isEmpty() ? 'Да' : 'Нет') . "\n";

    try {
        $emptyStack->pop();
    } catch (\RuntimeException $e) {
        echo "Ошибка при pop() на пустом стеке: " . $e->getMessage() . "\n";
    }

    try {
        $emptyStack->top();
    } catch (\RuntimeException $e) {
        echo "Ошибка при top() на пустом стеке: " . $e->getMessage() . "\n";
    }

    // Тестирование функции проверки сбалансированности скобок
    echo "\nТестирование функции проверки сбалансированности скобок:\n";

    $expression = "(ab[cd{}])";
    $isBalanced = checkIfBalanced($expression) ? 'Сбалансировано' : 'Не сбалансировано';
    echo "Строка '{$expression}' - {$isBalanced}\n";

    $expression = "(ab[cd{})";
    $isBalanced = checkIfBalanced($expression) ? 'Сбалансировано' : 'Не сбалансировано';
    echo "Строка '{$expression}' - {$isBalanced}\n";

    $expression = "(ab[cd{]})";
    $isBalanced = checkIfBalanced($expression) ? 'Сбалансировано' : 'Не сбалансировано';
    echo "Строка '{$expression}' - {$isBalanced}\n";

    $expression = "";
    $isBalanced = checkIfBalanced($expression) ? 'Сбалансировано' : 'Не сбалансировано';
    echo "Пустая строка - {$isBalanced}\n";

    $expression = "abcdef";
    $isBalanced = checkIfBalanced($expression) ? 'Сбалансировано' : 'Не сбалансировано';
    echo "Строка без скобок '{$expression}' - {$isBalanced}\n";

    echo "\nТестирование завершено.\n";
}