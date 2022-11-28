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
          <form class="row" action="{{route('setStockDate')}}" method="POST" style="margin:auto;padding-top:10px">
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
            <h3 style="margin-right:30px;margin-top:10px;width:100%"> ملخص حركة المخزون في الفترة من  <strong style="color: rgb(245, 86, 86)"> {{$dateFrom}}</strong> وحتى <strong style="color: rgb(245, 86, 86)"> {{$dateTo}}</strong>
            </h3>
          </div>
          @endif
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-1">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                حركة المخزون
              </h1>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">الوصف/البيان</th>
                      <th style="font-size: small !important">الصنف</th>
                      <th style="font-size: small !important">نوع العملية</th>
                      <th style="font-size: small !important">الكمية</th>
                      <th style="font-size: small !important">القيمة</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">الوصف/البيان</th>
                      <th style="font-size: small !important">الصنف</th>
                      <th style="font-size: small !important">نوع العملية</th>
                      <th style="font-size: small !important">الكمية</th>
                      <th style="font-size: small !important">القيمة</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($stocks) > 0)
                    @foreach ($stocks as $index => $stock)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $stock->description }}</td>
                      <td>{{ $stock->item->name}}</td>
                      @if($stock->in == 0)
                      <td><span class="bg-danger" style="padding-right: 9px;padding-left: 9px;border-radius:3px"> سحب </span></td>
                      <td><i class="fa fa-arrow-up text-danger"></i></i> {{ $stock->out}}</td>
                      <td><i class="fa fa-arrow-up text-danger"></i></i> {{ $stock->out * $stock->item->price}}</td>
                      @else
                      <td><span class="bg-success" style="padding-right: 9px;padding-left: 9px;border-radius:3px">اضافة</span></td>
                      <td><i class="fa fa-arrow-down text-success"></i> {{ $stock->in}}</td>
                      <td><i class="fa fa-arrow-down text-success"></i> {{ $stock->in * $stock->item->price}}</td>
                      @endif
                      <td>{{ $stock->ddate}}</td>
                      <td>{{$stock->user->name}}</td>
                      <td>
                       <a href="{{route('stocks.show',$stock->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> تفاصيل</a>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="8" class="text-center">لا يوجد سجلات</th>
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
      <!-- End of Main Content -->
    

  @endsection

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        } );
    } );
    </script>