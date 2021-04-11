<?php

namespace App\Alice\Support;

/**
 * This class helps the operation that involving company module.
 */

class Company
{

    /**
     * Constructor.
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Register a user to the first linked company data in company_user pivot table.
     * 
     * @return void
     */
    public function registerFirst()
    {
    }

    /**
     * Get my currenct active company.
     * 
     * @return array
     */
    public function getMine()
    {
        if (!auth()->user()->active_company_id) {
        }
    }
}
