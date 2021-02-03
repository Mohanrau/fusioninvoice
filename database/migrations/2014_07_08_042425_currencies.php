<?php

use FI\Modules\Currencies\Models\Currency;
use FI\Modules\Settings\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Currencies extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('code');
            $table->string('name');
            $table->string('symbol');
            $table->string('placement');
            $table->string('decimal');
            $table->string('thousands');

            $table->index('name');
        });

        Schema::table('clients', function (Blueprint $table)
        {
            $table->string('currency_code')->nullable();
        });

        Schema::table('invoices', function (Blueprint $table)
        {
            $table->string('currency_code')->nullable();
            $table->decimal('exchange_rate', 10, 7)->default('1');
        });

        Schema::table('quotes', function (Blueprint $table)
        {
            $table->string('currency_code')->nullable();
            $table->decimal('exchange_rate', 10, 7)->default('1');
        });

        Currency::create(['name' => 'Malaysian Ringgit', 'code' => 'MYR', 'symbol' => 'RM', 'placement' => 'before', 'decimal' => '.', 'thousands' => ',']);

        Setting::saveByKey('baseCurrency', 'MYR');
        Setting::saveByKey('exchangeRateMode', 'automatic');
    }

    public function down()
    {
        //
    }
}
