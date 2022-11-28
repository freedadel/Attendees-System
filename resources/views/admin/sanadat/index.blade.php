@extends('layouts.masterPage_dashboard')
<style>
  .dt-button{
    background-color: #5fc294 !important;
  }
</style>
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          @if(!empty($dateFrom))
          <form class="row" action="{{route('setBillsDate')}}" method="POST" style="margin:auto;padding-top:10px">
            @csrf 
            <div class="col-md-1" style="text-align:right;display:inline-block">
              <label class="form-control-label" for="from">من تاريخ</label>
            </div>
            <div class="col-md-2" style="display:inline-block">
              <input type="date" class="form-control @error('from') is-invalid @enderror" id="from" name="from" required>
            </div>
            <div class="col-md-1" style="text-align:right;display:inline-block">
              <label class="form-control-label" for="to">إلى تاريخ</label>
            </div>
            <div class="col-md-2" style="display:inline-block">
              <input type="date" class="form-control @error('to') is-invalid @enderror" id="to" name="to" required>
            </div>
            <div class="col-md-1" style="display:inline-block">
              <button type="submit" class="form-control btn btn-danger" style="margin: auto">بحث</button>
            </div>
          </form>
          <div class="row">
            <h3 style="margin-right:30px;margin-top:10px;width:100%"> السندات في الفترة من  <strong style="color: rgb(245, 86, 86)"> {{$dateFrom}}</strong> وحتى <strong style="color: rgb(245, 86, 86)"> {{$dateTo}}</strong>
            </h3>
          </div>
          @endif
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-1">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                قائمة السندات
              </h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">العميل</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الاجمالي</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">العميل</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الاجمالي</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($sanadat) > 0)
                    @foreach ($sanadat as $index => $sanad)
                    <tr>
                      <td>{{ $sanad->id }}</td>
                      <td>{{ $sanad->customer->name }}</td>
                      <td>{{ $sanad->created_at }}</td>
                      <td>{{ $sanad->total}}</td>
                      <td>{{ $sanad->user->name}}</td>
                      <td>
                          <a href="{{route('sanadat.show',$sanad->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض</a>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="8" class="text-center">لا يوجد سندات</th>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
  @endsection