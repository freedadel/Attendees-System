@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-4">
          <h3 class="mb-0 text-white">بيانات المؤسسة</h3>
        </div>
        <div class="col-8" style="float:left;text-align:left">
          <a href="{{route('About.edit',$about->id)}}" class="btn btn-info"><span class="fa fa-edit"></span> تعديل</a>
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
                <label class="form-control-label" for="name_ar">اسم المؤسسة - عربي</label>
                <h4 style="color:#f5365c">{{$about->name_ar}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_en">اسم المؤسسة - انجليزي</label>
                <h4 style="color:#f5365c">{{$about->name_en?$about->name_en:"لا يوجد"}}</h4>
              </div>
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="details_ar"> نبذة عن المؤسسة - عربي</label>
                <h4 style="color:#f5365c">{{$about->details_ar}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="details_en">نبذة عن المؤسسة - انجليزي</label>
                <h4 style="color:#f5365c">{{$about->details_en?$about->details_en:"لا يوجد"}}</h4>
              </div>
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="address_ar"> عنوان المؤسسة - عربي</label>
                <h4 style="color:#f5365c">{{$about->address_ar}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="address_en">عنوان المؤسسة - انجليزي</label>
                <h4 style="color:#f5365c">{{$about->address_en?$about->address_en:"لا يوجد"}}</h4>
              </div>
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone2">رقم الهاتف (2) </label>
                <h4 style="color:#f5365c">{{$about->phone2?$about->phone2:"لا يوجد"}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="phone1">رقم الهاتف (1) </label>
                <h4 style="color:#f5365c">{{$about->phone1?$about->phone1:"لا يوجد"}}</h4>
              </div>
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="email"> البريد الالكتروني</label>
                <h4 style="color:#f5365c">{{$about->email?$about->email:"لا يوجد"}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img"> شعار المؤسسة</label><br>
                <img src="{{asset('img\about\\'.$about->img)}}" height="100px" width="100px" />
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        </div>
        </div>
    </div>
  </div>
</div>

@endsection
