<p>To view your invoice from {!! $invoice->user->name !!} for {!! $invoice->amount->formatted_total !!}, click the link below:</p>

<p><a href="{!! $invoice->public_url !!}">{!! $invoice->public_url !!}</a></p>