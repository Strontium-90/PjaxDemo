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

    function it_should_parse_this_text()
    {
        $text = <<<TEXT
The home directory [a:aaa]inside[/a] which Python MySQL settings will be stored, which Ansible will use when connecting to MySQL.
This should be the home directory of the user which runs this [e]Ansible[/d] role. The mysql_user_name and mysql_user_password 
can be set if you are [b:bbb]running[/b] this role [c]under[/c] a non-root user account and want to set a non-root user.
TEXT;


        $this->parse($text)->shouldBeEqualTo([
            [
                'a' => 'inside',
                'b' => 'running',
                'c' => 'under',
            ],
            [
                'a' => 'aaa',
                'b' => 'bbb',
                'c' => '',
            ]
        ]);
    }

    function it_should_parse_only_unique_tags()
    {
        $text = <<<TEXT
The home directory [a:aaa]inside[/a] which Python MySQL settings will be stored, which Ansible will use when connecting to MySQL.
This should be the home directory of the user which runs this Ansible role. The mysql_user_name and mysql_user_password 
can be set if you are [b:bbb]running[/b] this role [a]under[/a] a non-root user account and want to set a non-root user.
TEXT;


        $this->parse($text)->shouldBeEqualTo([
            [
                'a' => 'under',
                'b' => 'running',
            ],
            [
                'a' => '',
                'b' => 'bbb',
            ]
        ]);
    }
}
