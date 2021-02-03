<?php

use FI\Modules\PaymentMethods\Models\PaymentMethod;
use Illuminate\Database\Migrations\Migration;

class PaymentMethods extends Migration
{
    public function up()
    {
        // If this is a new install, no payment methods will exist, so let's
        // create some.

        if (PaymentMethod::count() == 0)
        {
            PaymentMethod::create(['name' => trans('fi.cash')]);
        }
    }

    public function down()
    {
        //
    }
}
