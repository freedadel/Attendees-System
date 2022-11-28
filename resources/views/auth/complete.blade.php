@extends('layouts.masterPage_signup')
<style>
  #countries{
    display: none;
  }
</style>
@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:10px">
  <div class="card" style="text-align:center;padding:15px !important;margin-bottom:10px ">
    <img src="{{asset('img/brand2.png')}}" style="width:250px;margin:3px">
  </div>
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">طلب عضوية جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('userUpdate') }}" enctype = "multipart/form-data">
        @csrf
        @method('PUT')
        <h6 class="heading-small text-muted mb-4">اكمال البيانات الشخصية</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_en">الإسم رباعي - انجليزي</label>
                <input type="text"  class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" placeholder="اكتب اسم العضو - انجليزي" value="{{$user->name_en}}" required>
                @error('name_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="inside">هل تعمل داخل السودان؟</label>
                <select class="form-control @error('inside') is-invalid @enderror" id="inside" name="inside" required>
                  <option value="1" @if($user->inside == 1) selected @endif>نعم</option>
                  <option value="2" @if($user->inside == 2) selected @endif>لا</option>
                </select>
                @error('inside')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row" id="countries" @if($user->inside == 2) style="display:block" @endif>
            <div class="col-md-6 form-group">
              <label for="country"style="float:right">الدولة</label>
              <select class="form-control" name="country" id="country" onchange="setkey()" placeholder="" data-msg="اختر الدولة">
                <option value="">اختر الدولة</option>
                @foreach ($countries as $country)
                <option value="{{$country->id}}" data-code="{{$country->key}}" @if($country->id == $user->country_id) selected @endif>{{$country->name_ar}}</option>   
                @endforeach
              </select>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="birth_date">تاريخ الميلاد</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                <select name="bdate1" class="form-control col-4" id="bdate1" required style="display: inline-block;margin: auto">
                  <option value="">اليوم</option>
                  @for ($i=1;$i<32;$i++)
                  <option value="{{$i}}" @if($i == $user->day) selected @endif>{{$i}}</option>
                  @endfor
                </select>
                <select name="bdate2" class="form-control col-4" id="bdate2" required style="display: inline-block;margin: auto">
                  <option value="">الشهر</option>
                  @for ($i=1;$i<13;$i++)
                  <option value="{{$i}}" @if($i == $user->month) selected @endif>{{$i}}</option>
                  @endfor
                </select>
                <select name="bdate3" class="form-control col-4" id="bdate3" required style="display: inline-block;margin: auto">
                  <option value="">السنة</option>
                  @for ($i=2010;$i>1950;$i--)
                  <option value="{{$i}}" @if($i == $user->year) selected @endif>{{$i}}</option>
                  @endfor
                </select>
                </div>
                @error('birth_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="gender">النوع</label>
                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                  <option value="">اختر النوع</option>
                  <option value="1" @if($user->gender == 1) selected @endif>ذكر</option>
                  <option value="2" @if($user->gender == 2) selected @endif>انثى</option>
                </select>
                @error('email')
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
                <label class="form-control-label" for="identity_id">نوع الهوية</label>
                <select class="form-control @error('identity_id') is-invalid @enderror" id="identity_id" name="identity_id" required>
                  <option value="">اختر نوع الهوية</option>
                  @foreach ($identities as $identity)
                  <option value="{{$identity->id}}" @if($identity->id == $user->identity_id) selected @endif>{{$identity->name_ar}}</option>
                  @endforeach
                </select>
                @error('identity_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="identity_no">رقم الهوية</label>
                <input type="text"  class="form-control @error('identity_no') is-invalid @enderror" id="identity_no" name="identity_no" placeholder="رقم الهوية" value="{{$user->identity_no}}" required>
                @error('identity_no')
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
                <label class="form-control-label" for="phone_call">رقم الهاتف الجوال</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                  <input type="tel" class="form-control col-9 text-left" name="phone_call" id="phone_call" placeholder="رقم الهاتف" data-rule="minlen:8" data-msg="ادخل رقم هاتف صحيح" value="{{substr($user->phone_call,-9)}}" required />
                  <input type="text" class="form-control col-3 text-right" style="direction: ltr" @if(empty($user->c_code)) value="+249" @else value="{{$user->c_code}}" @endif id="cod1" disabled />
                  <input type="hidden" class="form-control col-3" name="code1" @if(empty($user->c_code)) value="+249" @else value="{{$user->c_code}}" @endif id="code1"  />
                </div>
                @error('phone_call')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone_whats">رقم هاتف الواتساب (الرقم مع المفتاح)</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                  <input type="tel" class="form-control col-12 text-left" name="phone_whats" id="phone_whats" placeholder="رقم الهاتف" data-rule="minlen:8" data-msg="ادخل رقم هاتف صحيح" value="{{$user->phone_whats}}" required />
                </div>
                @error('phone_whats')
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
                <label class="form-control-label" for="facebook">رابط حساب الفيسبوك (اختياري)</label>
                  <input type="tel" class="form-control text-left" name="facebook" id="facebook" placeholder="https://" data-msg="ادخل رابط حساب الفيسبوك" value="{{$user->facebook}}" />
                @error('facebook')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="twitter">رابط حساب تويتر (اختياري)</label>
                <input type="tel" class="form-control text-left" name="twitter" id="twitter" placeholder="https://" data-msg="ادخل رابط حساب تويتر" value="{{$user->twitter}}" />
                @error('twitter')
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
                <label class="form-control-label" for="linkedin">رابط حساب لنكدإن (اختياري)</label>
                <input type="tel" class="form-control text-left" name="linkedin" id="linkedin" placeholder="https://" data-msg="ادخل رابط حساب لنكدإن" value="{{$user->linkedin}}" />
                @error('linkedin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone_call">صورة الملف الشخصي</label>
                <input type="file" class="form-control" name="img" id="img">
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
                <input type="submit" class="btn btn-success" value="انتقل لبيانات التعليم" style="width: 100%">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
  function setkey(){
    document.getElementById('cod1').value = $('#country').find('option:selected').data('code');
    document.getElementById('code1').value = $('#country').find('option:selected').data('code'); 
  }

  $('#inside').on('change', function() {
  var i_value = document.getElementById('inside').value;
  if(i_value == 2){
    document.getElementById('countries').style.display = "block";
  }else{
    document.getElementById('countries').style.display = "none";
  }
  });

</script>
@endsection
