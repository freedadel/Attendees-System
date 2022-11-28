@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header bg-ainjez">
      <div class="row align-items-center">
        <div class="col-4">
          <h3 class="mb-0">صورة الصنف</h3>
        </div>
        <div class="col-8" style="float:left;text-align:left">
          <a href="{{route('items.edit',$item->id)}}" class="btn btn-secondary"><span class="fa fa-edit"></span> تعديل</a>
        </div>
      </div>
    </div>
    <div class="card-body">
        <h6 class="heading-small text-muted mb-4">بيانات الصنف</h6>
        <div class="row">
        <div class="pl-lg-4 col-lg-12">
          <div class="row">
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_ar" style="color:#f5365c">اسم الصنف</label>
                <h4>{{$item->name}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="name_ar" style="color:#f5365c">نوع الصنف</label>
                @if($item->group_id == 1)
                <h4>غسيل</h4>
                @elseif($item->group_id == 2)
                <h4>كواية</h4>
                @else
                <h4>مستعجل</h4>
                @endif
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="price" style="color:#f5365c">سعر الصنف</label>
                <h4>{{$item->price}}</h4>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="img" style="color:#f5365c">صورة الصنف</label>
                <h4><img src="{{asset('img/items/'.$item->img)}}" alt="" width="50%"></h4>
              </div>
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
