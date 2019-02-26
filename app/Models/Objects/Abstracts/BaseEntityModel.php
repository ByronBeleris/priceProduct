<?php namespace App\Models\Objects\Abstracts;

/**
 * BaseEntityModel should be inherited by an entity model
 * @package Application
 * @author Byron Beleris
 */
abstract class BaseEntityModel
{
    private $rules = array();
    private $customMessages = array();
    
    /**
     * @return array
     */
    public function GetRules()
    {
        return $this->rules;
    }
    
    /**
     * @param array $rules
     * @return void
     */
    public function SetRules( $rules  )
    {
        $this->rules = $rules;
    }
    
    public function GetCustomMessages()
    {
        return $this->customMessages;
    }
    
    public function SetCustomMessages( $messages )
    {
        $this->customMessages = $messages;
    }
    
    protected function Sanatize( $string )
    {
        if(is_numeric($string))
        {
            return $string;
        }
        if( is_string( $string ) )
        {
            $string = \App\Helpers\GeneralHelper::StripTags( $string );
            $string = htmlentities( $string );
            return addslashes( $string );
        }
    }
    
    protected function RemoveCharacterReturns( $string )
    {
        return preg_replace('/[\r\n]+/', ' ', $string);
    }

    public function Replicate()
    {
        $copiedObject = clone $this;
        $copiedObject->id = null;
        return $copiedObject;
    }

}
