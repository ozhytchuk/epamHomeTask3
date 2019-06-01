<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class FindValuesTest extends TestCase
{
    public function positiveDataProvider()
    {
        return [
            [
                [
                    33, 15, 17, 20, 23, 23, 28, 40, 21, 19, 31, 18, 30, 31, 28,
                    23, 19, 28, 27, 30, 39, 17, 17, 20, 19, 23, 28, 30, 34, 28,
                ],
                [
                    'min' => [15,17,18],
                    'average' => [23,27,28],
                    'max' => [34,39,40],
                ]
            ],
        ];
    }

    /**
     * @param $array
     * @param $expected
     *
     * @dataProvider positiveDataProvider
     */
    public function testPositive($array, $expected)
    {
        $result = findValues($array);
        $this->assertEquals($expected, $result);
    }
}