<?php

use App\Models\Company;

if (!function_exists('getCompany')) {
    function getCompany()
    {
        return Company::findOrFail(session('company_id'));
    }
}