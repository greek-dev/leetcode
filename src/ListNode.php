<?php

namespace src;

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
}