@extends('layouts.app')

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <a href="{{ url()->previous() }}" class="btn btn-danger col-3" style="margin: auto;border-radius:30px;height:45px">رجوع</a>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="pl-lg-4 col-lg-12" style="text-align: center;font-size:6rem">
            <i class="fa fa-exclamation-triangle text-warning"></i>
            <h2>عذراً الصفحة غير موجودة</h2>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
