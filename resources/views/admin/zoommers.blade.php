@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Zoommers</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Zoommers</div>
              <div class="card-body p-0">
                <table class="table table-responsive-sm table-striped mb-0">
                  <thead class="thead-light">
                    <tr>
                      <th>Name</th>
                      <th class="text-center">Email | <span class="font-weight-light">History</span></th>
                      <th>Verify</th>
                      <th>Active</th>
                      <th>Block</th>
                      <th class="text-center"> Status </th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>
                        <div class="small text-muted">{{ $item['name']}}</div>
                      </td>
                      <td class="text-center">
                        <a href="{{ url('admin/zoommerdetail', ['uuid' => $item['uuid']]) }}">{{ $item['email']}}</a>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-left"><strong>{{ $item['is_verified'] == 0 ? 'Not Verified': 'Verified' }}</strong></div>
                        </div>

                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-left"><strong>{{ $item['active'] == 0 ? 'Not Activated': 'Activated' }}</strong></div>
                          <div class="float-right"><small class="text-muted">@:{{  date('h:i:s', strtotime($item['email_verified_at']))}}</small></div>
                        </div>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-left"><strong>{{ $item['block'] == 0 ? 'Active': 'Blocked' }}</strong></div> 
                        </div>
                        
                      </td>
                      <td class="text-center">
                        {{ $item['category']}}
                      </td>
                      <td>
                        <div class="small text-muted">{{  date('d-m-Y', strtotime($item['created_at']))}}</strong>
                      </td>
                      <td>
                        <div class="clearfix">
                          <div class="float-left mr-2">
                            <strong>
                              <form action="{{ route('page.zoommers.blockZoommers')}}" method="POST">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $item['uuid'] }}">
                                <button class="btn btn-block btn-primary" type="submit">Block</button>
                              </form>
                            </strong>
                          </div>
                          <div class="float-left mr-2">
                            <strong>
                              <form action="{{ route('page.zoommers.unblockZoommers')}}" method="POST">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $item['uuid'] }}">
                                <button class="btn btn-block btn-primary" type="submit">Unblock</button>
                              </form>
                            </strong>
                          </div>
                          <div class="float-left mr-2">
                            <strong>
                              <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $item['uuid'] }}">
                                <button class="btn btn-block btn-primary" type="button">Notify</button>
                              </form>
                            </strong>
                          </div>
                          <div class="float-left mr-2">
                            <strong>
                              <form action="{{ route('page.zoommers.activateZoommers')}}" method="POST">
                                @csrf
                                <input type="hidden" name="uuid" value="{{ $item['uuid'] }}">
                                <button class="btn btn-block btn-primary" type="submit">Activate</button>
                              </form>
                            </strong>
                          </div>
                        </div>
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