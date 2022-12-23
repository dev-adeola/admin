@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Courier</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">List of Shipment</div>
              <div class="card-body p-0">
                <table class="table table-responsive-sm table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Invoice</th>
                      <th  class="text-center">itemId</th>
                      <th  class="text-center"> Progress </th>
                      <th  class="text-center">Rider</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $item['invoice_id']}}
                            </td>
                            <td class="text-center">
                                {{ $item['itemId']}}
                            </td>
                            <td class="text-center">
                                {{ $item['progress_bar']}}
                            </td>
                            <td class="text-center">
                                {{ $item['uuid']}}
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