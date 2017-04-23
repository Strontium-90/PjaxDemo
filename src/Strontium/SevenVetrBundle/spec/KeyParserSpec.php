<?php

namespace spec\Strontium\SevenVetrBundle;

use PhpSpec\ObjectBehavior;
use Strontium\SevenVetrBundle\KeyParser;

/**
 * @mixin KeyParser
 */
class KeyParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(KeyParser::class);
    }

    function it_should_parse_text_with_keys()
    {
        $text = <<<TEXT
The home directory raz:inside which Python MySQL settings will be stored, which Ansible will use when connecting to MySQL.
This should be the home tri:directory of the user which runs this Ansible role. The mysql_user_name and mysql_user_password 
can be set if you are running dva:this role under a non-root user account and want to set a non-root user.
TEXT;

        $this->parse($text)->shouldBeLike([
            'raz' => 'inside which Python MySQL settings will be stored, which Ansible will use when connecting to MySQL.
This should be the home ',
            'dva' => 'this role under a non-root user account and want to set a non-root user.',
            'tri' => 'directory of the user which runs this Ansible role. The mysql_user_name and mysql_user_password 
can be set if you are running ',
        ]);
    }


    function it_should_parse_only_unique_keys()
    {
        $text = <<<TEXT
The home directory raz:inside which Python MySQL settings will be stored, which Ansible will use when connecting to MySQL.
This should be the home dva:directory of the user which runs this Ansible role. The mysql_user_name and mysql_user_password 
can be set if you are running raz:this role under a non-root user account and want to set a non-root user.
TEXT;

        $this->parse($text)->shouldBeLike([
            'raz' => 'this role under a non-root user account and want to set a non-root user.',
            'dva' => 'directory of the user which runs this Ansible role. The mysql_user_name and mysql_user_password 
can be set if you are running ',
        ]);
    }
}
