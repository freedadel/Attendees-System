@extends('layouts.masterPage_dashboard')
<style>
  @media only screen and (max-width: 600px) {
  #first-shape {
    margin-right: 10px  !important;
  }
}
  #first-shape {
    margin-right: 70px;
  }
  .chart-doughnut{
    padding-top:30px !important;
    width: 150px !important;
    height: 200px !important;
    margin: auto !important;
  }
 
</style>
@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row pt-3">
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">عدد الفواتير</h5>
                  <span class="h2 font-weight-bold mb-0 text-danger">{{count($bills)}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                    <i class="ni ni-single-copy-04"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">قيمة الفواتير</h5>
                  <span class="h2 font-weight-bold mb-0 text-danger">{{$bills->sum('totalwvat')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">عدد العملاء</h5>
                  <span class="h2 font-weight-bold mb-0 text-danger">{{count($customers)}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                    <i class="ni ni-satisfied"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">الرصيد الحالي</h5>
                  <span class="h2 font-weight-bold mb-0 text-danger">{{$moneymoves->sum('cred') - $moneymoves->sum('dept')}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-dark text-uppercase ls-1 mb-1">الفواتير</h6>
              <h5 class="h3 text-white mb-0">آخر 5 فواتير</h5>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="{{route('bills.index')}}" class="nav-link py-2 px-3 active">
                    <span class="d-none d-md-block">عرض الكل</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body bg-white">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th style="font-size: small !important">العميل</th>
                  <th style="font-size: small !important">التاريخ</th>
                  <th style="font-size: small !important">الاجمالي</th>
                  <th style="font-size: small !important">الخصم</th>
                  <th style="font-size: small !important">الضريبة</th>
                  <th style="font-size: small !important">شامل الضريبة</th>
                  <th style="font-size: small !important">ادخال بواسطة</th>
                  <th style="font-size: small !important">عرض</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th style="font-size: small !important">العميل</th>
                  <th style="font-size: small !important">التاريخ</th>
                  <th style="font-size: small !important">الاجمالي</th>
                  <th style="font-size: small !important">الخصم</th>
                  <th style="font-size: small !important">الضريبة</th>
                  <th style="font-size: small !important">شامل الضريبة</th>
                  <th style="font-size: small !important">ادخال بواسطة</th>
                  <th style="font-size: small !important">عرض</th>
                </tr>
              </tfoot>
              <tbody>
                @if (count($bills) > 0)
                @foreach ($bills as $index => $bill)
                <tr>
                  <td>{{ $bill->id }}</td>
                  <td>{{ $bill->customer->name }}</td>
                  <td>{{ $bill->created_at }}</td>
                  <td>{{ $bill->total+$bill->discount }}</td>
                  <td>{{ $bill->discount }}</td>
                  <td>{{ $bill->vat }}</td>
                  <td>{{ $bill->totalwvat }}</td>
                  <td>{{ $bill->user->name}}</td>
                  <td>
                      <a href="{{route('bills.show',$bill->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> </a>
                   </td>
                </tr>
                @endforeach
                @else
                <tr >
                    <th colspan="8" class="text-center">لا يوجد فواتير</th>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col-8">
              <h6 class="text-uppercase text-dark ls-1 mb-1">الحركات المالية</h6>
              <h5 class="h3 mb-0 text-white">آخر 5 حركات مالية على النظام</h5>
            </div>
            <div class="col-4">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="{{route('moneymoves.index')}}" class="nav-link py-2 px-3 active">
                    <span class="d-none d-md-block">عرض الكل</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th style="font-size: small !important">التاريخ</th>
                  <th style="font-size: small !important">المبلغ</th>
                  <th style="font-size: small !important">التفاصيل</th>
                  <th style="font-size: small !important">تعديل</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th style="font-size: small !important">التاريخ</th>
                  <th style="font-size: small !important">المبلغ</th>
                  <th style="font-size: small !important">التفاصيل</th>
                  <th style="font-size: small !important">تعديل</th>
                </tr>
              </tfoot>
              <tbody>
                @if (count($moneymoves) > 0)
                @foreach ($moneymoves as $index => $record)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $record->created_at }}</td>
                  @if ($record->bill_id != 0)
                  <td><i class="fa fa-arrow-up text-danger"></i></i> {{ $record->dept}}</td>
                  @else
                  <td><i class="fa fa-arrow-down text-success"></i></i> {{ $record->cred}}</td>
                  @endif
                  
                  <td>{{ $record->describtion }}</td>
                  <td>
                      @if ($record->bill_id != 0)
                      <a href="{{route('customers.show',$record->bill_id)}}" class="btn btn-success"><span class="fa fa-eye"></span></a>
                      @else
                      <a href="{{route('customers.edit',$record->sanad_id)}}" class="btn btn-dark"><span class="fa fa-eye"></span></a>
                      @endif
                   </td>
                </tr>
                @endforeach
                @else
                <tr >
                    <th colspan="6" class="text-center">لا يوجد سجلات</th>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-8">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-white">العملاء</h3>
            </div>
            <div class="col text-left">
              <a href="{{route('customers.index')}}" class="btn btn-sm btn-primary">عرض الكل</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">اسم العميل</th>
                <th style="font-size: small !important">الرصيد</th>
                <th style="font-size: small !important">رقم الهاتف</th>
                <th style="font-size: small !important">الحي</th>
                <th style="font-size: small !important">تعديل</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">اسم العميل</th>
                <th style="font-size: small !important">الرصيد</th>
                <th style="font-size: small !important">رقم الهاتف</th>
                <th style="font-size: small !important">الحي</th>
                <th style="font-size: small !important">تعديل</th>
              </tr>
            </tfoot>
            <tbody>
              @if (count($customers) > 0)
              @foreach ($customers as $index => $customer)
              <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->records->sum('cred') - $customer->records->sum('dept')}}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <button class="btn btn-info" onclick="handleAdd({{ $customer->id }})"><span class="fa fa-plus"></span> اضافة رصيد </button>
                    <a href="{{route('customers.show',$customer->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض</a>
                    <a href="{{route('customers.records',$customer->id)}}" class="btn btn-dark"><span class="fa fa-list"></span> كشف حساب</a>
                    <a href="{{route('customers.edit',$customer->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
                    <button class="btn btn-danger" onclick="handleDelete({{ $customer->id }})"><span class="fa fa-trash"></span> حذف </button>
                 </td>
              </tr>
              @endforeach
              @else
              <tr >
                  <th colspan="7" class="text-center">لا يوجد عملاء</th>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-white">آخر العمليات على النظام</h3>
            </div>
            <div class="col text-left">
              <a href="{{route('trans.index')}}" class="btn btn-sm btn-primary">عرض الكل</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">العملية</th>
                <th style="font-size: small !important">التاريخ</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">العملية</th>
                <th style="font-size: small !important">التاريخ</th>
              </tr>
            </tfoot>
            <tbody>
              @if (count($transs) > 0)
              @foreach ($transs as $index => $trans)
              <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $trans->details }}</td>
                <td>{{ $trans->created_at }}</td>
              </tr>
              @endforeach
              @else
              <tr >
                  <th colspan="4" class="text-center">لا يوجد عمليات</th>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection

<script>
</script>