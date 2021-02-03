<?php

/**
 * This file is part of FusionInvoice.
 *
 * (c) FusionInvoice, LLC <jessedterry@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FI\Support\PDF\Drivers;

use FI\Support\PDF\PDFAbstract;
use Spatie\Browsershot\Browsershot as Browsershot;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class puppeteer extends PDFAbstract
{
    protected $paperSize;

    protected $paperOrientation;

    private function getPdf(): Browsershot
    {
        return new Browsershot();
    }

    public function getOutput($html): string
    {
        $pdf = $this->getPdf();
        return $pdf->html($html)
            ->showBackground()
            ->margins(0, 0, 0, 0)
            ->landscape($this->paperOrientation === 'landscape')
            ->format($this->paperSize)
            ->emulateMedia('print')
            ->noSandbox()
            ->pdf();
    }

    public function download($html, $filename)
    {
        $response = response($this->getOutput($html));
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        return $response->send();
    }

    public function save($html, $filename)
    {
        $pdf = $this->getPdf();
        try {
            $pdf->html($html)
                ->showBackground()
                ->margins(0, 0, 0, 0)
                ->landscape($this->paperOrientation === 'landscape')
                ->format($this->paperSize)
                ->scale(1.0)
                ->emulateMedia('print')
                ->noSandbox()
                ->savePdf($filename);
        } catch (CouldNotTakeBrowsershot $e) {
        }
    }
}
