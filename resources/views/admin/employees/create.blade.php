@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة موظف جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('employees.store') }}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">الإسم</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسم الموظف"  required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone">رقم الهاتف</label>
                <input type="text" minlength="10" maxlength="10" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="اكتب رقم الهاتف" required>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="email">البريد الالكتروني</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="اكتب البريد الالكتروني" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="bdate">تاريخ الميلاد</label>
                <input type="date" class="form-control @error('bdate') is-invalid @enderror" id="bdate" name="bdate" required>
                @error('bdate')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="identity">رقم الهوية</label>
                <input type="text"  class="form-control @error('identity') is-invalid @enderror" id="identity" name="identity" placeholder="رقم الهوية">
                @error('identity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="origin">الجنسية</label>
                <input type="text" class="form-control @error('origin') is-invalid @enderror" id="origin" name="origin" placeholder="الجنسية">
                @error('origin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="address">العنوان</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="اكتب العنوان">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="salary">الراتب</label>
                <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" placeholder="الراتب">
                @error('salary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name"> </label>
                <br>
                <input type="submit" class="btn btn-success" value="حفظ" style="width: 100%">
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
