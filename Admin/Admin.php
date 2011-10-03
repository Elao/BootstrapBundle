<?php

namespace Elao\BootstrapBundle\Admin;

use Sonata\AdminBundle\Admin\Admin as BaseAdmin;

class Admin extends BaseAdmin
{
    public function getI18nPrefix()
    {
        return 'admin.'.$this->getClassnameLabel();
    }
    
    protected $formTheme = array('ElaoBootstrapBundle:Form:fields.html.twig');

    protected $filterTheme = array('ElaoBootstrapBundle:Form:filter_fields.html.twig');
}