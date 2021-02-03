<?php

use FI\Modules\Settings\Models\Setting;
use Illuminate\Database\Migrations\Migration;

class PdfDriver extends Migration
{
    public function up()
    {
        Setting::saveByKey('pdfDriver', 'puppeteer');
    }

    public function down()
    {
        //
    }
}
