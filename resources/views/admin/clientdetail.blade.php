@extends(backpack_view('blank'))
@section('content')
<div class="jumbotron">
    <h1 class="mb-4">{{ $user['name']}}</h1>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">User Details
                    <label class="switch switch-sm switch-text switch-info float-right mb-0">
                        <input class="switch-input" type="checkbox"><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span>
                    </label>
                </div>
                <div class="card-body">
                    {{ $user['name']}}
                    <br>
                    {{ $user['email']}}
                    <br>
                    {{ $user['status']}}
                    <br>
                    {{ $user['actions']}}
                    <br>
                    {{ $user['is_verified'] == 1 ? 'Verified' : 'Not verified'}}
                    <br>
                    {{ $user['active'] == 1 ? 'Active' : 'Not active'}}
                    <br>
                    {{ $user['block'] == 1 ? 'Blocked' : 'Not blocked'}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">Profile
                    <label class="switch switch-sm switch-text switch-info float-right mb-0">
                        <input class="switch-input" type="checkbox"><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span>
                    </label>
                </div>
                <div class="card-body">
                    @if ($profile == null)
                        {{ __('Profile not created yet')}}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">Account
                    <label class="switch switch-sm switch-text switch-info float-right mb-0">
                        <input class="switch-input" type="checkbox"><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span>
                    </label>
                </div>
                <div class="card-body">
                    @if($wallet == null)
                    {{ __('wallet details not created yet')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ $user['name']}}</strong> | activities
                    <label class="switch switch-sm switch-text switch-info float-right mb-0">
                        <input class="switch-input" type="checkbox"><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span>
                    </label>
                </div>
                <div class="card-body">
                    {{ __('Not Found')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
