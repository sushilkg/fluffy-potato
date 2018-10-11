<?php

namespace App;

class GroupNumber
{
    public function getGroupNumber($group_number)
    {
        $numbers = [];
        for ($i = 1; $i <= 500; $i++) {
            if($i % $group_number === 0) {
                $numbers[] = $i;
            }
        }
        return $numbers;
    }
}