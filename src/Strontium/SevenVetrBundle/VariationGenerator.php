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
                foreach ($this->getVariationIndexesForRow($source, $i) as $k) {
                    if (!isset($variations[$k])) {
                        $variations[$k] = [];
                    }
                    $variations[$k][$i] = $var;
                }
            }
        }

        return $variations;
    }

    /**
     * @param array $source
     * @param       $i
     *
     * @return array
     */
    public function getVariationIndexesForRow(array $source, $i)
    {
        //генерим массив в котором будет встречаться данный элемент в массиве вариаций
        return [];
    }
}
