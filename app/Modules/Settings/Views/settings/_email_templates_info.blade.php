What are email templates?
Email templates allow customization of email sent from FusionInvoice. The templates are located in System Settings on the Email tab and can contain HTML and a number of dynamic variables which will be replaced with the appropriate values when the email is sent.

Quote Email Template
The variables listed below can be used in the following fields in System Settings on the Email tab:

Quote Email Subject
Default Quote Email Body
Quote Approved Email Body
Quote Rejected Email Body
Quote Information
Issue Date: {{ $quote->formatted_created_at }}
Expiration Date: {{ $quote->formatted_expires_at }}
Number: {{ $quote->number }}
Status: {{ $quote->status_text }}
Summary: {{ $quote->summary }}
Public URL: {{ $quote->public_url }}
Terms: {{ $quote->formatted_terms }}
Footer: {{ $quote->formatted_footer }}
Total Amount: {{ $quote->amount->formatted_total }}
Client Information
Name: {{ $quote->client->name }}
Address: {{ $quote->client->formatted_address }}
Phone: {{ $quote->client->phone }}
Fax: {{ $quote->client->fax }}
Mobile: {{ $quote->client->mobile }}
Email: {{ $quote->client->email }}
Website: {{ $quote->client->web }}
User Account Information
Name: {{ $quote->user->name }}
Company: {{ $quote->companyProfile->company }}
Address: {{ $quote->user->formatted_address }}
Phone: {{ $quote->user->phone }}
Fax: {{ $quote->user->fax }}
Mobile: {{ $quote->user->mobile }}
Website: {{ $quote->user->web }}
Example Subject:

Quote #{{ $quote->number }}

Example Body:

<p>To view your quote from {{ $quote->user->name }} for {{ $quote->amount->formatted_total }}, click the link below:</p>

<p><a href="{{ $quote->public_url }}">{{ $quote->public_url }}</a></p>
Invoice Email Template
The variables listed below can be used in the following fields in System Settings on the Email tab:

Invoice Email Subject
Default Invoice Email Body
Overdue Email Subject
Default Overdue Invoice Email Body
Upcoming Payment Notice Email Subject
Upcoming Payment Notice Email Body
Invoice Information
Issue Date: {{ $invoice->formatted_created_at }}
Due Date: {{ $invoice->formatted_due_at }}
Number: {{ $invoice->number }}
Status: {{ $invoice->status_text }}
Summary: {{ $invoice->summary }}
Public URL: {{ $invoice->public_url }}
Terms: {{ $invoice->formatted_terms }}
Footer: {{ $invoice->formatted_footer }}
Total Amount: {{ $invoice->amount->formatted_total }}
Amount Paid: {{ $invoice->amount->formatted_paid }}
Balance: {{ $invoice->amount->formatted_balance }}
Client Information
Name: {{ $invoice->client->name }}
Address: {{ $invoice->client->formatted_address }}
Phone: {{ $invoice->client->phone }}
Fax: {{ $invoice->client->fax }}
Mobile: {{ $invoice->client->mobile }}
Email: {{ $invoice->client->email }}
Website: {{ $invoice->client->web }}
User Account Information
Name: {{ $invoice->user->name }}
Company: {{ $invoice->companyProfile->company }}
Address: {{ $invoice->user->formatted_address }}
Phone: {{ $invoice->user->phone }}
Fax: {{ $invoice->user->fax }}
Mobile: {{ $invoice->user->mobile }}
Website: {{ $invoice->user->web }}
Example Subject:

Invoice #{{ $invoice->number }}

Example Body:

<p>To view your invoice from {{ $invoice->user->name }} for {{ $invoice->amount->formatted_total }}, click the link below:</p>

<p><a href="{{ $invoice->public_url }}">{{ $invoice->public_url }}</a></p>

<p>{{ $invoice->user->formatted_address }}</p>
Payment Receipt Email Template
The variables listed below can be used in the following fields in System Settings on the Email tab:

Payment Receipt Email Subject
Default Payment Receipt Body
Payment Information
Payment Date: {{ $payment->formatted_paid_at }}
Payment Amount: {{ $payment->formatted_amount }}
Payment Note: {{ $payment->formatted_note }}
Payment Method: {{ $payment->paymentMethod->name }}
Invoice Information
Issue Date: {{ $payment->invoice->formatted_created_at }}
Due Date: {{ $payment->invoice->formatted_due_at }}
Number: {{ $payment->invoice->number }}
Status: {{ $payment->invoice->status_text }}
Summary: {{ $payment->invoice->summary }}
Public URL: {{ $payment->invoice->public_url }}
Terms: {{ $payment->invoice->formatted_terms }}
Footer: {{ $payment->invoice->formatted_footer }}
Total Amount: {{ $payment->invoice->amount->formatted_total }}
Amount Paid: {{ $payment->invoice->amount->formatted_paid }}
Balance: {{ $payment->invoice->amount->formatted_balance }}
Client Information
Name: {{ $payment->invoice->client->name }}
Address: {{ $payment->invoice->client->formatted_address }}
Phone: {{ $payment->invoice->client->phone }}
Fax: {{ $payment->invoice->client->fax }}
Mobile: {{ $payment->invoice->client->mobile }}
Email: {{ $payment->invoice->client->email }}
Website: {{ $payment->invoice->client->web }}
User Account Information
Name: {{ $payment->invoice->user->name }}
Company: {{ $payment->invoice->companyProfile->company }}
Address: {{ $payment->invoice->user->formatted_address }}
Phone: {{ $payment->invoice->user->phone }}
Fax: {{ $payment->invoice->user->fax }}
Mobile: {{ $payment->invoice->user->mobile }}
Website: {{ $payment->invoice->user->web }}
Example Subject:

Payment Receipt for Invoice #{{ $payment->invoice->number }}

Example Body:

<p>Thank you! Your payment of {{ $payment->formatted_amount }} has been applied to Invoice #{{ $payment->invoice->number }}.</p>
