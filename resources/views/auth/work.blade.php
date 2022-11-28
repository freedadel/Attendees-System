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
      <form class="user" method="POST" action="{{ route('userWork') }}" enctype = "multipart/form-data">
        @csrf
        @method('PUT')
        <h6 class="heading-small text-muted mb-4">بيانات العمل</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="work">هل تعمل حالياً</label>
                <select class="form-control @error('work') is-invalid @enderror" id="work" name="work" required>
                  <option value="1">نعم</option>
                  <option value="2">لا</option>
                </select>
                @error('work')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row" id="iswork">
            <div class="col-lg-6" @if($user->inside == 2) style="display:none" @endif>
              <div class="form-group">
                <label class="form-control-label" for="state">الولاية</label>
                <select class="form-control" name="state" id="state" placeholder="" data-msg="اختر الولاية">
                  <option value="">اختر الولاية</option>
                  @foreach ($states as $state)
                  <option value="{{$state->id}}" >{{$state->name_ar}}</option>   
                  @endforeach
                </select>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="sector_id">القطاع</label>
                <select class="form-control @error('sector_id') is-invalid @enderror" id="sector_id" name="sector_id">
                  <option value="">اختر القطاع</option>
                  @if($user->inside == 1)
                    <option value="1">القطاع الخاص</option>
                    <option value="2">القطاع الحكومي</option>
                    <option value="3">القطاع التعليمي</option>
                    <option value="4">القطاع المصرفي</option>
                    <option value="5">قطاع الاتصالات</option>
                  @else
                    <option value="6">العاملين بالخارج</option>
                  @endif
                </select>
                @error('sector_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="institute">المؤسسة/الشركة</label>
                <input type="text" class="autocomplete form-control @error('institute') is-invalid @enderror" id="institute" name="institute">
                @error('institute')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="year">سنة التوظيف</label>
                <select name="year" class="form-control" id="year">
                  <option value="">السنة</option>
                  @for ($i=2022;$i>1950;$i--)
                  <option value="{{$i}}" @if(!empty($work)) @if($i == $work->years) selected @endif @endif>{{$i}}</option>
                  @endfor
                </select>
                @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="job_title">الوظيفة الحالية</label>
                <input type="text" class="autocomplete2 form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title">
                @error('job_title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img">شهادة عمل/ اثبات</label>
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
                <input type="submit" class="btn btn-success" value="حفظ البيانات" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $('#work').on('change', function() {
  var i_value = document.getElementById('work').value;
  if(i_value == 1){
    document.getElementById('iswork').style.display = "flex";
  }else if(i_value == 2){
    document.getElementById('iswork').style.display = "none";
  }
  });

  var availableTags = <?php echo json_encode($inistitutes); ?>;
  var availableTags2 = <?php echo json_encode($job_titles); ?>;
  $( ".autocomplete" ).autocomplete({
    source: availableTags
  });
  $( ".autocomplete2" ).autocomplete({
    source: availableTags2
  });
</script>
@endsection
