<?php

namespace Strontium\SevenVetrBundle;

/**
 * @author Aleksey Bannov <a.s.bannov@gmail.com>
 */
class KeyParser
{
    /**
     * @param string $text
     *
     * @return array
     */
    public function parse($text): array
    {
        $keys = [
            'raz',
            'dva',
            'tri',
        ];

        preg_match_all(sprintf('/(%s):(.*)$/s', implode('|', $keys)), $text, $matches, PREG_SET_ORDER);

        $result = [];
        foreach ($matches as $i => $match) {
            $subParse = $this->parse($match[2]);
            if (count($subParse) > 0) {
                $min = null;
                foreach ($subParse as $key => $string) {
                    $pos = strpos($match[2], sprintf('%s:', $key));
                    if (null === $min || $pos < $min){
                        $min = $pos;
                    }
                }
                $result[$match[1]] = substr($match[2], 0, $min);
                $result = array_merge($result, $subParse);
            } else {
                $result[$match[1]] = $match[2];
            }
        }

        return $result;
    }
}
