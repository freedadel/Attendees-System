@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block">الأحياء</h1>
              <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
                <a href="{{ route('districts.create') }}" class="btn btn-success" style="float: right">اضافة حي <i class="fa fa-plus"></i></a>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم الحي</th>
                      <th style="font-size: small !important">المجموعة</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم الحي</th>
                      <th style="font-size: small !important">المجموعة</th>
                      <th style="font-size: small !important">تاريخ الانشاء</th>
                      <th style="font-size: small !important">تمت الاضافة بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($districts) > 0)
                    @foreach ($districts as $index => $district)
                    <tr>
                      <td>{{$index +1 }}</td>
                      <td>{{$district->name }}</td>
                      <td>{{$district->group_id}}</td>
                      <td>{{$district->created_at}}</td>
                      <td>{{$district->user->name}}</td>
                      <td>
                          <a href="{{route('districts.edit',$district->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
                          <button class="btn btn-danger" onclick="handleDelete({{ $district->id }})"><span class="fa fa-trash"></span> حذف </button>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="7" class="text-center">لا يوجد احياء</th>
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
              هل انت متأكد من حذف الحي؟
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


  @endsection


  <script>
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/ditricts/' + id
       $('#deleteModel').modal('show')
    }
  </script>
  
  
