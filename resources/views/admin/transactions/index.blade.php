@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800" style="margin-top: 20px">المعاملات</h1>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <p class="mb-4" style="display: inline-block;margin-top:20px">
                هنا يمكنك ادارة المعاملات
              </p>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
              <a href="{{ route('transactionStages.index') }}" class="btn btn-danger" style="float: right">اعدادات المراحل <i class="fa fa-cog"></i></a>
              <a href="{{ route('transactionTypes.index') }}" class="btn btn-primary" style="float: right">اعدادات الأنواع <i class="fa fa-cog"></i></a>
              <a href="{{ route('transactions.create') }}" class="btn btn-success" style="float: right">اضافة معاملة <i class="fa fa-plus"></i></a>
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">المعاملة</th>
                      <th style="font-size: small !important">نوع المعاملة</th>
                      <th style="font-size: small !important">المرحلة</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">اضافة بواسطة</th>
                      <th style="font-size: small !important">حالة الطلب</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">المعاملة</th>
                      <th style="font-size: small !important">نوع المعاملة</th>
                      <th style="font-size: small !important">المرحلة</th>
                      <th style="font-size: small !important">تاريخ البداية</th>
                      <th style="font-size: small !important">اضافة بواسطة</th>
                      <th style="font-size: small !important">حالة الطلب</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($transactions) > 0)
                    @foreach ($transactions as $index => $transaction)
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{ $transaction->name }}</td>
                      <td>{{ $transaction->tType->name }}</td>
                      <td>{{ $transaction->tStage->name }}</td>
                      <td>{{$transaction->first_date}}</td>
                      <td>{{$transaction->user->name}}</td>
                      <td>
                        @if($transaction->status == 1)
                        <button class="btn btn-success" onclick="handleComplete({{ $transaction->id }})"><span class="fa fa-check"></span> اكتمال </button>
                        @elseif($transaction->status == 2)
                        <strong class="text-success">مكتمل</strong>
                        @endif
                      </td>
                      <td>
                          <a href="{{route('transactions.show',$transaction->id)}}" class="btn btn-info"><span class="fa fa-eye"></span> عرض</a>
                          <a href="{{route('transactions.edit',$transaction->id)}}" class="btn btn-primary"><span class="fa fa-edit"></span> تعديل</a>
                          <button class="btn btn-danger" onclick="handleDelete({{ $transaction->id }})"><span class="fa fa-trash"></span> حذف </button>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">لا يوجد معاملات</th>
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
              هل انت متأكد من حذف الطلب؟
            </p>
            <input type="hidden" name="prod_id" id="product_id" value="">
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

     <!-- Complete Modal -->
     <div class="modal fade modal" id="completeModel" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">تأكيد الإكتمال</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="GET" id="completeCategoryForm">
            @csrf
            <div class="modal-body">
              <p class="text-center">
                هل انت متأكد من تغيير الحالة الى مكتمل؟
              </p>
              <input type="hidden" name="prod_id" id="product_id" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success" style="float:right">نعم, مكتمل</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float:right">لا, الغاء</button>
            </div>
          </form>
    
        </div>
      </div>
    </div>
  <!-- Complete Modal -->


  @endsection


  <script>
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/transactions/' + id
       $('#deleteModel').modal('show')
    }
    function handleComplete(id) {
        //console.log('star.', id)
       var form = document.getElementById('completeCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/transactions/complete/' + id
       $('#completeModel').modal('show')
    }
  </script>
  
  
