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
      <form class="user" method="POST" action="{{ route('userEdu') }}" enctype = "multipart/form-data">
        @csrf
        @method('PUT')
        <h6 class="heading-small text-muted mb-4">بيانات التعليم</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="count">عدد الشهادات المراد اضافتها</label>
                <select class="autocomplete form-control @error('count') is-invalid @enderror" id="count" name="count" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                @error('count')
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
                <label class="form-control-label" for="university1">الجامعة</label>
                <input type="text"  class="autocomplete form-control @error('university1') is-invalid @enderror" id="university1" name="university1" placeholder="اكتب اسم الجامعة" required>
                @error('university1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="faculity1">الكلية</label>
                <input type="text"  class="autocomplete2 form-control @error('faculity1') is-invalid @enderror" id="faculity1" name="faculity1" placeholder="اكتب اسم الكلية" required>
                @error('faculity1')
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
                <label class="form-control-label" for="degree1">الدرجة العلمية</label>
                <select class="form-control @error('degree1') is-invalid @enderror" id="degree1" name="degree1" required>
                  <option value="">اختر الدرجة العلمية</option>
                  @foreach ($degrees as $degree)
                  <option value="{{$degree->id}}">{{$degree->name_ar}}</option>
                  @endforeach
                </select>
                @error('degree')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img1">صورة أو PDF للشهادة</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                  <input type="file" class="form-control" name="img1" id="img1" required>
                </div>
                @error('img1')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <div style="display: none" id="cert2">
          <hr>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="university2">الجامعة (2)</label>
                <input type="text"  class="autocomplete form-control @error('university2') is-invalid @enderror" id="university2" name="university2" placeholder="اكتب اسم الجامعة">
                @error('university2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="faculity2">الكلية (2)</label>
                <input type="text"  class="autocomplete2 form-control @error('faculity2') is-invalid @enderror" id="faculity2" name="faculity2" placeholder="اكتب اسم الكلية">
                @error('faculity2')
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
                <label class="form-control-label" for="degree2">الدرجة العلمية (2)</label>
                <select class="form-control @error('degree2') is-invalid @enderror" id="degree2" name="degree2">
                  <option value="">اختر الدرجة العلمية</option>
                  @foreach ($degrees as $degree)
                  <option value="{{$degree->id}}">{{$degree->name_ar}}</option>
                  @endforeach
                </select>
                @error('degree2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img2">صورة أو PDF للشهادة (2)</label>
                <div class="row col-12" style="margin: auto;padding:0px">
                  <input type="file" class="form-control" name="img2" id="img2">
                </div>
                @error('img2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          </div>
          <div style="display: none" id="cert3">
            <hr>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="university3">الجامعة (3)</label>
                  <input type="text"  class="autocomplete form-control @error('university3') is-invalid @enderror" id="university3" name="university3" placeholder="اكتب اسم الجامعة">
                  @error('university3')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="faculity3">الكلية (3)</label>
                  <input type="text"  class="autocomplete2 form-control @error('faculity3') is-invalid @enderror" id="faculity3" name="faculity3" placeholder="اكتب اسم الكلية">
                  @error('faculity3')
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
                  <label class="form-control-label" for="degree3">الدرجة العلمية (3)</label>
                  <select class="form-control @error('degree3') is-invalid @enderror" id="degree3" name="degree3">
                    <option value="">اختر الدرجة العلمية</option>
                    @foreach ($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->name_ar}}</option>
                    @endforeach
                  </select>
                  @error('degree3')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="img3">صورة أو PDF للشهادة (3)</label>
                  <div class="row col-12" style="margin: auto;padding:0px">
                    <input type="file" class="form-control" name="img3" id="img3">
                  </div>
                  @error('img3')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div style="display: none" id="cert4">
            <hr>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="university4">الجامعة (4)</label>
                  <input type="text"  class="autocomplete form-control @error('university4') is-invalid @enderror" id="university4" name="university4" placeholder="اكتب اسم الجامعة">
                  @error('university4')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="faculity4">الكلية (4)</label>
                  <input type="text"  class="autocomplete2 form-control @error('faculity4') is-invalid @enderror" id="faculity4" name="faculity4" placeholder="اكتب اسم الكلية">
                  @error('faculity4')
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
                  <label class="form-control-label" for="degree4">الدرجة العلمية (4)</label>
                  <select class="form-control @error('degree4') is-invalid @enderror" id="degree4" name="degree4">
                    <option value="">اختر الدرجة العلمية</option>
                    @foreach ($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->name_ar}}</option>
                    @endforeach
                  </select>
                  @error('degree4')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="img4">صورة أو PDF للشهادة (4)</label>
                  <div class="row col-12" style="margin: auto;padding:0px">
                    <input type="file" class="form-control" name="img4" id="img4">
                  </div>
                  @error('img4')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div style="display: none" id="cert5">
            <hr>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="university5">الجامعة (5)</label>
                  <input type="text"  class="autocomplete form-control @error('university5') is-invalid @enderror" id="university5" name="university5" placeholder="اكتب اسم الجامعة">
                  @error('university5')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="faculity5">الكلية (5)</label>
                  <input type="text"  class="autocomplete2 form-control @error('faculity5') is-invalid @enderror" id="faculity5" name="faculity5" placeholder="اكتب اسم الكلية">
                  @error('faculity5')
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
                  <label class="form-control-label" for="degree5">الدرجة العلمية (5)</label>
                  <select class="form-control @error('degree5') is-invalid @enderror" id="degree5" name="degree5">
                    <option value="">اختر الدرجة العلمية</option>
                    @foreach ($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->name_ar}}</option>
                    @endforeach
                  </select>
                  @error('degree5')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="img5">صورة أو PDF للشهادة (5)</label>
                  <div class="row col-12" style="margin: auto;padding:0px">
                    <input type="file" class="form-control" name="img5" id="img5">
                  </div>
                  @error('img5')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div  class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name"> </label>
                <br>
                <input type="submit" class="btn btn-success" value="انتقل لبيانات العمل" style="width: 100%">
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
  $('#count').on('change', function() {
  var i_value = document.getElementById('count').value;
  if(i_value == 2){
    document.getElementById('cert2').style.display = "block";
    document.getElementById('cert3').style.display = "none";
    document.getElementById('cert4').style.display = "none";
    document.getElementById('cert5').style.display = "none";
  }else if(i_value == 3){
    document.getElementById('cert2').style.display = "block";
    document.getElementById('cert3').style.display = "block";
    document.getElementById('cert4').style.display = "none";
    document.getElementById('cert5').style.display = "none";
  }else if(i_value == 4){
    document.getElementById('cert2').style.display = "block";
    document.getElementById('cert3').style.display = "block";
    document.getElementById('cert4').style.display = "block";
    document.getElementById('cert5').style.display = "none";
  }else if(i_value == 5){
    document.getElementById('cert2').style.display = "block";
    document.getElementById('cert3').style.display = "block";
    document.getElementById('cert4').style.display = "block";
    document.getElementById('cert5').style.display = "block";
  }else if(i_value == 1){
    document.getElementById('cert2').style.display = "none";
    document.getElementById('cert3').style.display = "none";
    document.getElementById('cert4').style.display = "none";
    document.getElementById('cert5').style.display = "none";
  }
  });

  var availableTags = <?php echo json_encode($universities); ?>;
  var availableTags2 = <?php echo json_encode($faculties); ?>;
  $( ".autocomplete" ).autocomplete({
    source: availableTags
  });
  $( ".autocomplete2" ).autocomplete({
    source: availableTags2
  });
</script>
@endsection
