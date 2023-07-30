<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Log;

class checkPriceOfDependendAttributes implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

         $validate = true;
        foreach ($value as $data)
        {
             if (count($this->request['priceDependentAttributesArray'])>0 )
                {
                    foreach ($this->request['priceDependentAttributesArray'] as $priceDependantArray){
                         if ($priceDependantArray['id'] == $data['id'] && $data['price'] == 0){
                                $validate = false;
                                break;
                        }
                        if ($validate == false)
                            break;
                    }
                 }
       }
        return $validate;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Price should be greater than zero. ';
    }
}
