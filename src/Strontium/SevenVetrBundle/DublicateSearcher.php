<?php

namespace Strontium\SevenVetrBundle;

/**
 * @author Aleksey Bannov <a.s.bannov@gmail.com>
 */
class DublicateSearcher
{
    /**
     * @param array $numbers
     *
     * @return array
     */
    public function find(array $numbers)
    {
        $dublicates = [];
        foreach ($numbers as $number) {
            if (!isset($dublicates[$number])) {
                $dublicates[$number] = 1;
            } else {
                $dublicates[$number]++;
            }
        }

        return array_filter($dublicates, function ($count) {
            return $count > 1;
        });
    }
}
