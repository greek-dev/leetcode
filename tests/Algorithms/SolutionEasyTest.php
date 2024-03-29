<?php

use PHPUnit\Framework\TestCase;
use src\Algorithms\ListNode;
use src\Algorithms\SolutionEasy;

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

    /**
     * @param $input
     * @param $output
     * @dataProvider longestCommonPrefixProvider
     */
    public function testLongestCommonPrefix($input, $output)
    {
        $this->assertEquals($this->solution->longestCommonPrefix($input), $output);
    }

    public function longestCommonPrefixProvider()
    {
        return [
            [['zzzzzzzzzzzzzz', 'zzzzzzzzzzzzzz'], 'zzzzzzzzzzzzzz'],
            [["flower", "flow", "flight"], 'fl'],
            [["dog", "racecar", "car"], ''],
            [[], ''],
        ];
    }

    /**
     * @param $input
     * @param $output
     * @dataProvider isValidProvider
     */
    public function testIsValid($input, $output)
    {
        $this->assertEquals($this->solution->isValid($input), $output);
    }

    public function isValidProvider()
    {
        return [
            ['()', true],
            ['({})', true],
            ['(()()({})[()])', true],
            ['(', false],
            [')', false],
            ['([)', false],
        ];
    }

    /**
     * @param $list1
     * @param $list2
     * @param $output
     * @dataProvider mergeTwoListsProvider
     */
    public function testMergeTwoLists($list1, $list2, $output)
    {
        $this->assertEquals($this->solution->mergeTwoLists($list1, $list2), $output);
    }

    public function mergeTwoListsProvider()
    {
        return [
            [
                ListNode::createByItems(1, 1, 3),
                ListNode::createByItems(2, 3, 4),
                ListNode::createByItems(1, 1, 2, 3, 3, 4),
            ]
        ];
    }

    /**
     * @param $input
     * @param $output
     * @dataProvider removeDuplicatesProvider
     */
    public function testRemoveDuplicates($input, $output)
    {
        $count = $this->solution->removeDuplicates($input);
        $this->assertEquals($count, count($output));
        $this->assertEquals(array_slice($input, 0, $count), $output);
    }

    public function removeDuplicatesProvider()
    {
        return [
            [[1, 1, 2], [1, 2]],
            [[0, 0, 1, 1, 1, 2, 2, 3, 3, 4], [0, 1, 2, 3, 4]],
        ];
    }

    /**
     * @param $input1
     * @param $input2
     * @param $output
     * @dataProvider removeElementProvider
     */
    public function testRemoveElement($input1, $input2, $output)
    {
        $count = $this->solution->removeElement($input1, $input2);
        $this->assertEquals($count, count($output));
        $this->assertEquals(array_slice($input1, 0, $count), $output);
    }

    public function removeElementProvider()
    {
        return [
            [[3, 2, 2, 3], 3, [2, 2]],
            [[0, 1, 2, 2, 3, 0, 4, 2], 2, [0, 1, 3, 0, 4]]
        ];
    }

    /**
     * @param $haystack
     * @param $needle
     * @param $output
     * @dataProvider strStrProvider
     */
    public function testStrStr($haystack, $needle, $output)
    {
        $this->assertEquals($this->solution->strStr($haystack, $needle), $output);
    }

    public function strStrProvider()
    {
        return [
            ['hello', 'll', 2],
            ['aaaaa', 'bba', -1],
            ['bbbaa', 'bba', 1],
        ];
    }

    /**
     * @param $nums
     * @param $target
     * @param $output
     * @dataProvider searchInsertProvider
     */
    public function testSearchInsert($nums, $target, $output)
    {
        $this->assertEquals($this->solution->searchInsert($nums, $target), $output);
    }

    public function searchInsertProvider()
    {
        return [
            [[1,3,5,6], 5, 2],
            [[1,3,5,6], 2, 1],
            [[1,3,5,6], 7, 4],
            [[1,3,5,6], 0, 0],
        ];
    }
}