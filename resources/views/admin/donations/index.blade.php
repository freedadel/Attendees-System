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
          <form class="row" action="{{route('setDonationsDate')}}" method="POST" style="margin:auto;padding-top:10px">
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
            <h3 style="margin-right:30px;margin-top:10px;width:100%"> ملخص التبرعات في الفترة من  <strong style="color: rgb(245, 86, 86)"> {{$dateFrom}}</strong> وحتى <strong style="color: rgb(245, 86, 86)"> {{$dateTo}}</strong>
            </h3>
          </div>
          @endif
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4 mt-1">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-white" style="display: inline-block;">
                التبرعات
              </h1>
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;display: inline-block">
              @if (auth()->user()->permission ==1 || auth()->user()->permission ==2 || auth()->user()->permission ==4)
              <a href="{{ route('donations.create') }}" class="btn btn-success" style="float: right">اضافة تبرع <i class="fa fa-plus"></i></a>
              @endif
            </h6>
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">الوصف/البيان</th>
                      <th style="font-size: small !important">الأصناف</th>
                      <th style="font-size: small !important">الكمية</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الحالة</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">الوصف/البيان</th>
                      <th style="font-size: small !important">الأصناف</th>
                      <th style="font-size: small !important">الكمية</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">الحالة</th>
                      <th style="font-size: small !important">ادخال بواسطة</th>
                      <th style="font-size: small !important">تعديل</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($donations) > 0)
                    @foreach ($donations as $index => $donation)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $donation->description }}</td>
                      <td>@foreach($donation->items as $index => $item) {{$index==0?$item->item->name:" + ".$item->item->name}} @endforeach</td>
                      <td>{{ $donation->items->sum('quantity') }}</td>
                      <td>{{$donation->ddate}}</td>
                      <td>
                        @if($donation->status == 1)
                          <span class="bg-warning" style="padding: 2px;border-radius:5px">قيد الانتظار</span>
                        @elseif($donation->status == 2)
                          <span class="bg-success" style="padding: 2px;border-radius:5px">تم التأكيد</span>
                        @elseif($donation->status == 3)
                          <span class="bg-danger" style="padding: 2px;border-radius:5px">تم الرفض</span>
                        @endif
                      </td>
                      <td>{{$donation->user->name}}</td>
                      <td>
                          <a href="{{route('donations.show',$donation->id)}}" class="btn btn-success"><span class="fa fa-eye"></span> عرض</a>
                          @if ($donation->status == 1)
                            @if (auth()->user()->permission ==1 || auth()->user()->permission ==2)
                            <a href="{{route('donations.edit',$donation->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
                            <button class="btn btn-danger" onclick="handleDelete({{ $donation->id }})"><span class="fa fa-trash"></span> حذف </button>
                            @elseif (auth()->user()->permission ==2 || auth()->user()->permission ==4)
                            <button class="btn btn-success" onclick="handleApprove({{ $donation->id }})"><span class="fa fa-check-circle"></span> قبول </button>
                            <button class="btn btn-danger" onclick="handleReject({{ $donation->id }})"><span class="fa fa-ban"></span> رفض </button> 
                            @endif
                          @endif
                       </td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="7" class="text-center">لا يوجد تبرعات</th>
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
                    هل انت متأكد من حذف التبرع؟
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

      <!-- Approve Modal -->
      <div class="modal fade modal" id="approveModel" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">تأكيد القبول</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST" id="approveCategoryForm">
              @csrf
              <div class="modal-body">
                <p class="text-center">
                  هل انت متأكد من قبول التبرع؟
                </p>
              </div>
              <div class="col-md-12">
                هل لديك تعليق؟ اكتبه هنا
                <input type="text" name="comments" class="form-control">
              </div>
              
              <input type="hidden" name="status" value="2">
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" style="float:right">نعم, قبول</button>
                <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right">لا, الغاء</button>
              </div>
            </form>
      
          </div>
        </div>
      </div>
    <!-- Approve Modal -->

    <!-- Reject Modal -->
    <div class="modal fade modal" id="rejectModel" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">تأكيد الرفض</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:0px">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST" id="rejectCategoryForm">
            @csrf
            <div class="modal-body">
              <p class="text-center">
                هل انت متأكد من رفض التبرع؟
              </p>
            </div>
            <div class="col-md-12">
              هل لديك تعليق؟ اكتبه هنا
              <input type="text" name="comments" class="form-control">
            </div>
            <input type="hidden" name="status" value="3">
            <div class="modal-footer">
              <button type="submit" class="btn btn-danger" style="float:right">نعم, رفض</button>
              <button type="button" class="btn btn-info" data-dismiss="modal" style="float:right">لا, الغاء</button>
            </div>
          </form>
    
        </div>
      </div>
    </div>
  <!-- Reject Modal -->


  @endsection


  <script>
    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/donations/' + id
       $('#deleteModel').modal('show')
    }

    function handleApprove(id) {
        //console.log('star.', id)
       var form = document.getElementById('approveCategoryForm')
      // form.action = '/user/approve/' + id
       form.action = '/donations-update/' + id
       $('#approveModel').modal('show')
    }

    function handleReject(id) {
        //console.log('star.', id)
       var form = document.getElementById('rejectCategoryForm')
      // form.action = '/user/reject/' + id
       form.action = '/donations-update/' + id
       $('#rejectModel').modal('show')
    }
  </script>
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
  
