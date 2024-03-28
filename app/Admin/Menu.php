<?php

namespace Datlx\App\Admin;

trait Menu
{
    /**
     * @return array
     */
    abstract protected function menus();
    abstract protected function capability();
    abstract protected function parent_slug();

    public function register()
    {
        try {
            $menu = $this->menus();
            add_menu_page(
                $menu['page_title'],
                $menu['menu_title'],
                $menu['capability'],
                $menu['menu_slug'],
                $menu['callback'],
                $menu['icon_url'],
                $menu['position']
            );

            foreach ($menu['subs'] as $item) {
                add_submenu_page(
                    $item['parent_slug'],
                    $item['page_title'],
                    $item['menu_title'],
                    $item['capability'],
                    $item['menu_slug'],
                    $item['callback'],
                    $item['position']
                );
            }
        } catch (\Exception $e) {
            echo 'check menu method';
            die;
        }
    }
}
