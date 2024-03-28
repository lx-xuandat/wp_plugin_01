<?php

namespace Datlx\App\Admin;

/**
 * Class document
 * @add_action(admin_init, store, 10, 1)
 * @add_action(admin_menu, getStore, 10, 1)
 * @add_action(admin_menu, postStore, 10, 1)
 */
class Backend
{
    public function __construct()
    {
    }

    public function store()
    {
    }

    public function getStore()
    {
    }

    public function postStore()
    {
    }
}
