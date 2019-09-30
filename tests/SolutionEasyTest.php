<?php

use PHPUnit\Framework\TestCase;
use src\SolutionEasy;

class SolutionEasyTest extends TestCase
{
    private $solution;

    protected function setUp(): void
    {
        $this->solution = new SolutionEasy();
    }

    /**
     * @param $nums
     * @param $target
     * @param $output
     * @dataProvider twoSumProvider
     */
    public function testTwoSum($nums, $target, $output)
    {
        $this->assertEquals($this->solution->twoSum($nums, $target), $output);
    }

    public function twoSumProvider()
    {
        return [
            [[2, 7, 4, 3, 2], 9, [0, 1]]
        ];
    }

    /**
     * @param $input
     * @param $output
     * @dataProvider reverseProvider
     */
    public function testReverse($input, $output)
    {
        $this->assertEquals($this->solution->reverse($input), $output);
    }

    public function reverseProvider()
    {
        return [
            [123, 321],
            [-123, -321],
            [120, 21],
            [1534236469, 0],
        ];
    }

    /**
     * @param $input
     * @param $output
     * @dataProvider isPalindromeProvider
     */
    public function testIsPalindrome($input, $output)
    {
        $this->assertEquals($this->solution->isPalindrome($input), $output);
    }

    public function isPalindromeProvider()
    {
        return [
            '121' => [121, true],
            '-121' => [-121, false],
            '10' => [10, false],
        ];
    }

    /**
     * @param $input
     * @param $output
     * @dataProvider romanToIntProvider
     */
    public function testRomanToInt($input, $output)
    {
        $this->assertEquals($this->solution->romanToInt($input), $output);
    }

    public function romanToIntProvider()
    {
        return [
            ["III", 3],
            ["IV", 4],
            ["IX", 9],
            ["LVIII", 58],
            ["MCMXCIV", 1994],
        ];
    }
}