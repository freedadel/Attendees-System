@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-2" style="float: right;text-align:right">
          <h3 class=" text-white">الإعدادت</h3>
        </div>
        <div class="col-10" style="float:left;text-align:left">
          <a href="{{route('items.index')}}" class="btn btn-secondary"><span class="fa fa-cog text-danger"></span> المنتجات</a>
          <a href="{{route('projectStages.index')}}" class="btn btn-danger"><span class="fa fa-spinner"></span> مراحل المخططات</a>
          <a href="{{route('Ltype.index')}}" class="btn btn-info"><span class="fa fa-cog"></span> انواع الرخص</a>
          <a href="{{route('licenseStages.index')}}" class="btn btn-primary"><span class="fa fa-spinner"></span> مراحل الرخص</a>
          <a href="{{route('licensesSettings')}}" class="btn btn-warning"><span class="fa fa-cog"></span> ايام الرخص</a>
          @if(auth()->user()->permission == 1)
          <a href="{{route('branches.index')}}" class="btn btn-success"><span class="fa fa-home"></span> الفروع</a>
          @endif
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="pl-lg-4 col-lg-12" style="text-align: center;font-size:6rem">
            <i class="fa fa-cogs"></i>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
