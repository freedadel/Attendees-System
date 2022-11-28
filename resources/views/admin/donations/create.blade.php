@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة تبرع جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form id="target">
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="name">الصنف</label>
                <input type="text" class="autocomplete form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسم الصنف"  required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-5">
              <div class="form-group">
                <label class="form-control-label" for="quantity">الكمية</label>
                <input type="number" minlength="0.00" maxlength="1000000.00" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="اكتب الكمية" required>
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-2">
              <div class="form-group">
                <label class="form-control-label" for="1">&nbsp;</label><br>
                <button type="submit" class="btn btn-primary" class="form-control"><span class="fa fa-plus"></span> اضافة</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <hr>
      <form class="user" method="POST" action="{{ route('donations.store') }}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <input type="hidden" name="count" id="count">
            <table class="responsive table col-lg-10" style="margin: auto">
              <thead>
                <th>اسم الصنف</th>
                <th>الكمية</th>
                <th>اجراء</th>
              </thead>
              <tbody id="tbody">
                
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="ddate">تاريخ التبرع</label>
                <input type="date"  class="form-control @error('ddate') is-invalid @enderror" id="ddate" name="ddate">
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
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="اكتب الوصف او البيان">
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="customer">المستفيد (اختياري)</label>
                <input type="text" class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer" placeholder="اكتب المستفيد">
                @error('customer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="comments">ملاحظات (اختياري)</label>
                <input type="text" class="form-control @error('comments') is-invalid @enderror" id="comments" name="comments" placeholder="اكتب تعليقك">
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
                <label class="form-control-label" for="img">ارفاق صورة (اختياري)</label>
                <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
                @error('img')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
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
    </div>
  </div>
</div>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  var count = 0;
  
  $( "#target" ).submit(function( event ) {
    
    count = count + 1;
    document.getElementById("count").value = count;
    name = document.getElementById("name").value;
    quantity = document.getElementById("quantity").value;
    var inner = '<tr id="tr-'+count+'-">'+
                    '<td>'+name+'</td>'+
                    '<input type="hidden" name="name'+count+'" id="name'+count+'" value="'+name+'">'+
                    '<td>'+
                      '<div id="quantity'+count+'">'+quantity+'</div>'+
                      '<input type="hidden" name="quantity'+count+'" id="quantity'+count+'" value="'+quantity+'">'+
                    '</td>'+
                    '<td>'+
                      '<a href="#" onclick="removeItem('+count+')" style="margin: 5px;font-size:small"><i class="fa fa-times text-danger"></i></a>'+
                    '</td>'+
                  '</tr>';
      $( "#tbody" ).append(inner);
      document.getElementById("quantity").value = "";
      document.getElementById("name").value = "";
      event.preventDefault();
    });
  
  function removeItem(trnum){
    var myobj = document.getElementById("tr-"+trnum+"-");
    myobj.remove();
  }
 
</script>
<script>
  var availableTags = <?php echo json_encode($items); ?>;
  var items = <?php echo json_encode($items_all); ?>;
    $( ".autocomplete" ).autocomplete({
    source: availableTags
  });
</script>
@endsection
