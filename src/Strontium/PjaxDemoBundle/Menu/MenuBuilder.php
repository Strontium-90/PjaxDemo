<?php

namespace Strontium\PjaxDemoBundle\Menu;

use ArrayIterator;
use Doctrine\ORM\EntityRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\Iterator\RecursiveItemIterator;
use Knp\Menu\ItemInterface;
use RecursiveIteratorIterator;
use Strontium\PjaxDemoBundle\Model\Message;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class MenuBuilder
{

    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var EntityRepository
     */
    private $messageRepository;

    /**
     * @param FactoryInterface $factory
     * @param EntityRepository $messageRepository
     */
    public function __construct(FactoryInterface $factory, EntityRepository $messageRepository)
    {
        $this->factory = $factory;
        $this->messageRepository = $messageRepository;
    }

    public function createMainMenu(Request $request)
    {
        $root = $this->buildMainMenu($request, $this->factory->createItem('root', [
            'childrenAttributes' => [

            ]
        ]));

        $menuIterator = new RecursiveIteratorIterator(
            new RecursiveItemIterator(new ArrayIterator([$root])),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($menuIterator as $item) {
            /** @var $item ItemInterface */
            $item->setAttribute('data-name', $item->getName());
        }

        return $root;
    }

    public function buildMainMenu(Request $request, ItemInterface $root)
    {
        $root
            ->addChild('Messages', [
                'route' => 'pjax_message_index',
            ])->getParent()
            ->addChild('New message', [
                'route' => 'pjax_message_new',
            ])->getParent();

        $latests = $root->addChild('latests', [
            'dropdown' => true,
        ]);

        /** @var Message $message */
        foreach ($this->messageRepository->findBy([], array(), 4) as $message) {
            $latests->addChild($message->getId(), [
                'route'           => 'pjax_message_show',
                'routeParameters' => [
                    'id' => $message->getId()
                ],
                'label'           => 'message '.$message->getId()
            ]);
        }

        return $root;
    }
}
