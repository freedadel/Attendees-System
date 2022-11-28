@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-12 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header" style="background-color: rgb(247, 80, 113) !important">
      <div class="row align-items-center">
        <div class="col-10" style="float: right;text-align:right">
          <h3 class=" text-white">الرسائل المُرسلة</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
            <a href="{{ route('Emails.create') }}" class="btn btn-success" style="float: right">رسالة جديدة <i class="fa fa-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <!-- As a link -->
            <a class="navbar-brand" href="{{route('Emails.index')}}" style="width: 100%">
                <nav class="navbar navbar-light shadow-lg mb-2" style="font-size: medium">
                    البريد الوارد<i class="far fa-comment-alt text-success"></i> 
                </nav>
            </a>
            <!-- As a link -->
            <a class="navbar-brand" href="{{route('Emails.outbox')}}" style="width: 100%">
                <nav class="navbar navbar-light shadow-lg mb-2" style="font-size: medium">
                    البريد المُرسل<i class="fas fa-share-square text-danger"></i> 
                </nav>
            </a>
          </div>
          <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr class="row col-12">
                      <th class="col-12" style="font-size: small !important">الرسائل المُرسلة</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    @if (count($emails) > 0)
                    @foreach ($emails as $index => $email)
                    
                    <tr class="row col-12">
                      
                      <td class="col-12">
                        <a href="{{route('Emails.show',$email->id)}}">
                        @if($email->status == 0)
                        <strong class="text-success">{{ $email->from->name }}</strong><br>
                        <strong class="text-blue" style="font-size: smaller">{{ $email->subject }}</strong>
                        @else
                        {{ $email->from->name }}<br>
                        <strong class="text-blue" style="font-size: smaller">{{ $email->subject }}</strong>
                        @endif
                        </a>
                        <button class="btn btn-danger" style="float: left" onclick="handleDelete({{ $email->id }})"><span class="fa fa-trash"></span>  </button>
                      </td>
                    </tr>
                    
                    @endforeach
                    @else
                    <tr >
                        <th colspan="6" class="text-center">لا يوجد بريد</th>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
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
            هل انت متأكد من حذف الرسالة؟
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
@endsection
<script>
function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
      form.action = '/Emails/' + id
       $('#deleteModel').modal('show')
    }
</script>
<script>
  $('#example').dataTable( {
   "pageLength": 100,
   order: [[ 0, "desc" ]]
 } );
</script>