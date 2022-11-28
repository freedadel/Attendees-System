@extends('layouts.masterPage_dashboard')
<style>
  .search-choice span{
    color:#000 !important;
  }
  .search-choice{
    float: right !important;
  }
  .chosen-container{
    width: 100% !important;
  }
</style>

@section('content')
              <div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
                <div class="card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="mb-0 text-white">تعديل بيانات الطلب</h3>
                      </div>
                      <div class="col-4 text-right">
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                   @if (!empty($order))
                  <form class="order" method="POST" action="{{ route('orders.update', $order->id) }}" enctype = "multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h6 class="heading-small text-muted mb-4">بيانات الطلب</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="ddate">تاريخ الطلب</label>
                            <input type="date"  class="form-control @error('ddate') is-invalid @enderror" id="ddate" name="ddate" value="{{$order->ddate}}">
                            @error('ddate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="description">الوصف/البيان</label>
                            <input type="text"  class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="اكتب بيان او وصف الطلب" value="{{$order->description}}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="districts">الأحياء</label>
                            <select data-placeholder="ادخل اسم الحي" multiple class="chosen-select form-control" name="districts[]">
                              @foreach ($districts as $district)
                                @foreach ($order->districts as $odistrict)
                                <option value="{{$district->name}}" @if($district->id == $odistrict->district_id) selected @endif>{{$district->name}}</option>
                                @endforeach
                              @endforeach
                            </select>
                            @error('districts')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="customers">عدد المستفيدين (اختياري)</label>
                            <input type="number" class="form-control @error('customers') is-invalid @enderror" id="customers" name="customers" placeholder="اكتب عدد المستفيدين" value="{{$order->customers}}">
                            @error('customers')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="comments">ملاحظات (اختياري)</label>
                            <input type="text" class="form-control @error('comments') is-invalid @enderror" id="comments" name="comments" placeholder="اكتب الملاحظات" value="{{$order->comments}}">
                            @error('comments')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name"> </label>
                            <br>
                            <input type="submit" class="btn btn-success" value="حفظ" style="width: 100%">
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4" />
                  </form>
                  <div class="col-lg-12">
                    <label class="form-control-label" for="img">تعديل أصناف الطلب</label>
                    <table class="responsive table col-lg-12" style="margin: auto">
                      <thead>
                        <th>اسم الصنف</th>
                        <th>الكمية</th>
                        <th>اجراء</th>
                      </thead>
                      <tbody id="tbody">
                        @foreach ($order->items as $item)
                          <form action="{{route('orders.itemUpdate',$item->id)}}" method="POST">
                          @csrf
                          <tr>
                            <td>{{$item->item->name}}</td>
                            <td><input type="number" class="form-control" name="quantity" value="{{$item->quantity}}"></td>
                            <td><button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> حفظ</button>
                              <button type="button" class="btn btn-danger" onclick="handleDelete({{ $item->id }})"><span class="fa fa-trash"></span> حذف </button>
                            </td>
                          </tr>
                          </form>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  @endif
                </div>
              </div>

            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
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
                هل انت متأكد من حذف الصنف من الطلب؟
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
  <script>
    $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
    });

    function handleDelete(id) {
        //console.log('star.', id)
       var form = document.getElementById('deleteCategoryForm')
      // form.action = '/user/delete/' + id
       form.action = '/orders-items/' + id
       $('#deleteModel').modal('show')
    }
  </script>
@endsection
