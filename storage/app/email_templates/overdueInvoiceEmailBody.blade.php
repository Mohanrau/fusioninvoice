<p>This is a reminder to let you know your invoice from {!! $invoice->user->name !!} for {!! $invoice->amount->formatted_total !!} is overdue. Click the link below to view the invoice:</p>

<p><a href="{!! $invoice->public_url !!}">{!! $invoice->public_url !!}</a></p>