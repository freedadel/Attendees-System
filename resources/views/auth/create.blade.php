@extends('layouts.masterPage_signup')


@section('content')
<div class="col-xl-8 item-xl-1" style="margin: auto;margin-top:25px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white"><i class="fa fa-plus"></i> تسجيل جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('userStore') }}" enctype = "multipart/form-data">
        @csrf
        <h6 class="heading-small text-muted mb-4">البيانات الأساسية</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name">الإسم | Name</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسمك هنا" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="email">البريد الإلكتروني | Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="test@example.com" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone">رقم الهاتف | Phone</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="05XXXXXXXX" required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name">كلمة المرور | Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="********" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="password_confirmation">اعد كتابة كلمة المرور | Confirm password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="********" required>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img">صورتك | Your image</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                  <input type="file" class="form-control" name="img" id="img">
                </div>
                @error('img')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div  class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name"> </label>
                <br>
                <input type="submit" class="btn btn-success" value="حفظ | Save" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
      </form>
    </div>
  </div>
</div>
</div>
@endsection
