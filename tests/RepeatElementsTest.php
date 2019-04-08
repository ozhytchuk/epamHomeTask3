<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class RepeatElementsTest extends TestCase
{
    public function positiveDataProvider()
    {
        return [
            [
                [1, 3, 2, 4],
                [1, 3, 3, 3, 2, 2, 4, 4, 4, 4],
            ],
            [
                [2, 4, 6],
                [2, 2, 4, 4, 4, 4, 6, 6, 6, 6, 6, 6]
            ],
            [
                [3],
                [3, 3, 3]
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
        $result = repeatElements($array);
        $this->assertEquals($expected, $result);
    }
}