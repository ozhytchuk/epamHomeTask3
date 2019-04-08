<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class FindEvenIndexTest extends TestCase
{
    public function positiveDataProvider()
    {
        return [
            [[1,2,3,4,3,2,1], 3],
            [[1,100,50, -51,1,1], 1],
            [[10,-80,10,10,15,35], -1],
            [[20,10,-80,10,10,15,35], -1],
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
        $result = findEvenIndex($array);
        $this->assertEquals($expected, $result);
    }
}