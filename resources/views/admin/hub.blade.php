@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Hub</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">List of Shipment</div>
              <div class="card-body p-0">
                <table class="table table-responsive-sm table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Invoice</th>
                      <th  class="text-center">Tracking</th>
                      <th  class="text-center">itemId</th>
                      <th  class="text-center">Sender name</th>
                      <th  class="text-center">From</th>
                      <th  class="text-center"> To </th>
                      <th  class="text-center"> Percel </th>
                      <th  class="text-center">Status</th>
                      <th  class="text-center">Async</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $item['invoice_id']}}
                            </td>
                            <td>
                                <div class="text-center">{{ $item['tracking_id']}}</div>
                            </td>
                            <td class="text-center">
                                {{ $item['itemId']}}
                            </td>
                            <td class="text-center">
                                {{ $item['sender_name']}}
                            </td>
                            <td class="text-center">
                                {{ $item['from_address']}}
                            </td>
                            <td class="text-center">
                                {{ $item['to_address']}}
                            </td>
                            <td class="text-center">
                                {{ $item['percel']}}
                            </td>
                            <td class="text-center">
                                {{ $item['status']}}
                            </td>
                            <td class="text-center">
                                {{ $item['async']}}
                            </td>
                            
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection