<?php


use PHPUnit\Framework\TestCase;
use src\ListNode;
use src\SolutionMedium;

class SolutionMediumTest extends TestCase
{
    private $solution;

    protected function setUp(): void
    {
        $this->solution = new SolutionMedium();
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
                ListNode::createByItems(2, 4, 3),
                ListNode::createByItems(5, 6, 4),
                ListNode::createByItems(7, 0, 8),
            ]
        ];
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
     * @param $input
     * @param $output
     * @dataProvider productExceptSelfProvider
     */
    public function testProductExceptSelf($input, $output)
    {
        $this->assertEquals($this->solution->productExceptSelf($input), $output);
    }

    public function productExceptSelfProvider()
    {
        return [
            [[1, 2, 3, 4], [24, 12, 8, 6]],
        ];
    }
}