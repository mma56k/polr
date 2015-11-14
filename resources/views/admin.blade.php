@extends('layouts.base')

@section('css')
<link rel='stylesheet' href='/css/admin.css' />
@endsection

@section('content')
<div class='col-md-3'>
    <ul class='nav nav-pills nav-stacked admin-nav' role='tablist'>
        <li role='presentation' aria-controls="home" class='admin-nav-item active'><a href='#home'>Home</a></li>
        <li role='presentation' aria-controls="links" class='admin-nav-item'><a href='#links'>Links</a></li>
        <li role='presentation' aria-controls="settings" class='admin-nav-item'><a href='#settings'>Settings</a></li>

        @if ($role == 'admin')
        <li role='presentation' class='admin-nav-item'><a href='#admin'>Admin</a></li>
        @endif
    </ul>
</div>
<div class='col-md-9'>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <h2>Welcome to your {{env('APP_NAME')}} dashboard!</h2>
            <p>Use the links on the left hand side to navigate your {{env('APP_NAME')}} dashboard.</p>
        </div>

        <div role="tabpanel" class="tab-pane" id="links">
            @include('snippets.link_table', [
                'links' => $user_links
            ])

            {!! $user_links->fragment('links')->render() !!}
        </div>

        <div role="tabpanel" class="tab-pane" id="settings">
            <form action='/admin/action/change_password' method='POST'>
                Old Password: <input class="form-control password-box" type='password' name='current_password' />
                New Password: <input class="form-control password-box" type='password' name='new_password' />
                <input type='submit' class='btn btn-success'/>
            </form>
        </div>

        @if ($role == 'admin')
        <div role="tabpanel" class="tab-pane" id="admin">
            @include('snippets.link_table', [
                'links' => $admin_links
            ])

            {!! $admin_links->fragment('admin')->render() !!}
        </div>
        @endif
    </div>
</div>


@endsection

@section('js')
<script src='/js/admin.js'></script>
@endsection
