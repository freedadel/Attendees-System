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
                العملاء
              </h1>    
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
                <a href="{{ route('customers.create') }}" class="btn btn-dark" style="float: right">اضافة عميل <i class="fa fa-plus"></i></a>
              </h6>        
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم العميل</th>
                      <th style="font-size: small !important">الرصيد</th>
                      <th style="font-size: small !important">رقم الهاتف</th>
                      <th style="font-size: small !important">الحي</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
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
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
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
                      <td>{{$customer->created_at->format('Y-m-d')}}</td>
                      <td>{{$customer->user->name}}</td>
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

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <!-- Delete Modal -->
      <div class="modal fade modal" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                  <p class="text-center">
                    هل انت متأكد من حذف العميل؟
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" style="float:right">نعم, حذف</button>
                  <button type="button" class="btn btn-success" data-dismiss="modal" style="float:right">لا, الغاء</button>
                </div>
              </form>
        
            </div>
          </div>
        </div>
      <!-- Delete Modal -->
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
  <script>
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/customers/' + id
       $('#deleteModel').modal('show')
    }
  </script>
@endsection
  
