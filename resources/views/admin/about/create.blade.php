@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة بيانات المؤسسة</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('About.store') }}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_ar">اسم المؤسسة - عربي</label>
                <input type="text"  class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" placeholder="اكتب اسم المؤسسة - عربي">
                @error('name_ar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_en">اسم المؤسسة - انجليزي</label>
                <input type="text"  class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" placeholder="اكتب اسم المؤسسة - انجليزي">
                @error('name_en')
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
                <label class="form-control-label" for="details_ar"> نبذة عن المؤسسة - عربي</label>
                <textarea  class="form-control @error('details_ar') is-invalid @enderror" id="details_ar" name="details_ar" placeholder="اكتب نبذة عن المؤسسة - عربي"></textarea>
                @error('details_ar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="details_en">نبذة عن المؤسسة - انجليزي</label>
                <textarea  class="form-control @error('details_en') is-invalid @enderror" id="details_en" name="details_en" placeholder="اكتب نبذة عن المؤسسة - عربي"></textarea>
                @error('details_en')
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
                <label class="form-control-label" for="address_ar"> عنوان المؤسسة - عربي</label>
                <input type="text"  class="form-control @error('address_ar') is-invalid @enderror" id="address_ar" name="address_ar" placeholder="اكتب عنوان المؤسسة - عربي">
                @error('address_ar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="address_en">عنوان المؤسسة - انجليزي</label>
                <input type="text"  class="form-control @error('address_en') is-invalid @enderror" id="address_en" name="address_en" placeholder="اكتب عنوان المؤسسة - انجليزي">
                @error('address_en')
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
                <label class="form-control-label" for="phone1">رقم الهاتف (1) </label>
                <input type="text"  class="form-control @error('phone1') is-invalid @enderror" id="phone1" name="phone1" placeholder="اكتب رقم الهاتف">
                @error('phone1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone2">رقم الهاتف (2) </label>
                <input type="text"  class="form-control @error('phone2') is-invalid @enderror" id="phone2" name="phone2" placeholder="اكتب رقم الهاتف">
                @error('phone2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="email"> البريد الالكتروني</label>
                <input type="text"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="اكتب البريد الالكتروني">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img"> الشعار</label>
                <input type="file"  class="form-control @error('img') is-invalid @enderror" id="img" name="img" placeholder="اكتب اسم النادي - عربي">
                @error('img')
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
