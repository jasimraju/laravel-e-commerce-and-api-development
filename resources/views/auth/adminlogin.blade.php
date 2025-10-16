
@extends('layouts.frontend.login')

@section('css')
<style>
    
.login-page {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.login-page-inner{
        width: 400px;
}
.form {
    position: relative;
    z-index: 1;
    background: #FFFFFF;
   
    padding: 45px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgb(0 0 0 / 20%);
    border-radius: 5px;
}
.form input {
   outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
      border-radius: 20px
}
  
    
</style>
@endsection

@section('body')
<div class="login-page">
    <div class="login-page-inner">

  <div class="form">
      <h3>
        @php 
  $title=__('title.admin_login');
  echo $title;
    @endphp
    </h3>
    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
    <div class="form-group">
        <label for="inputEmail">@lang('title.email_address')</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"   placeholder="@lang('placeholder.email')">
         @error('email')
         <div  class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label for="inputPassword">@lang('title.password')</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"   placeholder="@lang('placeholder.password')">
         @error('password')
         <div  class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
   
    <button type="submit" class="gradient-style-1 signin-btn">Sign in</button>
</form>
  </div>
  </div>
</div>
@endsection

  
