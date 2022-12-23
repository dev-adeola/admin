@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Account</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-3 p-3">
                <div class="col-md-3">
                    <button class="btn btn-pill btn-primary mt-2" type="submit">Users Count :: <span class="ml-5 float-right">{{ $dataSet['users'] }}</span></button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-pill btn-primary mt-2" type="submit">Zoommers :: <span class="ml-5 float-right">{{ $dataSet['zoommers'] }}</span></button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-pill btn-primary float-right mt-2" type="submit">Prepare Statement</button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-pill btn-primary float-right mt-2" type="submit">Mass Payout</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ENV('APP_NAME')}}</strong><small class="float-right"><strong>Networth</strong> | NGN 500:00</small></div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped mb-0 bg-white">
                        <thead class="thead-white">
                          <tr>
                            <th>Opening <span class="font-weight-light">Balance</span></th>
                            <th class="text-center">Debit </th>
                            <th>Credit</th>
                            <th>Pending |<span class="font-weight-light">Paystack</span> </th>
                            <th>Paid Out</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                  <div class="text-muted">{{ $balance->opening_balance}} : 00</div>
                                </td>
                                <td class="text-center">
                                    <div class="small text-muted">{{ $balance->debit}} : 00</div>
                                </td>
                                <td>
                                  <div class="clearfix">
                                    <div class="float-left"><strong>{{ $balance->credit}} : 00</strong></div>
                                  </div>
                                </td>
                                <td>
                                  <div class="clearfix">
                                    <div class="float-left"><strong>{{ $balance->pending_balance}} : 00</strong></div>
                                    <div class="float-right"><small class="text-muted">@:{{ now()}} : 00</small></div>
                                  </div>
                                </td>
                                <td>
                                  <div class="clearfix">
                                    <div class="float-left"><strong>{{ $balance->paid_out}} : 00</strong></div> 
                                  </div>
                                </td>
                                <td>
                                    <div class="clearfix">
                                      <div class="float-left"><strong>{{ $balance->created_at}} </strong></div> 
                                    </div>
                                  </td>
                              </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <h5 class="mb-4">Account</h5>
            <hr>
            <table class="table table-responsive-sm table-striped bg-white mb-0">
                <thead class="thead-light">
                  <tr>
                    <th>Amount</th>
                    <th class="text-center">Sender | <span class="font-weight-light">Name</span></th>
                    <th>Purpose</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($trans as $item)
                  <tr>
                    <td>
                      <div class="small text-muted">{{ $item['amount']}}</div>
                    </td>
                    <td class="text-center">
                      <div class="small text-muted">{{ $item['sender_name']}}</div>
                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left"><strong>{{ $item['purpose'] }}</strong></div>
                      </div>

                    </td>
                    <td>
                      <div class="clearfix">
                        <div class="float-left"><strong>{{ $item['created_at']  }}</strong></div>
                        <div class="float-right"><small class="text-muted">@:{{  date('h:i:s', strtotime($item['created_at']))}}</small></div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection