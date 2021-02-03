<!doctype html>
<html class="h-100">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ trans('fi.quote') }} #{{ $quote->number }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <style>
      html {
          -webkit-print-color-adjust: exact;
      }

      body {
          background-repeat: no-repeat;
          background-position: bottom;
          -webkit-background-size: contain;
          -moz-background-size: contain;
          -o-background-size: contain;
          background-size: contain;
          background-image: url("https://cdn2106.s3-ap-southeast-1.amazonaws.com/type-two-footer-bg.png");
          font-size: 12px;
      }

      a {
          color: inherit;
          text-decoration: none;
      }

      .main-bg {
          background-color: #009bd5 !important;
      }

      .main-text {
          color: #009bd5 !important;
      }

      .page-break {
          page-break-after: always; /* depreciating, use break-after */
          break-after: page;
          height: 0px;
          display: block !important;
      }
  </style>
</head>
<body class="h-100">
<div class="container-fluid h-100">
  <div class="row h-100" style="margin: 0 15px 0 15px">
    <div class="col-12">
      <div class="h-100">
        <div class="row justify-content-between align-items-start pt-2">
          <div class="col-8">
            {!! $quote->companyProfile->logo() !!}
          </div>
          <div class="col-4">
            @if ($quote->companyProfile->phone) Phone: {{ $quote->companyProfile->phone }}<br>@endif
            @if ($quote->user->email) Email: <a href="mailto:{{ $quote->user->email }}">{{ $quote->user->email
              }}</a>@endif
          </div>
        </div>
        <div class="row justify-content-between align-items-start pt-4">
          <div class="col-8">
            <h2 class="display-6 main-text">{{ mb_strtoupper(trans('fi.quote')) }}</h2>
            {!! $quote->companyProfile->formatted_address !!}<br>
          </div>
          <div class="col-4">
            <div class="mb-0"><strong>{{ $quote->client->name }}</strong><br>
              @if ($quote->client->address) {!! $quote->client->formatted_address !!}<br>@endif
            </div>
            <br>
            <table>
              <tr>
                <td class="main-text">{{ mb_strtoupper(trans('fi.quote')) }}</td>
                <td>#</td>
                <td>{{ $quote->number }}</td>
              </tr>
              <tr>
                <td class="main-text">{{ mb_strtoupper(trans('fi.issued')) }}</td>
                <td>:</td>
                <td>{{ $quote->formatted_created_at }}</td>
              </tr>
              <tr>
                <td class="main-text">{{ mb_strtoupper(trans('fi.expires')) }}</td>
                <td>:</td>
                <td>{{ $quote->formatted_expires_at }}</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row justify-content-between">
          <div class="col-12">
            <table id="items" class="table table-striped" style="margin-bottom: 0 !important;">
              <thead class="text-white text-center">
              <tr>
                <th class="main-bg">{{ mb_strtoupper(trans('fi.description')) }}</th>
                <th class="amount" style="background-color: #0070b4">{{ mb_strtoupper(trans('fi.quantity')) }}</th>
                <th class="main-bg amount">{{ mb_strtoupper(trans('fi.price')) }}</th>
                <th class="amount" style="background-color: #0070b4">{{ mb_strtoupper(trans('fi.total')) }}</th>
              </tr>
              </thead>
              <tbody class="text-center">
              @foreach ($quote->items as $item)
              <tr>
                <td style="text-align: left !important;">
                  <span><strong>{!! $item->name !!}</strong></span><br>
                  {!! $item->formatted_description !!}
                </td>
                <td nowrap style="background-color: rgba(0,0,0, 0.1)">{{ $item->formatted_quantity }}</td>
                <td nowrap>{{ $item->formatted_price }}</td>
                <td nowrap style="background-color: rgba(0,0,0, 0.1)">{{ $item->amount->formatted_subtotal }}</td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @if (count($quote->items) > 5)
          <div class="page-break"></div>
        @endif
        <div class="row justify-content-between" style="margin-bottom: 300px">
          <div class="col-7">
            @if ($quote->terms)
            <div class="pt-1">
              <div class="text-secondary"><strong>{{ mb_strtoupper(trans('fi.terms_and_conditions')) }}</strong>
              </div>
              <br>
              <p class="text-left text-wrap" style="font-size: 10px">{!! $quote->formatted_terms !!}</p>
            </div>
            @endif
          </div>
          <div class="col-4">
            <table class="table table-borderless table-sm">
              <tbody>
              <tr style="text-align: right">
                <td class="pe-3">{{ mb_strtoupper(trans('fi.subtotal')) }}</td>
                <td class="bg-light">{{ $quote->amount->formatted_subtotal }}</td>
              </tr>
              @if ($quote->discount > 0)
              <tr style="text-align: right">
                <td class="pe-3">{{ mb_strtoupper(trans('fi.discount')) }}</td>
                <td class="bg-light">{{ $quote->amount->formatted_discount }}</td>
              </tr>
              @endif
              @foreach ($quote->summarized_taxes as $tax)
              <tr style="text-align: right">
                <td class="pe-3">{{ mb_strtoupper($tax->name) }} ({{ $tax->percent }})</td>
                <td class="bg-light">{{ $tax->total }}</td>
              </tr>
              @endforeach
              <tr style="text-align: right">
                <td class="bg-light pe-3">{{ mb_strtoupper(trans('fi.total')) }}</td>
                <td class="main-bg text-white">{{ $quote->amount->formatted_total }}</td>
              </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12">
            {!! $quote->formatted_footer !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
