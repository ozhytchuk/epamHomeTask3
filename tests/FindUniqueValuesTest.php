<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class FindUniqueValuesTest extends TestCase
{
    public function positiveDataProvider()
    {
        return [
            [[1, 1, 1, 2, 1, 1], 2],
            [[0, 0, 0.55, 0, 0], 0.55],
            [[3, 1, 5, 3, 7, 4, 1, 5, 7], 4],
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
        $result = findUniqueValues($array);
        $this->assertEquals($expected, $result);
    }
}