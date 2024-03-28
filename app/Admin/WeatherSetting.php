<?php

namespace Datlx\App\Admin;

use Datlx\App\Admin\WeatherSetting\TraitCreate;


/**
 * @add_action(admin_menu, register, 10, 1)
 */
class WeatherSetting
{
    use Menu, TraitCreate;

    protected function menus()
    {
        return [
            'page_title' => 'List Product',
            'menu_title' => 'Products',
            'capability' => $this->capability(),
            'menu_slug' => $this->parent_slug(),
            'callback' => [$this, 'index'],
            'icon_url' => 'dashicons-products',
            'position' => 79,
            'subs' => [
                [
                    'parent_slug' => $this->parent_slug(),
                    'page_title' => 'Create Product',
                    'menu_title' => 'Create Product',
                    'capability' => $this->capability(),
                    'menu_slug' => $this->parent_slug() . '-create-product',
                    'callback' => [$this, 'create'],
                    'position' => null,
                ],
                [
                    'parent_slug' => $this->parent_slug(),
                    'page_title' => 'Update Product',
                    'menu_title' => 'Update Product',
                    'capability' => $this->capability(),
                    'menu_slug' => $this->parent_slug() . '-update-product',
                    'callback' => [$this, 'create'],
                    'position' => null,
                ]
            ]
        ];
    }

    protected function parent_slug()
    {
        return 'wp_datlx_weather_setting';
    }

    protected function capability()
    {
        return 'manage_options';
    }
}
