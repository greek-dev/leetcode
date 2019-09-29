<?php


use PHPUnit\Framework\TestCase;
use src\ListNode;
use src\Solution;

class SolutionTest extends TestCase
{
    private $solution;

    protected function setUp(): void
    {
        parent::setUp();
        $this->solution = new Solution();
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @param ListNode $output
     * @dataProvider twoNumbersProvider
     */
    public function testTwoNumbers(ListNode $l1, ListNode $l2, ListNode $output)
    {
        $this->assertEquals($this->solution->addTwoNumbers($l1, $l2), $output);
    }

    public function twoNumbersProvider()
    {
        return [
            [
                $this->getListNote(2, 4, 3),
                $this->getListNote(5, 6, 4),
                $this->getListNote(7, 0, 8)
            ]
        ];
    }

    private function getListNote(int ...$items): ListNode
    {
        $link = $list = new ListNode(0);
        foreach ($items as $item) {
            $link->next = new ListNode($item);
            $link = $link->next;
        }
        return $list->next;
    }

    /**
     * @param string $input
     * @param int $output
     * @dataProvider lengthOfLongestSubstringProvider
     */
    public function testLengthOfLongestSubstring(string $input, int $output)
    {
        $this->assertEquals($this->solution->lengthOfLongestSubstring($input), $output);
    }

    public function lengthOfLongestSubstringProvider()
    {
        return [
            'abcabcbb' => ['abcabcbb', 3],
            'bbbbb' => ['bbbbb', 1],
            'pwwkew' => ['pwwkew', 3],
            'tmmzuxt' => ['tmmzuxt', 5],
            'asdsazx' => ['asdsazx', 5],
            'q' => ['q', 1],
        ];
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
}