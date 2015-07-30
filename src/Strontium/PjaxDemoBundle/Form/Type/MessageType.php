<?php
namespace Strontium\PjaxDemoBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'textarea', array())
            ->add('value', 'integer', array());
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pjax_message';
    }
}

