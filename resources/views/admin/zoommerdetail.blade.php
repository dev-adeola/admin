@extends(backpack_view('blank'))
@section('content')
<div class="jumbotron">
    <h1 class="mb-4">@ {{ $user['username']}}</h1>
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card">
                <div class="card-header">User Details
                    <label class="switch switch-sm switch-text switch-info float-right mb-0">
                        <input class="switch-input" type="checkbox"><span class="switch-label" data-on="On" data-off="Off"></span><span class="switch-handle"></span>
                    </label>
                </div>
                <div class="card-body">
                    {{ __('Name: ')}} {{ $user['name']}}
                    <br>
                    {{ __('email: ')}} {{ $user['email']}}
                    <br>
                    {{ __('category: ')}} {{ $user['category']}}
                    <br>
                    {{ __('verified: ')}} {{ $user['is_verified'] == 1 ? 'Verified' : 'Not verified'}}
                    <br>
                    {{ __('active: ')}} {{ $user['active'] == 1 ? 'Active' : 'Not active'}}
                    <br>
                    {{ __('block: ')}} {{ $user['block'] == 1 ? 'Blocked' : 'Not blocked'}}
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
                    @else
                        {{ __('firstname: ')}} {{ $profile['firstname']}}
                        <br>
                        {{ __('lastname: ')}} {{ $profile['lastname']}}
                        <br>
                        {{ __('phone: ')}} {{ $profile['phone']}}
                        <br>
                        {{ __('image_url: ')}} {{ $profile['image_url']}}
                        
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
                    @if($account == null)
                    {{ __('wallet details not created yet')}}
                    @else
                        {{ __('net_balance: ')}}{{ $account['net_balance']}}
                        <br>
                        {{ __('income: ')}}{{ $account['income']}}
                        <br>
                        {{ __('available_balance: ')}}{{ $account['available_balance']}}
                        <br>
                        {{ __('withdrawal: ')}}{{ $account['withdrawal']}}
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header"><strong>{{ $user['username']}}</strong> | activities
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
