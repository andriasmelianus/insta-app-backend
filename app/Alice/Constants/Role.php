<?php

namespace App\Alice\Constants;

class Role
{
    /**
     * Built-in special for built-in role.
     */
    const SPECIAL_GOD = 'god';
    /**
     * Special role for public user.
     */
    const SPECIAL_EVERYTHING = 'everything';
    const SPECIAL_NOTHING = 'nothing';

    /**
     * Returns all special role for public user.
     *
     * @return array
     */
    public static function allSpecial()
    {
        return [
            self::SPECIAL_EVERYTHING,
            self::SPECIAL_NOTHING
        ];
    }
}
