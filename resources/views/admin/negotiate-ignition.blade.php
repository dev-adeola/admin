@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Negotiation</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                Enlist For Negotiation
                <span class="float-right small">
                    <form action="{{ route('page.price.reference')}}" method="POST">
                        @csrf
                        <input type="text" class="form-controll form-controll-sm rounded" name="uuid" value="" placeholder="Reference UUID">
                        <button class="btn btn-sm btn-primary" type="submit">check</button>
                      </form>
                </span>
                
            </div>
              <div class="card-body p-0">
                <table class="table table-responsive-sm table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>UUID</th>
                      <th  class="text-center">ItemId</th>
                      <th  class="text-center">TickedId</th>
                      <th  class="text-center">Calculated weight</th>
                      <th  class="text-center">Price</th>
                      <th  class="text-center">Length </th>
                      <th  class="text-center">Width </th>
                      <th  class="text-center">Height</th>
                      <th  class="text-center">Distance</th>
                      <th  class="text-center">Reject</th>
                      <th  class="text-center">Status</th>
                      <th  class="text-center">Negotiated price</th>
                      <th class="text-center">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <form action="{{ route('page.price.adjust')}}"  method="POST">
                      @csrf
                      <input type="hidden" name="uuid" value="{{ $item['uuid'] }}">
                      <input type="hidden" name="itemId" value="{{ $item['itemId'] }}">
                        <tr>
                            <td>
                                {{ $item['uuid']}}
                            </td>
                            <td>
                                <div class="text-center">{{ $item['itemId']}}</div>
                            </td>
                            <td class="text-center">
                                {{ $item['tickedId']}}
                            </td>
                            <td class="text-center">
                                {{ $item['calculated_weight']}}
                            </td>
                            <td class="text-center">
                                {{ $item['price']}}
                            </td>
                            <td class="text-center">
                                {{ $item['length']}}
                            </td>
                            <td class="text-center">
                                {{ $item['width']}}
                            </td>
                            <td class="text-center">
                                {{ $item['height']}}
                            </td>
                            <td class="text-center">
                                {{ $item['distance']}}
                            </td>
                            <td class="text-center">
                                {{ $item['reject']}}
                            </td>
                            <td class="text-center">
                                {{ $item['status']}}
                            </td>
                            <td class="text-center">
                              <input type="text" name="negotiated_price"  value="{{ $item['negotiated_price']}}" class="form-controll form-controll-sm m-0 p-0">  
                            </td>
                            <td>
                              <div class="clearfix"> 
                                  <button class="btn btn-sm btn-primary float-right ml-3" type="submit">Edit Price</button>                                 
                              </div>
                            </td>
                        </tr>
                      </form>  
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
