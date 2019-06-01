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
            $newArray[] = $value;
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
    $newArr = [];
    $uniqueArr = [];

    sort($array);

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $array[$i+1]) {
            continue;
        }
        $uniqueArr[] = $array[$i];
    }

    $count = count($uniqueArr);

    $newArr['min'] = [
        $uniqueArr[0],
        $uniqueArr[1],
        $uniqueArr[2],
    ];

    $newArr['average'] = [
        $uniqueArr[$count / 2 - 1],
        $uniqueArr[$count / 2],
        $uniqueArr[$count / 2 + 1],
    ];

    $newArr['max'] = [
        $uniqueArr[$count - 3],
        $uniqueArr[$count - 2],
        $uniqueArr[$count - 1],
    ];

    return $newArr;
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
            $booksPHP[] = $item;
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