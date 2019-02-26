<?php namespace App\Models\Objects\ViewModels;

/**
 * AjaxResponseViewModel
 * @package Application
 * @author Byron Beleris
 */
class AjaxResponseViewModel
{
    public $Model;
    public $Status;
    public $Messages = array();
    public $ValidationMessages;
    
    public function __construct()
    {
        $this->Status = AjaxStatus::FAIL;
    }
    
    public function AddMessage( AjaxMessageViewModel $messageModel )
    {
        $this->Messages[] = $messageModel;
    }
}