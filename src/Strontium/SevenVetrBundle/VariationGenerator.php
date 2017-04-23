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
                foreach ($this->getVariationIndexesForRow($i) as $k) {
                    if (!isset($variations[$k])){
                        $variations[$k] = [];
                    }
                    $variations[$k][$i] = $var;
                }
            }
        }

        return $variations;
    }

    public function getVariationIndexesForRow($i)
    {

    }
}
