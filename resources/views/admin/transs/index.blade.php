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
                العمليات على النظام
              </h1>           
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">التفاصيل</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">بواسطة</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th style="font-size: small !important">التفاصيل</th>
                      <th style="font-size: small !important">التاريخ</th>
                      <th style="font-size: small !important">بواسطة</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @if (count($transs) > 0)
                    @foreach ($transs as $index => $trans)
                    <tr>
                      <td>{{ $index+1 }}</td>
                      <td>{{ $trans->details }}</td>
                      <td>{{ $trans->created_at }}</td>
                      <td>{{$trans->user->name}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">لا يوجد عمليات</th>
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
