<?php

namespace src\Algorithms;

/**
 * Class ListNode
 * @package LeetCode
 */
class ListNode
{
    /** @var int */
    public $val = 0;

    /** @var ListNode|null */
    public $next = null;

    /**
     * ListNode constructor.
     * @param $val
     */
    function __construct($val)
    {
        $this->val = $val;
    }

    public static function createByItems(int ...$items): ?ListNode
    {
        $link = $list = new ListNode(0);
        foreach ($items as $item) {
            $link->next = new ListNode($item);
            $link = $link->next;
        }
        return $list->next;
    }
}