<?php

namespace Strontium\SevenVetrBundle;

/**
 * @author Aleksey Bannov <a.s.bannov@gmail.com>
 */
class VariationGenerator
{
    /**
     * @param array $source
     *
     * @return array
     */
    public function generateFromArray(array $source)
    {
        foreach ($source as $i => $row) {
            $source[$i] = array_unique($row);
        }
        $variations = [];
        foreach ($source as $i => $row) {
            foreach ($row as $j => $var) {
                $variations[][$i] = $var;
            }
        }

        return $variations;
    }
}
