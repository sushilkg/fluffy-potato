<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\GroupNumber;

class GroupNumberTest extends TestCase
{
    public function testGetGroupNumberCanBeDivided(): void
    {
        $group_number = new GroupNumber();
        $group_20     = $group_number->getGroupNumber(20);
        $this->assertEquals($group_20[5] % 20, 0);
    }

    public function testGetGroupNumberNoDuplicate(): void
    {
        $group_number = new GroupNumber();
        $group_20     = $group_number->getGroupNumber(20);
        $group_10     = $group_number->getGroupNumber(10);
        $this->assertFalse(in_array(40, $group_10));
    }
}