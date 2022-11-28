@extends('layouts.masterPage_dashboard')
<style>
  .dt-button{
    background-color: #5fc294 !important;
  }
</style>

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-1">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                كشف حساب العميل {{$customer->name}}
              </h1>    
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
                <button onclick="handleAdd({{ $customer->id }})" class="btn btn-dark" style="float: right">اضافة رصيد <i class="fa fa-plus"></i></button>
              </h6>        
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الرصيد</th>
                      <th style="font-size: small !important">التفاصيل</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الرصيد</th>
                      <th style="font-size: small !important">التفاصيل</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($customer->records) > 0)
                    @foreach ($customer->records as $index => $record)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $record->created_at }}</td>
                      @if ($record->bill_id != 0)
                      <td><i class="fa fa-arrow-up text-danger"></i></i> {{ $record->dept}}</td>
                      @else
                      <td><i class="fa fa-arrow-down text-success"></i></i> {{ $record->cred}}</td>
                      @endif
                      
                      <td>{{ $record->describtion }}</td>
                      <td>{{$record->user->name}}</td>
                      <td>
                          @if ($record->bill_id != 0)
                          <a href="{{route('customers.show',$record->bill_id)}}" class="btn btn-success"><span class="fa fa-eye"></span> الفاتورة</a>
                          @else
                          <a href="{{route('sanadat.show',$record->sanad_id)}}" class="btn btn-dark"><span class="fa fa-eye"></span> سند القبض</a>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- add Modal -->
    <div class="modal fade modal" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">تسليم صنف</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="addCategoryForm" enctype = "multipart/form-data">
            @csrf
            <div class="modal-body">
              <p class="text-center">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="amount">ادخل المبلغ المراد اضافته</label>
                      <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="اكتب الكمية" required>
                      @error('amount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </p>
              
            </div>
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="float:right">ارسال</button>
              <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right"> الغاء</button>
            </div>
          </form>
    
        </div>
      </div>
    </div>
  <!-- add Modal -->
  <script>
    function handleAdd(id) {
        //console.log('star.', id)
        var form = document.getElementById('addCategoryForm')
      // form.action = '/user/add/' + id
      form.action = '/customers-add-balance/' + id
        $('#addModel').modal('show')
    }
  </script>
      @endsection
