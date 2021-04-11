<?php

namespace App\Alice\Constants;

/**
 * Class that holds constant value
 */

class Permission
{
    const OPERATION_CREATE = 'create';
    const OPERATION_READ = 'read';
    const OPERATION_UPDATE = 'update';
    const OPERATION_DELETE = 'delete';

    const ENTITY_COMPANY = 'company';
    const ENTITY_BRANCH = 'branch';
    const ENTITY_EMPLOYEE = 'employee';
    const ENTITY_ROLE = 'role';
    const ENTITY_USER = 'user';
    const ENTITY_ASSET = 'asset';
    const ENTITY_ROOM = 'room';
    const ENTITY_PRODUCT = 'product';
    const ENTITY_MOVEMENT = 'movement';

    /**
     * Generate permission slug.
     * 
     * @param string $entity
     * @param string $operation
     * @return string
     */
    public static function generateSlug(string $entity, string $operation)
    {
        return ($entity . '-' . $operation);
    }

    /**
     * Generate permission slug for company entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateCompanySlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_COMPANY, $operation);
    }

    /**
     * Generate permission slug for branch entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateBranchSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_BRANCH, $operation);
    }

    /**
     * Generate permission slug for employee entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateEmployeeSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_EMPLOYEE, $operation);
    }

    /**
     * Generate permission slug for role entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateRoleSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_ROLE, $operation);
    }

    /**
     * Generate permission slug for user entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateUserSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_USER, $operation);
    }

    /**
     * Generate permission slug for asset entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateAssetSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_ASSET, $operation);
    }

    /**
     * Generate permission slug for room entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateRoomSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_ROOM, $operation);
    }

    /**
     * Generate permission slug for product entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateProductSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_PRODUCT, $operation);
    }

    /**
     * Generate permission slug for movement entity.
     * 
     * @param string $operation
     * @return string
     */
    public static function generateMovementSlug(string $operation)
    {
        return self::generateSlug(self::ENTITY_MOVEMENT, $operation);
    }
}
