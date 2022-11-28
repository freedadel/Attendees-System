@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-10" style="float:left;text-align:right">
          <h3 class="text-white">بيانات العميل</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
          <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
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
                <label class="form-control-label" for="input-username">اسم العميل</label>
                <h4 style="color:#f5365c">{{$customer->name}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">رقم الهاتف</label>
                <h4 style="color:#f5365c">{{$customer->phone}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">رقم الهوية</label>
                <h4 style="color:#f5365c">{{$customer->identity}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الحي</label>
                <h4 style="color:#f5365c">{{$customer->address}}</h4>
              </div>
            </div>
            
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">رقم الصحة</label>
                <h4 style="color:#f5365c">{{$customer->home_no}}</h4>
              </div>
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
@endsection
