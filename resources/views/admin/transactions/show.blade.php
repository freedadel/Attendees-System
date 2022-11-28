@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">تفاصيل المعاملة</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
        <h6 class="heading-small text-muted mb-4">بيانات المعاملة</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">المعاملة</label>
                <h4 class="text-danger">{{$transaction->name}}</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">نوع المعاملة</label>
                <h4 class="text-danger">{{$transaction->tType->name}}</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">مرحلة المعاملة</label>
                <h4 class="text-danger">{{$transaction->tStage->name}}</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">حالة المعاملة</label>
                @if($transaction->status == 1)
                <h4 class="text-danger">قيد التنفيذ</label>
                @else
                <h4 class="text-success">اكتملت</label>
                @endif
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">تاريخ بداية المعاملة</label>
                <h4 class="text-danger">{{$transaction->first_date}}</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">تاريخ نهاية المعاملة</label>
                @if(!empty($transaction->end_date))
                <h4 class="text-danger">{{$transaction->end_date}}</label>
                @else
                <h4 class="text-danger">لا يوجد</label>
                @endif
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label">تعليق</label>
                @if(!empty($transaction->comments))
                <h4 class="text-danger">{{$transaction->comments}}</label>
                @else
                <h4 class="text-danger">لا يوجد</label>
                @endif
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label">تفاصيل المعاملة</label>
                <h4 class="text-danger">{{$transaction->description}}</label>
              </div>
            </div>
          </div>

        </div>
        <hr class="my-4" />
    </div>
  </div>
</div>
</div>
@endsection
