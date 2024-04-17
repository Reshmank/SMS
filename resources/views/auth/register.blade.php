@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div  style="text-align: center;"><b>ABC BANK</b></div>
             
            <div class="card">
               
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="terms" id="terms">

                                    <label class="form-check-label" for="remember">
                                        Agree the terms and policy
                                    </label>
                                </div>
                            </div>
                        </div>

                      
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary submit_account" disabled>
                                    Create New Account
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>

                    <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                   

                                    <label class="form-check-label" for="remember">
                                       Already have an account ?<a href="/login">Sign In</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')


<script type="text/javascript">
    
  $(document).on('click', '#terms', function(event) { 

    if($('#terms').is(':checked'))
    {
          $('.submit_account').prop("disabled", false);
    }
    else
    {
         $('.submit_account').prop("disabled", true);
    }

  });



</script>




@endsection


