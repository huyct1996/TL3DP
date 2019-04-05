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

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Địa Chỉ Email :') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Gửi Link Khôi Phục') }}
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
