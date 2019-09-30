<?php


use PHPUnit\Framework\TestCase;
use src\SolutionHard;

class SolutionHardTest extends TestCase
{
    private $solution;

    protected function setUp(): void
    {
        $this->solution = new SolutionHard();
    }

    /**
     * @param $input1
     * @param $input2
     * @param $output
     * @dataProvider findMedianSortedArraysProvider
     */
    public function testFindMedianSortedArrays($input1, $input2, $output)
    {
        $this->assertEquals($this->solution->findMedianSortedArrays($input1, $input2), $output);
    }

    public function findMedianSortedArraysProvider()
    {
        return [
            [[1, 3], [2], 2],
            [[1, 2], [3, 4], 2.5],
            [[], [1], 1],
            [[2], [], 2],
            [[], [2, 3], 2.5],
            [[3], [-2, -1], -1],
        ];
    }
}