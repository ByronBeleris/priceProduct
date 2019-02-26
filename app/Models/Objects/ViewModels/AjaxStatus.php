<?php namespace App\Models\Objects\ViewModels;

/**
 * AjaxStatusViewModel
 * @package Application
 * @author Byron Beleris
 */

class AjaxStatus
{
    const SUCCESS = 1;
    const FAIL = 2;
    
    const SEVERITY_WARN = "warning";
    const SEVERITY_INFO = "info";
    const SEVERITY_SUCCESS = "success";
    const SEVERITY_ERROR = "error";
}