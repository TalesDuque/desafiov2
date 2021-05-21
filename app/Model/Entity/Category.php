<?php

namespace App\Model\Entity;

/**
 * Model do Produto
 */
class Category
{
    private $name;
    private $code;

    public function getName() : string {
        return $this->name;
    }

    public function getCode() : string {
        return $this->code;
    }
}
