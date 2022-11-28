@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                الموظفين
              </h1>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
              <a href="{{ route('employees.create') }}" class="btn btn-success" style="float: right">اضافة موظف <i class="fa fa-plus"></i></a>
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم الموظف</th>
                      <th style="font-size: small !important">رقم الهاتف</th>
                      <th style="font-size: small !important">رقم الهوية</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم الموظف</th>
                      <th style="font-size: small !important">رقم الهاتف</th>
                      <th style="font-size: small !important">رقم الهوية</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($employees) > 0)
                    @foreach ($employees as $index => $employee)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $employee->name }}</td>
                      <td>{{ $employee->phone }}</td>
                      <td>{{ $employee->identity }}</td>
                      <td>{{$employee->created_at->format('Y-m-d')}}</td>
                      <td>{{$employee->user->name}}</td>
                      <td>
                          <a href="{{route('employees.show',$employee->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض</a>
                          <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
                          <button class="btn btn-danger" onclick="handleDelete({{ $employee->id }})"><span class="fa fa-trash"></span> حذف </button>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="7" class="text-center">لا يوجد موظفين</th>
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
                    هل انت متأكد من حذف الموظف؟
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

      <!-- Excel Modal -->
      <div class="modal fade modal" id="excelModel" tabindex="-1" role="dialog" aria-labelledby="excelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">اضافة موظفين</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="excelCategoryForm" enctype = "multipart/form-data">
              @csrf
              <div class="modal-body">
                <p class="text-center">
                  الرجاء ارفاق ملف الاكسل حسب النموذج ادناه <br>
                  <a href="{{route('downloadExcel')}}" target="_blank" class="text-center" style="margin: auto">اضغط هنا لتحميل النموذج</a> <br>
                  ملف الموظفين <input type="file" name="excelFile" class="form-control" style="width:50%;display:inline-block;margin: auto">
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
    <!-- Excel Modal -->


  
  <script>
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/employees/' + id
       $('#deleteModel').modal('show')
    }
  </script>
  <script>
    function handleExcel() {
        //console.log('star.', id)
       var form = document.getElementById('excelCategoryForm')
      // form.action = '/user/excel/' + id
       form.action = '/uploadExcel'
       $('#excelModel').modal('show')
    }
  </script>

  @endsection

 

  
