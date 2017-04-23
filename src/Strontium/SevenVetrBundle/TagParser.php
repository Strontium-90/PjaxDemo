<?php

namespace Strontium\SevenVetrBundle;

/**
 * @author Aleksey Bannov <a.s.bannov@gmail.com>
 */
class TagParser
{
    /**
     * @param string $text
     *
     * @return array
     */
    public function parse($text): array
    {
        $description = [];
        $data = [];
        preg_match_all('|\[([^\]+])(:([^\]]+))?\](.*)\[\/\1\]|Us', $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $i => $match) {
            $data[$match[1]] = $match[4];
            $description[$match[1]] = $match[3];
        }

        return [$data, $description];
    }
}
