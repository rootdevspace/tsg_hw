<?php

declare(strict_types=1);

namespace Models;

use Core\Model;

/**
 * Class User
 */
class Customer extends Model
{
    /**
     * @return string
     */
    function __construct()
    {
        $this->tableName = 'customer';
        $this->idColumn = 'customer_id';
    }
    
}
