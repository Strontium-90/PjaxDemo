<?php
namespace Strontium\PjaxDemoBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;


class Message
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     *
     * @Constraints\Length(min="2", max="255")
     * @Constraints\NotBlank()
     */
    protected $text;

    /**
     * @var integer
     *
     * @Constraints\NotBlank()
     * @Constraints\GreaterThan(value="0")
     * @Constraints\Type(type="integer")
     */
    protected $value;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Message
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set value
     *
     * @param integer $value
     * @return Message
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }
}
