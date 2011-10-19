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

    /**
     * The base route name used to generate the routing information when this admin is a child
     *
     * @var string
     */
    protected $baseChildRouteName;

    /**
     * The base route pattern used to generate the routing information when this admin is a child
     *
     * @var string
     */
    protected $baseChildRoutePattern;

    /**
     * Returns the baseRoutePattern used to generate the routing information
     *
     * @throws RuntimeException
     * @return string the baseRoutePattern used to generate the routing information
     */
    public function getBaseRoutePattern()
    {
        if (!$this->baseRoutePattern) {
            preg_match('@([A-Za-z0-9]*)\\\([A-Za-z0-9]*)Bundle\\\(Entity|Document|Model)\\\(.*)@', $this->getClass(), $matches);

            if (!$matches) {
                throw new \RuntimeException(sprintf('Please define a default `baseRoutePattern` value for the admin class `%s`', get_class($this)));
            }

            if ($this->isChild()) { // the admin class is a child, prefix it with the parent route name
                $this->baseRoutePattern = sprintf('%s/{id}/%s',
                    $this->getParent()->getBaseRoutePattern(),
                    $this->baseChildRoutePattern ?: $this->urlize($matches[4], '-')
                );
            } else {

                $this->baseRoutePattern = sprintf('/%s/%s/%s',
                    $this->urlize($matches[1], '-'),
                    $this->urlize($matches[2], '-'),
                    $this->urlize($matches[4], '-')
                );
            }
        }

        return $this->baseRoutePattern;
    }

    /**
     * Returns the baseRouteName used to generate the routing information
     *
     * @throws RuntimeException
     * @return string the baseRouteName used to generate the routing information
     */
    public function getBaseRouteName()
    {
        if (!$this->baseRouteName) {
            preg_match('@([A-Za-z0-9]*)\\\([A-Za-z0-9]*)Bundle\\\(Entity|Document|Model)\\\(.*)@', $this->getClass(), $matches);

            if (!$matches) {
                throw new \RuntimeException(sprintf('Please define a default `baseRouteName` value for the admin class `%s`', get_class($this)));
            }

            if ($this->isChild()) { // the admin class is a child, prefix it with the parent route name
                $this->baseRouteName = sprintf('%s_%s',
                    $this->getParent()->getBaseRouteName(),
                    $this->baseChildRouteName ?: $this->urlize($matches[4])
                );
            } else {

                $this->baseRouteName = sprintf('admin_%s_%s_%s',
                    $this->urlize($matches[1]),
                    $this->urlize($matches[2]),
                    $this->urlize($matches[4])
                );
            }
        }

        return $this->baseRouteName;
    }
}