@extends('user.master')

@section('noidung')
<div class="container content">
    <div class="row">
        <div class="col-sm-9">
            <div class="card" style="margin-top: 20px;">
                <div class="category-title" style="margin-bottom: 20px;">
                    <div class="right-title">
                        <h2>{{ __('Đặt Lại Mật Khẩu') }}</h2>
                    </div>
                    <div style="border-bottom: 25px solid white;border-left: 20px solid transparent;height: auto;overflow: auto;"></div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul style="padding: 0;">
                                    @foreach($errors->all() as $error)
                                        <li style="list-style: none;">{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('Địa Chỉ Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Mật Khẩu') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Mật Khẩu Xác Nhận') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Khôi Phục Mật Khẩu') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            @include('user.aside')
        </div>
    </div>
</div>
@endsection
