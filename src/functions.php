<?php

require_once 'books.php';
/*
    Є масив з довільними числами. Зробіть так, щоб елемент повторився в масиві
    таку кількість разів яка відповідає його числу. Приклад: [1, 3, 2, 4]
    перетворюється в [1, 3, 3, 3, 2, 2, 4, 4, 4, 4].
*/
function repeatElements($array)
{
    $newArray = [];

    foreach ($array as $value) {
        for ($i = 0; $i < $value; $i ++) {
            array_push($newArray, $value);
        }
    }

    return $newArray;
}

/*
    Є масив: $temperatures = [
        33, 15, 17, 20, 23, 23, 28, 40, 21, 19, 31, 18, 30, 31, 28,
        23, 19, 28, 27, 30, 39, 17, 17, 20, 19, 23, 28, 30, 34, 28
    ];
    Знайти три найменших значення, три найбільших і три середніх.
*/
function findValues($array)
{
    sort($array);
    $newArr = [];
    $findValues = [];

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $array[$i+1]) {
            continue;
        }
        array_push($newArr, $array[$i]);
    }

    $smallest = $newArr[0];
    $biggest = $newArr[(count($newArr)-1)];

    for ($i = 0; $i < count($newArr); $i++) {
        if (($newArr[$i] >= $smallest) && $i <= 2) {
            array_push($findValues, $newArr[$i]);
        }
    }

    for ($i = 0; $i < count($newArr); $i++) {
        if ($i == ((count($newArr) - 1) / 2) ) {
            array_push($findValues, $newArr[$i-1], $newArr[$i], $newArr[$i+1]);
        }
    }

    for ($i = 0; $i < count($newArr); $i++) {
        if (($newArr[$i] <= $biggest) && $i >= (count($newArr) - 3)) {
            array_push($findValues, $newArr[$i]);
        }
    }

    return $findValues;
}

/*
    Є масив книг (файл 'src/books.php).
    Отримати масив відсортований за ціною книжок;
    Отримати відфільтрований массив книжок у яких є тег 'php'.
*/
function sortBooks($books)
{
    $booksPHP = [];

    foreach ($books as $key => $value) {
        $booksPrices[$key] = $value['price'];
    }
    array_multisort($booksPrices, SORT_ASC, $books);

    foreach ($books as $item) {
        if (array_key_exists("tags", $item) && in_array("php", $item["tags"])) {
            array_push($booksPHP, $item);
        }
    }

    return $booksPHP;
}

/*
    You are going to be given an array of integers.
    Your job is to take that array and find an index N where the sum of the integers
    to the left of N is equal to the sum of the integers to the right of N.
    If there is no index that would make this happen, return -1.
*/
function findEvenIndex($array)
{
    $leftSum = 0;

    for ($i = 1; $i < count($array) - 1; $i++) {
        $leftSum += $array[$i - 1];
        $rightSum = 0;

        for ($j = $i; $j < count($array) -1; $j++) {
            $rightSum += $array[$j + 1];
        }

        if ($leftSum === $rightSum) {
            return $i;
        }
    }

    return - 1;
}

/*
    You need to find out a unique value in array, you are given arrays:
        [ 1, 1, 1, 2, 1, 1 ] => 2
        [ 0, 0, 0.55, 0, 0 ] => 0.55
        [3,1,5,3,7,4,1,5,7] => 4
*/
function findUniqueValues($array)
{
    foreach ($array as $value) {
        $countUnique = 0;

        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] !== $value) {
                $countUnique++;
            }
        }

        if ($countUnique === (count($array) - 1)) {
            return $value;
        }
    }
}