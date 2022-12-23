@extends(backpack_view('blank'))

@section('content')
<div class="jumbotron">
    <h1 class="mb-4">Notification</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>{{ENV('APP_NAME')}}</strong><small>Notify</small></div>
                <div class="card-body">
                    <form action="{{ route('page.notification.notify')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="company">Subject</label>
                            <input class="form-control" name="subject" type="text" placeholder="Enter your company name">
                        </div>
                        <div class="form-group">
                            <label for="company"><strong>Optional</strong> | uuid*</label>
                            <input class="form-control" name="uuid" type="text" placeholder="Enter your company name">
                        </div>
                        <div class="form-group">
                            <label for="textarea-input">Message</label>
                            <textarea class="form-control" name="message" rows="9" placeholder="Content.."></textarea>
                        </div>
                        <div class="row">
                            
                            <div class="form-group col-sm-4">
                            <label for="postal-code">Date</label>
                            <input class="form-control" name="date" type="date" placeholder="Postal Code">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="postal-code">Group individuals</label>
                                <select class="form-control" name="category">
                                    <option value="users">Users</option>
                                    <option value="single-user">Single User</option>
                                    <option value="zoommers">Zoommers</option>
                                    <option value="single-zoommer">Single Zoommers</option>
                                    <option value="collections">Collectors</option>
                                    <option value="single-collection">Sigle Collector</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="postal-code">Message importance</label>
                                <select class="form-control" name="importance">
                                    <option value="Important">Important</option>
                                    <option value="Prioritize">Prioritize</option>
                                    <option value="Announcement">Announcement</option>
                                    <option value="Notice">Notice</option>
                                    <option value="Warning">Warning</option>
                                    <option value="Blocked">Blocked</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-pill btn-primary float-right mb-3 mt-2" type="submit">Dispatch Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 m-0 p-3">
            <h4>Message Sent</h4>
            <div class="list-group">
                 @php($j = 1)
                @foreach ($data as $item)
                    <a class="list-group-item list-group-item-action flex-column align-items-start {{ $j == 1 ? 'active' : ''}}" href="#">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $item->subject}}</h5><small> {{  date('h:i:s', strtotime($item->created_at))}}</small>
                        </div>
                        <p class="mb-1">{{$item->message}}</p><small>{{$item->category}}</small>
                  </a>
                  @php($j++)
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection