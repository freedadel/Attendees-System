@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-6" style="float:left;text-align:right">
          <h3 class="text-white">بيانات الموظف</h3>
        </div>
        <div class="col-6" style="float:left;text-align:left">
          <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
          <button class="btn btn-success" onclick="handleHoliday({{ $employee->id }})"><span class="fa fa-plus"></span> اضافة اجازة </button>
        </div>
      </div>
    </div>
    <div class="card-body">
        
        <div class="row">
        <div class="pl-lg-4 col-lg-12">
          <div class="row">
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">اسم الموظف</label>
                <h4 style="color:#f5365c">{{$employee->name}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">رقم الهاتف</label>
                <h4 style="color:#f5365c">{{$employee->phone}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">البريد الالكتروني</label>
                <h4 style="color:#f5365c">{{$employee->email}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">تاريخ الميلاد</label>
                <h4 style="color:#f5365c">{{$employee->bdate}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">رقم الهوية</label>
                <h4 style="color:#f5365c">{{$employee->identity}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الجنسية</label>
                <h4 style="color:#f5365c">{{$employee->origin}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">العنوان</label>
                <h4 style="color:#f5365c">{{$employee->address}}</h4>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الراتب</label>
                <h4 style="color:#f5365c">{{$employee->salary}}</h4>
              </div>
            </div>
            
            <div class="col-lg-12">
              <hr>
              <label class="form-control-label" for="input-first-name">الاجازات</label>
              <table class="responsive table col-lg-12" style="margin: auto">
                <thead>
                  <th>نوع الاجازة</th>
                  <th>السبب</th>
                  <th>التاريخ</th>
                  <th>المدة</th>
                </thead>
                <tbody id="tbody">
                  @foreach ($employee->holidays as $holiday)
                  <tr>
                    <td>{{$holiday->type}}</td>
                    <td>{{$holiday->reason}}</td>
                    <td>{{$holiday->sdate}}</td>
                    <td>{{$holiday->period}}</td>
                  </tr>
              @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Description -->
        </div>

        </div>
    </div>
  </div>
</div>
    <!-- Holiday Modal -->
    <div class="modal fade modal" id="holidayModel" tabindex="-1" role="dialog" aria-labelledby="holidayModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">اضافة اجازة</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="holidayCategoryForm" enctype = "multipart/form-data">
            @csrf
            <div class="modal-body">
              <p class="text-center">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="type">نوع الاجازة</label>
                      <input type="text" class="autocomplete form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                      @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="reason">سبب الاجازة</label>
                      <input type="text" class="autocomplete form-control @error('reason') is-invalid @enderror" id="reason" name="reason" required>
                      @error('reason')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="period">مدة الاجازة</label>
                      <input type="number" class="form-control @error('period') is-invalid @enderror" id="period" name="period" placeholder="اكتب الكمية" required>
                      @error('period')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="sdate">تاريخ الاجازة</label>
                      <input type="date" class="form-control @error('sdate') is-invalid @enderror" id="sdate" name="sdate" placeholder="اكتب التاريخ" value="{{session()->get("holidayDdate")}}" required>
                      @error('sdate')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </p>
              
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="float:right">ارسال</button>
              <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right"> الغاء</button>
            </div>
          </form>
    
        </div>
      </div>
    </div>
  <!-- Holiday Modal -->
@endsection
<script>
  function handleHoliday(id) {
      //console.log('star.', id)
      var form = document.getElementById('holidayCategoryForm')
    // form.action = '/user/holiday/' + id
    form.action = '/employees-holiday/' + id
      $('#holidayModel').modal('show')
  }
</script>