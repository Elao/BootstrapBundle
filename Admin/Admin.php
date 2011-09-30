<?php

namespace Elao\BootstrapBundle\Admin;

use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

class Admin extends BaseAdmin
{
    /**
     * Returns the list template
     *
     * @return string the list template
     */
    public function getListTemplate()
    {
        return 'ElaoBootstrapBundle:CRUD:list.html.twig';
    }

    /**
     * Returns the edit template
     *
     * @return string the edit template
     */
    public function getEditTemplate()
    {
        return 'ElaoBootstrapBundle:CRUD:edit.html.twig';
    }

    /**
     * Returns the view template
     *
     * @return string the view template
     */
    public function getShowTemplate()
    {
        return 'ElaoBootstrapBundle:CRUD:show.html.twig';
    }
}