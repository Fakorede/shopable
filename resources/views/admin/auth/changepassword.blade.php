@extends('admin.layout')

@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Shopable</a>
        <a class="breadcrumb-item" href="{{ route('admin.home') }}">Dashboard</a>
        <span class="breadcrumb-item active">{{ __('Change Password') }}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row row-sm mg-t-20">
            <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">{{ __('Change Your Password') }}</h6>
                <p class="mg-b-20 mg-sm-b-30">You would need to re-login after a password change.</p>

                <form method="POST" action="{{ route('admin.password.update') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <div class="row">
                        <label for="oldpass" class="col-sm-4 form-control-label">{{ __('Old Password') }}: <span class="tx-danger">*</span></label>

                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus placeholder="Enter your Old Password">

                            @if ($errors->has('oldpass'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('oldpass') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label for="password" class="col-sm-4 form-control-label">{{ __('New Password') }}: <span class="tx-danger">*</span></label>

                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Your New Password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label for="password-confirm" class="col-sm-4 form-control-label">{{ __('Confirm Password') }}: <span class="tx-danger">*</span></label>

                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm New Password">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30">
                        <button type="submit" class="btn btn-info mg-r-5">{{ __('Change Password') }}</button>
                    </div>

                </form>

            </div><!-- card -->
            </div><!-- col-6 -->
        </div>
    </div>
</div>
@endsection
