<?php

namespace spec\Strontium\SevenVetrBundle;

use PhpSpec\ObjectBehavior;
use Strontium\SevenVetrBundle\Parser;

/**
 * @mixin Parser
 */
class ParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Strontium\SevenVetrBundle\Parser');
    }

    private function it_should_parse_this_text()
    {
        $text = <<<TEXT

TEXT;


        $this->parse($text)->shoulBe([]);
    }
}
