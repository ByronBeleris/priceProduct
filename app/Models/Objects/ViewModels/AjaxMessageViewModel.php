<?php namespace App\Models\Objects\ViewModels;

/**
 * AjaxMessageModel
 * @package Application
 * @author Byron Beleris
 */

class AjaxMessageViewModel
{
    public $Text;
    public $Severity;
    public $Title;
    
    public function __construct( $text, $severity, $title = "" )
    {
        $this->Text = $text;
        $this->Severity = $severity;
        $this->Title = $title;
    }
}