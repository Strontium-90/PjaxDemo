<?php

namespace spec\Strontium\SevenVetrBundle;

use PhpSpec\ObjectBehavior;
use Strontium\SevenVetrBundle\VariationGenerator;

/**
 * @mixin VariationGenerator
 */
class VariationGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(VariationGenerator::class);
    }

    function it_should_generate_variations_from_source()
    {
        $source = [
            ['a1', 'a2', 'a3'],
            ['b1', 'b2'],
            ['c1', 'c2', 'c3'],
            ['d1'],
        ];
        $this->generateFromArray($source)->shouldBeEqualTo([

        ]);
    }
}
