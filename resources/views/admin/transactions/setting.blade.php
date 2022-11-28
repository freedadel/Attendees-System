@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اعدادات المعاملات</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <a href="{{ route('transactions.create') }}" class="btn btn-danger" style="float: right">اعدادات المراحل <i class="fa fa-cog"></i></a>
                <a href="{{ route('transactions.create') }}" class="btn btn-success" style="float: right">اعدادات الأنواع <i class="fa fa-cog"></i></a>
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
