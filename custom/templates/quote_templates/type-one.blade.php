<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>{{ trans('fi.quote') }} #{{ $quote->number }}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
      html {
          height: 100%;
      }

      body {
          margin: 0 0 50px 0;
          height: 100%;
      }

      .main-bg {
          background-color: #090a98;
      }

      .main-text {
          color: #090a98;
      }

      td {
          border-width: 3px !important;
      }

      th.amount, td.amount {
          text-align: right !important;
      }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row justify-content-between align-items-center mt-4">
    <div class="col-md-7 pl-5">
      {!! $quote->companyProfile->logo() !!}
    </div>
    <div class="col-md-5 border-left border-light" style="border-left-width: 3px !important;">
      <div class="pl-5">
        <span class="main-text">
          <strong>{{ $quote->companyProfile->company }}</strong><br>
        </span>
        {!! $quote->companyProfile->formatted_address !!}<br>
        @if ($quote->companyProfile->phone) {{ $quote->companyProfile->phone }}<br>@endif
        @if ($quote->user->email) <a href="mailto:{{ $quote->user->email }}">{{ $quote->user->email }}</a>@endif
      </div>
    </div>
  </div>
  <div class="row mt-5 justify-content-between align-items-end">
    <div class="col-7">
      <div class="row h-100 align-items-center">
        <div class="col-10 main-bg">
          <h2 class="display-4 text-white ml-4">{{ mb_strtoupper(trans('fi.quote')) }}</h2>
        </div>
      </div>
    </div>
    <div class="col-5 small">
      <div class="row pl-5 mt-2">
        <div class="col-12">
          <span><strong>{{ mb_strtoupper(trans('fi.quote')) }}</strong></span><br>
          <span>{{ $quote->number }}</span>
        </div>
      </div>
      <div class="row pl-5 mt-2">
        <div class="col-5">
          <span><strong>{{ mb_strtoupper(trans('fi.issued')) }}</strong></span><br>
          <span>{{ $quote->formatted_created_at }}</span>
        </div>
        <div class="col-1 border-left border-light" style="border-width: 3px !important;"></div>
        <div class="col-5">
          <span><strong>{{ mb_strtoupper(trans('fi.due_date')) }}</strong></span><br>
          <span>{{ $quote->formatted_due_at }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="row h-100">
    <div class="col-4 bg-light">
      <div class="row">
        <div class="col-12 mt-5 ml-3">
          <div class="text-secondary"><strong>TO</strong></div>
          <br>
          <div class="mb-0"><strong>{{ $quote->client->name }}</strong><br>
            @if ($quote->client->address) {!! $quote->client->formatted_address !!}<br>@endif
          </div>
          <br>
          @if ($quote->terms)
          <div class="mt-5">
            <div class="text-secondary"><strong>{{ mb_strtoupper(trans('fi.terms_and_conditions')) }}</strong></div>
            <br>
            <p class="text-left text-wrap">{!! $quote->formatted_terms !!}</p>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-8 mt-5">
      <div class="row">
        <div class="col-12">
          <table class="table" style="margin-bottom: 0 !important;">
            <thead class="thead-light">
            <tr>
              <th>{{ mb_strtoupper(trans('fi.description')) }}</th>
              <th class="amount">{{ mb_strtoupper(trans('fi.quantity')) }}</th>
              <th class="amount">{{ mb_strtoupper(trans('fi.price')) }}</th>
              <th class="amount">{{ mb_strtoupper(trans('fi.total')) }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($quote->items as $item)
            <tr>
              <td>
                <span><strong>{!! $item->name !!}</strong></span><br>
                {!! $item->formatted_description !!}
              </td>
              <td nowrap class="amount">{{ $item->formatted_quantity }}</td>
              <td nowrap class="amount">{{ $item->formatted_price }}</td>
              <td nowrap class="amount">{{ $item->amount->formatted_subtotal }}</td>
            </tr>
            @endforeach

            <tr>
              <td colspan="3" class="amount">{{ mb_strtoupper(trans('fi.subtotal')) }}</td>
              <td class="amount">{{ $quote->amount->formatted_subtotal }}</td>
            </tr>

            @if ($quote->discount > 0)
            <tr>
              <td colspan="3" class="amount">{{ mb_strtoupper(trans('fi.discount')) }}</td>
              <td class="amount">{{ $quote->amount->formatted_discount }}</td>
            </tr>
            @endif

            @foreach ($quote->summarized_taxes as $tax)
            <tr>
              <td colspan="3" class="amount">{{ mb_strtoupper($tax->name) }} ({{ $tax->percent }})</td>
              <td class="amount">{{ $tax->total }}</td>
            </tr>
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row justify-content-end pr-3 text-white h6">
            <div class="col-3 p-2 main-bg">{{ mb_strtoupper(trans('fi.total')) }}</div>
            <div class="col-auto p-2 main-bg">{{ $quote->amount->formatted_total }}</div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <div>{!! $quote->formatted_footer !!}</div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <div class="main-text h5 text-uppercase">Thank You <br>For Your Business</div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
