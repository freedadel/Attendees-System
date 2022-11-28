@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h3 class="mb-4 text-white" style="display: inline-block;">
                المستخدمين
              </h3>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
              @if(auth()->user()->permission == 1)
              <a href="{{ route('users.create') }}" class="btn btn-success" style="float: right">اضافة مستخدم <i class="fa fa-plus"></i></a>
              @endif
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="font-size: small !important">المستخدم</th>
                      <th style="font-size: small !important">البريد الالكتروني</th>
                      <th style="font-size: small !important">الصورة</th>
                      <th style="font-size: small !important">اضافة بواسطة</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style="font-size: small !important">المستخدم</th>
                      <th style="font-size: small !important">البريد الالكتروني</th>
                      <th style="font-size: small !important">الصورة</th>
                      <th style="font-size: small !important">اضافة بواسطة</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($users) > 0)
                    @foreach ($users as $index => $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td><img src="{{asset('img\users\\'.$user->img)}}" height="30px" width="30px" /></td>
                      <td>{{ $user->user->name }}</td>
                      <td>{{$user->created_at->format('Y-m-d')}}</td>
                      <td>
                          <a href="{{route('users.show',$user->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض </a>
                          <a href="{{route('users.edit',$user->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل </a>
                          @if (auth()->user()->permission == 1)
                          <button class="btn btn-danger" onclick="handleDelete({{ $user->id }})"><span class="fa fa-trash"></span> حذف </button>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">لا يوجد مستخدمين</th>
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
              هل انت متأكد من حذف المستخدم؟
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
<div class="modal fade" id="resetModel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">اعادة تعيين كلمة المرور</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="resetCategoryForm">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <h5 class="text-center">
              هل انت متأكد من اعادة تعيين كلمة المرور؟
            </h5>
            <input type="hidden" name="prod_id" id="product_id" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">لا, الغاء</button>
            <button type="submit" class="btn btn-info">نعم, اعادة تعيين</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- UnPublish Modal -->
  <div class="modal fade" id="unpublishModel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">تغيير الصلاحيات</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" id="unpublishCategoryForm">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <h5 class="text-center">
             هل انت متأكد من تحويل الصلاحيات؟
            </h5>
            <input type="hidden" name="prod_id" id="product_id" value="">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" style="float:right">نعم, بدّل الصلاحيات</button>
            <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right">لا, الغاء</button>
          </div>
        </form>

      </div>
    </div>
  </div>

<!-- Publish Modal -->
<div class="modal fade" id="publishModel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">تغيير الصلاحيات</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="publishCategoryForm">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <h5 class="text-center">
            هل انت متأكد من تغيير الصلاحيات؟
          </h5>
          <input type="hidden" name="prod_id" id="product_id" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" style="float:right">نعم, بدّل الصلاحيات</button>
          <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right">لا, الغاء</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection


  <script>
    swal("Hello");
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/users/' + id
       $('#deleteModel').modal('show')
    }
  
    function makeEmployee(id) {
        //console.log('star.', id)
       var form = document.getElementById('unpublishCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/users/makeEmployee/' + id
       $('#unpublishModel').modal('show')
    }
    function makeEngineer(id) {
        //console.log('star.', id)
       var form = document.getElementById('publishCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/users/makeEngineer/' + id
       $('#publishModel').modal('show')
    }
    function handleReset(id) {
        //console.log('star.', id)
      var form = document.getElementById('resetCategoryForm')
      // form.action = '/user/delete/' + id
      form.action = '/users/reset-password/' + id
      $('#resetModel').modal('show')
    }
  </script>
  
  
