<?php

namespace Cmf\MainBundle\Menu;

use Knp\Menu\MenuItem;

use Symfony\Cmf\Bundle\MenuBundle\Provider\PHPCRMenuProvider;

class MenuProvider extends PHPCRMenuProvider
{
    public function get($name, array $options = array())
    {
        //get the internal pages of the website
        $menu = parent::get($name, $options);

        if ($name === 'simple') {
            //Home menu item
            $item = new MenuItem('Home', $this->factory);
            $item->setUri($menu->getUri());
            $menu->addChild($item);
            $item->moveToFirstPosition();
        }

        return $menu;
    }
}