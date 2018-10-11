<?php

namespace App;

class GroupNumber
{
    protected $all_group_numbers = [];

    public function getGroupNumber(int $group_number): array
    {
        $numbers = [];
        for ($i = 1; $i < 500; $i++) {
            if ($i % $group_number === 0 && !$this->alreadyUsedNumber($i)) {
                $numbers[] = $i;
                $this->all_group_numbers[] = $i;
            }
        }

        return $numbers;
    }

    protected function alreadyUsedNumber($number_to_check)
    {
        return in_array($number_to_check, $this->all_group_numbers);
    }

}