<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\MenuItem;
use Symfony\Cmf\Bundle\MenuBundle\Provider\PhpcrMenuProvider;

class MenuProvider extends PhpcrMenuProvider
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function setFactory(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function get($name, array $options = array())
    {
        //get the internal pages of the website
        $menu = parent::get($name, $options);

        if ($name === 'simple') {
            //Home menu item
            $menuWithHome = $this->factory->createItem('');

            $item = new MenuItem('Home', $this->factory);
            $item->setUri($menu->getUri());
            $menuWithHome->addChild($item);

            foreach ($menu->getChildren() as $child) {
                $child->setParent(null);
                $menuWithHome->addChild($child);
            }

            return $menuWithHome;
        }

        return $menu;
    }
}
