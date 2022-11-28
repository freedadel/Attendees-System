@extends('layouts.masterPage_dashboard')


@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                المستفيدين المحذوفين
              </h1>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
              
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم المستفيد</th>
                      <th style="font-size: small !important">رقم الهاتف</th>
                      <th style="font-size: small !important">الحي</th>
                      <th style="font-size: small !important">تاريخ الاضافة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">اسم المستفيد</th>
                      <th style="font-size: small !important">رقم الهاتف</th>
                      <th style="font-size: small !important">الحي</th>
                      <th style="font-size: small !important">تاريخ الاضافة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($customers) > 0)
                    @foreach ($customers as $index => $customer)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $customer->name }}</td>
                      <td>{{ $customer->phone }}</td>
                      <td>{{ $customer->addresses->name }}</td>
                      <td>{{$customer->created_at->format('Y-m-d')}}</td>
                      <td>
                          <a href="{{route('customers.show',$customer->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض</a>
                          <button class="btn btn-primary" onclick="handleRestore({{ $customer->id }})"><span class="fas fa-undo-alt"></span> استعادة </button>
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">لا يوجد مستفيدين محذوفين</th>
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
      <div class="modal fade modal" id="restoreModel" tabindex="-1" role="dialog" aria-labelledby="restoreModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">تأكيد الاستعادة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="GET" id="restoreCategoryForm">
                @csrf
                <div class="modal-body">
                  <p class="text-center">
                    هل انت متأكد من استعادة المستفيد؟
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" style="float:right">نعم, استعادة</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right">لا, الغاء</button>
                </div>
              </form>
        
            </div>
          </div>
        </div>
      <!-- Delete Modal -->

  
  <script>
    function handleRestore(id) {
        //console.log('star.', id)
       var form = document.getElementById('restoreCategoryForm')
      // form.action = '/user/restore/' + id
       form.action = '/customers/restore/' + id
       $('#restoreModel').modal('show')
    }
  </script>
  @endsection

 

  
