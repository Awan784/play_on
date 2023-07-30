<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkQuantityDependendAttributes implements Rule
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
        foreach ($value as $data){

            if (count($this->request['quantityDependentAttributesArray'])>0)
            {
                foreach ($this->request['quantityDependentAttributesArray'] as $quantityDependantArray){
                    if ($quantityDependantArray['id'] == $data['id'] && $data['quantity'] == 0){
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
        return 'Quantity should be greater than zero.';
    }
}
