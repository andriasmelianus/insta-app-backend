<?php

namespace App\Alice\Constants;

/**
 * Class untuk menyimpan nilai konstan entiti employee.
 */
class Employee
{
    const ID_TYPE_ID = 'id-card';
    const ID_TYPE_DRIVING_LICENSE = 'driving-license';

    /**
     * Get all id type.
     * 
     * @return array
     */
    public static function allIdType()
    {
        return [
            self::ID_TYPE_ID,
            self::ID_TYPE_DRIVING_LICENSE
        ];
    }
}
