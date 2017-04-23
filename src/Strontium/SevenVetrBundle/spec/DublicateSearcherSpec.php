<?php

namespace spec\Strontium\SevenVetrBundle;

use PhpSpec\ObjectBehavior;
use Strontium\SevenVetrBundle\DublicateSearcher;

/**
 * @mixin DublicateSearcher
 */
class DublicateSearcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DublicateSearcher::class);
    }

    function it_should_find_repeated_numbers()
    {
        $arr = $this->generateArray(200000);

        $this->find($arr)->shouldHaveCount(200000);
    }

    /**
     * @param integer $dublicateCount
     *
     * @return array
     */
    protected function generateArray($dublicateCount)
    {
        $arr = [];
        $i = 0;
        $min = 100000;
        while (count($arr) < 1000000) {
            $newNumber = $min + $i;
            $arr[] = $newNumber;
            if ($dublicateCount > 0) {
                $arr[] = $newNumber;
                $dublicateCount--;
            }
            $i++;
        }
        shuffle($arr);

        return $arr;
    }
}
