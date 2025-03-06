<?php

function runTest()
{
    // Подключаем классы
    require_once 'src/Student.php';
    require_once 'src/StudentsList.php';

    // String representation test
    $s1 = new Student();
    $s1->setLastName("Иванов")
       ->setFirstName("Сергей")
       ->setFaculty("ФМиИТ")
       ->setCourse(3)
       ->setGroup("303");

    $s2 = new Student();
    $s2->setLastName("Сидоров")
       ->setFirstName("Александр")
       ->setFaculty("ФМиИТ")
       ->setCourse(1)
       ->setGroup("104");

    $correct = "Id: 1\nФамилия: Иванов\nИмя: Сергей\nФакультет: ФМиИТ\nКурс: 3\nГруппа: 303";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->__toString() . PHP_EOL . PHP_EOL;

    if ($s1->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $s1->setLastName("Иванов")
       ->setFirstName("Иван")
       ->setFaculty("ФМиИТ")
       ->setCourse(4)
       ->setGroup("401");

    $correct = "Id: 1\nФамилия: Иванов\nИмя: Иван\nФакультет: ФМиИТ\nКурс: 4\nГруппа: 401";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->__toString() . PHP_EOL . PHP_EOL;

    if ($s1->__toString() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    // Getters test
    $correct = "1";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getId() . PHP_EOL . PHP_EOL;

    if ($s1->getId() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "Иванов";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getLastName() . PHP_EOL . PHP_EOL;

    if ($s1->getLastName() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "Иван";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getFirstName() . PHP_EOL . PHP_EOL;

    if ($s1->getFirstName() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "ФМиИТ";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getFaculty() . PHP_EOL . PHP_EOL;

    if ($s1->getFaculty() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "4";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getCourse() . PHP_EOL . PHP_EOL;

    if ($s1->getCourse() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "401";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $s1->getGroup() . PHP_EOL . PHP_EOL;

    if ($s1->getGroup() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    // add and get test
    $list1 = new StudentsList();
    $list1->add($s1);
    $list1->add($s2);

    $correct1 = "Id: 1\nФамилия: Иванов\nИмя: Иван\nФакультет: ФМиИТ\nКурс: 4\nГруппа: 401";
    $correct2 = "Id: 2\nФамилия: Сидоров\nИмя: Александр\nФакультет: ФМиИТ\nКурс: 1\nГруппа: 104";

    echo "Ожидается:\n$correct1" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $list1->get(0)->__toString() . PHP_EOL . PHP_EOL;

    if ($list1->get(0)->__toString() == $correct1) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается:\n$correct2" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $list1->get(1)->__toString() . PHP_EOL . PHP_EOL;

    if ($list1->get(1)->__toString() == $correct2) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    // count test
    $correct = "2";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $list1->count() . PHP_EOL . PHP_EOL;

    if ($list1->count() == $correct) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    // store and load test
    $list1->store("StudentsList.dat");
    $list2 = new StudentsList();
    $list2->load("StudentsList.dat");

    echo "Ожидается:\n$correct1" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $list2->get(0)->__toString() . PHP_EOL . PHP_EOL;

    if ($list2->get(0)->__toString() == $correct1) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается:\n$correct2" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $list2->get(1)->__toString() . PHP_EOL . PHP_EOL;

    if ($list2->get(1)->__toString() == $correct2) {
        echo "Тест пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL . PHP_EOL . PHP_EOL;
    }
}