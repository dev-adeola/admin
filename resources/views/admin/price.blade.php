@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Price</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">List of Shipment <a href="{{ url('admin/negotiation')}}" class="btn btn-sm btn-primary float-right" type="submit">Negotiation</a></div>
              <div class="card-body p-0">
                <table class="table table-responsive-sm table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Min weight</th>
                      <th  class="text-center">Min price</th>
                      <th  class="text-center">Distance</th>
                      <th  class="text-center">Medium weight</th>
                      <th  class="text-center">Medium price</th>
                      <th  class="text-center"> Max weight </th>
                      <th  class="text-center"> Max price </th>
                      <th  class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $item['min_weight']}}
                            </td>
                            <td>
                                <div class="text-center">
                                    {{ $item['min_price']}}
                                </div>
                            </td>
                            <td class="text-center">
                                {{ $item['distance']}}
                            </td>
                            <td class="text-center">
                                {{ $item['medium_weight']}}
                            </td>
                            <td class="text-center">
                                {{ $item['medium_price']}}
                            </td>
                            <td class="text-center">
                                {{ $item['max_weight']}}
                            </td>
                            <td class="text-center">
                                {{ $item['max_price']}}
                            </td>                           
                        </tr>
                        <hr>
                        <tr>
                            <form action="{{ route('page.price.edit-price')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                            <td>
                                <input class="form-control" name="min_weight" type="text" value="{{ $item['min_weight']}}" placeholder="Enter your name">
                                
                            </td>
                            <td>
                                <div class="text-center">
                                    <input class="form-control" name="min_price" type="text" value="{{ $item['min_price']}}" placeholder="Enter your name">
                                </div>
                            </td>
                            <td class="text-center">
                                <input class="form-control" name="distance" type="text" value="{{ $item['distance']}}" placeholder="Enter your name">
                            </td>
                            <td class="text-center">
                                <input class="form-control" name="medium_weight" type="text" value="{{ $item['medium_weight']}}" placeholder="Enter your name">
                            </td>
                            <td class="text-center">
                                <input class="form-control" name="medium_price" type="text" value="{{ $item['medium_price']}}" placeholder="Enter your name">
                            </td>
                            <td class="text-center">
                                <input class="form-control" name="max_weight" type="text" value="{{ $item['max_weight']}}" placeholder="Enter your name">
                            </td>
                            <td class="text-center">
                                <input class="form-control" name="max_price" type="text" value="{{ $item['max_price']}}" placeholder="Enter your name">
                            </td> 
                            <td>
                                <div class="clearfix">
                                  <div class="mr-2">
                                    <strong>
                                        <button class="btn btn-block btn-primary" type="submit">Edit</button>
                                    </strong>
                                  </div>
                                </div>
                              </td> 
                            </form>                           
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