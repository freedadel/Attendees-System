@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h1 class="h3 text-white">بيانات المؤسسة</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>المؤسسة</th>
                      <th>الصورة</th>
                      <th>اضافة بواسطة</th>
                      <th>تاريخ النشر</th>
                      <th>تعديل</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @if ($about->count() > 0)
                    @foreach ($about as $index => $about)
                    <tr>
                      <td>{{ $index +1 }}</td>
                      <td>{{$about->name_ar}}</td>
                      <td><img src="{{asset('img\about\\'.$about->img)}}" height="30px" width="30px" /></td>
                      <td>{{$about->user->name}}</td>
                      <td>{{$about->created_at}}</td>
                      <td>
                          <span>
                              <a href="{{ route('About.edit', $about->id) }}" class="btn btn-dark">تعديل <i class="fa fa-edit"></i></a>
                              <a href="{{ route('About.show', $about->id) }}" class="btn btn-success">عرض <i class="fa fa-eye"></i></a>
                          </span>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">
                          <h6 class="m-0 font-weight-bold text-primary text-center">
                          <a href="{{ route('About.create') }}" class="btn btn-success">اضافة بيانات <i class="fa fa-plus"></i></a>
                          </h6>
                        </th>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" id="deleteCategoryForm">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p class="text-center">
            هل انت متأكد من حذف الحساب؟
          </p>
          <input type="hidden" name="prod_id" id="product_id" value="">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" style="float:right">نعم, احذف</button>
          <button type="button" class="btn btn-success" data-dismiss="modal" style="float:right">لا, الغاء</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection


  <script>
  
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/About/' + id
       $('#deleteModel').modal('show')
    }

  
  </script>
  
  
