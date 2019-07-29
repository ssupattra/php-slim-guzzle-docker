<?php
namespace Pearler\Model;
use Interop\Container\ContainerInterface;

class Base
{
    protected $c;
    public function __construct(ContainerInterface $c)
    {
        $this->c = $c;
    }
}