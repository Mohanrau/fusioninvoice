<!doctype html>
<html>
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
          font-size: 14px;
      }

      .main-bg {
          background-color: #090a98;
      }

      .main-text {
          color: #090a98;
      }

      th.amount, td.amount {
          text-align: right !important;
      }

      a {
          color: inherit;
          text-decoration: none;
      }
  </style>
</head>
<body class="h-100">
<div class="bg-light h-100 col-4 position-fixed" style="z-index: -1"></div>
<div class="container-fluid h-100">
  <div class="row h-100">
    <div class="col-12">
      <div class="h-100 d-flex flex-column">
        <div class="row justify-content-between align-items-center pt-4 bg-white">
          <div class="col-7">
            {!! $quote->companyProfile->logo() !!}
          </div>
          <div class="col-5 border-start border-2">
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
        <div class="row justify-content-between align-items-end pt-5 bg-white">
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
            <div class="row mt-2">
              <div class="col-5">
                <span><strong>{{ mb_strtoupper(trans('fi.issued')) }}</strong></span><br>
                <span>{{ $quote->formatted_created_at }}</span>
              </div>
              <div class="col-1 border-start border-2"></div>
              <div class="col-5">
                <span><strong>{{ mb_strtoupper(trans('fi.due_date')) }}</strong></span><br>
                <span>{{ $quote->formatted_due_at }}</span>
              </div>
            </div>
          </div>
        </div>
        <div class="row flex-fill">
          <div class="col-4">
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
                  <div class="text-secondary"><strong>{{ mb_strtoupper(trans('fi.terms_and_conditions')) }}</strong>
                  </div>
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
                <table class="table table-bordered" style="margin-bottom: 0 !important;">
                  <thead class="table-light">
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
                  <tr class="main-bg text-white">
                    <td colspan="3" class="amount">{{ mb_strtoupper(trans('fi.total')) }}</td>
                    <td class="amount">{{ $quote->amount->formatted_total }}</td>
                  </tr>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12">
                <div>{!! $quote->formatted_footer !!}</div>
              </div>
              <div class="col-12">
                <div class="main-text h5 text-uppercase">Thank You <br>For Your Business</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
