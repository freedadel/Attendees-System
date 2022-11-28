@extends('layouts.masterPage_dashboard')
<style>
  .search-choice span{
    color:#000 !important;
  }
  .search-choice{
    float: right !important;
  }


</style>

@section('content')
<div class="col-xl-11 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة طلب جديد</h3>
        </div>
        <div class="col-4 text-right">
          <button onclick="addDiscount()" class="btn btn-dark" style="float: left"><i class="fa fa-percent"></i> اضافة خصم</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row text-xs-center">
          <div class="col-md-5 card" style="border: none">
          <form class="user" id="billform" method="POST" action="{{ route('bills.store') }}" enctype = "multipart/form-data">
            @csrf
            <div class="col-lg-12">
              
            <input type="hidden" id="count" name="count">
            <input type="hidden" id="discount" name="discount" value="0">
            <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="1">
              <thead>
              <tr>
                <td style="background:#000;color:#fff"><strong style="font-size: small">الصنف</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">الكمية</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">سعر الوحدة</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">الاجمالي</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">#</strong></td>
              </tr>
              </thead>
              <tbody id="tbody">
                
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">الإجمالي</td>
                <td><div id="total"></div></td>
                <input type="hidden" id="totalinput" name="total">
                <td></td>
              </tr>
              <tr>
                <td colspan="3">اجمالي الضريبة</td>
                <td><div id="totalvat"></div></td>
                <input type="hidden" id="totalvatinput" name="totalvat">
                <td></td>
              </tr>
              <tr>
                <td colspan="3" style="background:#000;color:#fff">الاجمالي مع الضريبة</td>
                <td style="background:#000;color:#5fc294;font-size:xx-large"><div id="totalwvat"></div></td>
                <input type="hidden" id="totalwvatinput" name="totalwvat">
                <td style="background:#000;color:#fff"></td>
              </tr>
            </tfoot>
            </table>
            </div>
            <div class="col-lg-12 mt-1">
              <div class="form-group row">
                <input type="text" class="autocomplete form-control col-md-10 @error('phone_name') is-invalid @enderror" id="phone_name" name="phone_name" placeholder="اسم او جوال العميل" required>
                <button onclick="checkCustomer();" type="button" class="col-md-2 btn btn-danger" style="display: inline-block"><i class="fa fa-eye"></i> عرض</button>
                @error('phone_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <table class="table table-bordered" width="100%" cellspacing="1">
              <thead>
              <tr>
                <td style="background:#000;color:#fff"><strong style="font-size: small">العميل</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">الجوال</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">الرصيد</strong></td>
                <td style="background:#000;color:#fff"><strong style="font-size: small;">كشف حساب</strong></td>
              </tr>
              </thead>
              <tbody id="tbody2">
                
            </tbody>
            </table>
            <button type="submit" id="submit" class="btn btn-success mt-1" style="width: 100%;display:none">حفظ</button>
          </form>
          </div>
      </div>
          <div class="col-md-7 row">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs mb-4 col-md-12">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#wash" onclick="tab(1);">غسيل</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#iron" onclick="tab(2);">كواية</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#wi" onclick="tab(3);">مستعجل</a>
                </li>
              </ul>

              <div class="row col-md-12">
                <div class="row col-md-12 tab-pane active" id="wash">
                @foreach ($items->where('group_id',1) as $index => $item)
                <!--<a href="" class="col-xs-6 col-md-2">-->
                <a href="#" onclick="addItem('{{$item->id}}','{{$item->name}}','{{$item->group_id}}','{{$item->price}}');" class="col-md-3 col-xs-6">
                  <div class="card mt-3" style="box-shadow:1px 1px 1rem 6px rgba(185, 174, 181, .3)">
                    <span class="bg-success product-card text-center">{{$item->price}} ريال  </span>
                  <div class="card-header" style="padding: 0;background-color:#fff !important">
                    <img src="{{asset('img/items/'.$item->img)}}" width="100%" height="135px">
                  </div>
                  <div class="card-body" style="height:50px;text-align:center;padding:0.5rem">
                    <strong style="font-size: small;text-align:center">{{ \Illuminate\Support\Str::limit($item->name, 20, $end='..') }}</strong>
                  </div>
                  </div>
                </a>
                @endforeach
                </div>              
                <div class="row col-md-12 tab-pane fade" id="iron" style="display: none">
                  @foreach ($items->where('group_id',2) as $index => $item)
                  <!--<a href="" class="col-xs-6 col-md-2">-->
                  <a href="#" onclick="addItem('{{$item->id}}','{{$item->name}}','{{$item->group_id}}','{{$item->price}}');" class="col-xs-6 col-md-3">
                    <div class="card mt-3" style="box-shadow:1px 1px 1rem 6px rgba(185, 174, 181, .3)">
                      <span class="bg-danger product-card text-center">{{$item->price}} ريال  </span>
                    <div class="card-header" style="padding: 0;background-color:#fff !important">
                      <img src="{{asset('img/items/'.$item->img)}}" width="100%" height="135px">
                    </div>
                    <div class="card-body" style="height:50px;text-align:center;padding:0.5rem">
                      <strong style="font-size: small;text-align:center">{{ \Illuminate\Support\Str::limit($item->name, 20, $end='..') }}</strong>
                    </div>
                    </div>
                  </a>
                  @endforeach
                </div>
                <div class="row col-md-12 tab-pane fade" id="wi" style="display: none">
                  @foreach ($items->where('group_id',3) as $index => $item)
                  <!--<a href="" class="col-xs-6 col-md-2">-->
                  <a href="#" onclick="addItem('{{$item->id}}','{{$item->name}}','{{$item->group_id}}','{{$item->price}}');" class="col-xs-6 col-md-3">
                    <div class="card mt-3" style="box-shadow:1px 1px 1rem 6px rgba(185, 174, 181, .3)">
                      <span class="bg-dark product-card text-center">{{$item->price}} ريال  </span>
                    <div class="card-header" style="padding: 0;background-color:#fff !important">
                      <img src="{{asset('img/items/'.$item->img)}}" width="100%" height="135px">
                    </div>
                    <div class="card-body" style="height:50px;text-align:center;padding:0.5rem">
                      <strong style="font-size: small;text-align:center">{{ \Illuminate\Support\Str::limit($item->name, 20, $end='..') }}</strong>
                    </div>
                    </div>
                  </a>
                  @endforeach
                </div>
            </div>
      </div>
      <!--/.row-->
  </div>
  </div>
</div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset('dist/sweetalert.min.js')}}"></script>
<script>
  /*
  $('#billform').submit(function () {

// Get the Login Name value and trim it
balance = document.getElementById("balance").value;

// Check if empty of not
if (balance  < totalwvat) {
  swal("خطأ", "لا يوجد رصيد كافي", "error");
    return false;
}
});
*/
</script>
<script>
  function addDiscount(){
    swal("ادخل قيمة الخصم", {
      dangerMode: true,
        content: "input",
        value: '0',
    })
    .then((value) => {
      if(value > 0){
        discount = value/1.15;
        total -= discount;
        totalvat = total*0.15;
        totalwvat = total+totalvat;
      
      var inner3 = '<tr>'+
                    '<td colspan="3">خصم</td>'+
                    '<td>'+
                      '<div>'+parseFloat(discount).toFixed(2)+'</div>'+
                    '</td>'+
                    '<td>'+
                    '</td>'+
                  '</tr>';
      $( "#tbody" ).append(inner3);
      $( "#total" ).empty().append(parseFloat(total).toFixed(2));
      $( "#totalvat" ).empty().append(parseFloat(totalvat).toFixed(2));
      $( "#totalwvat" ).empty().append(parseFloat(totalwvat).toFixed(2));
      document.getElementById("discount").value = parseFloat(discount).toFixed(2);
      document.getElementById("totalinput").value = parseFloat(total).toFixed(2);
      document.getElementById("totalvatinput").value = parseFloat(totalvat).toFixed(2);
      document.getElementById("totalwvatinput").value = parseFloat(totalwvat).toFixed(2); 
      }
    });
  }
  function checkCustomer(){
    str = document.getElementById("phone_name").value;
    const before_ = str.substring(0, str.indexOf(':'));
    arr_index = customers_all.map((el) => el.phone).indexOf(before_);
    balance_index = customers_balance.map((bl) => bl.phone).indexOf(before_);
    try{
      customer_id = customers_all[arr_index].id;
    customer_name = customers_all[arr_index].name;
    phone = customers_all[arr_index].phone;
    balance = customers_balance[arr_index].balance;

    var inner2 = '<tr>'+
                    '<td>'+customer_name+'</td>'+
                    '<input type="hidden" name="customer_name" id="customer_name" value="'+customer_name+'">'+
                    '<input type="hidden" name="customer_id" id="customer_id" value="'+customer_id+'">'+
                    '<td>'+
                      '<div id="phone1">'+phone+'</div>'+
                      '<input type="hidden" name="phone" id="phone" value="'+phone+'">'+
                    '</td>'+
                    '<td>'+
                      '<div id="balance">'+balance+'</div>'+
                      '<input type="hidden" name="balance" id="balance" value="'+balance+'">'+
                    '</td>'+
                    '<td>'+
                      '<button onclick="balanceRecord()" class="btn btn-success" type="button" style="margin: 5px"><i class="fa fa-eye"></i> عرض </button>'+
                    '</td>'+
                  '</tr>';
      $( "#tbody2" ).append(inner2);
      document.getElementById("submit").style.display = "block";
    }catch{
      swal("خطأ", "تأكد من رقم الجوال", "error");
    }
    
  }
</script>
<script>
  count = 0;
  price_before = 0;
  price_after = 0;

  rtotal = 0;
  rtotalvat = 0;
  rtotalwvat = 0;

  total = 0;
  totalvat = 0;
  totalwvat = 0;
  function addItem(id,item_name,group,price1){
    if(group==1){
      item_name = item_name + " (غ)"
    }else if(group == 2){
      item_name = item_name + " (ك)"
    }else if(group == 3){
      item_name = item_name + " (م)"
    }
    count = count + 1;
    document.getElementById("count").value = count;
    //alert(id);
    swal("الكمية", {
      content: "input",
    })
    .then((value) => {
      if(value > 0){
      //swal(`You typed: ${value}`);
      price_before = parseFloat(price1/1.15).toFixed(2);
      price_after = price1;

      rtotalwvat = parseFloat(price_after * value).toFixed(2);
      rtotal = parseFloat(price_before * value).toFixed(2);
      rtotalvat = parseFloat(rtotalwvat - rtotal).toFixed(2);

      total += parseFloat(rtotal);
      totalvat += parseFloat(rtotalvat);
      totalwvat += parseFloat(rtotalwvat);
      
      var inner = '<tr id="tr-'+count+'-">'+
                    '<td>'+item_name+'</td>'+
                    '<input type="hidden" name="item_name'+count+'" id="item_name'+count+'" value="'+item_name+'">'+
                    '<input type="hidden" name="item_id'+count+'" id="item_id'+count+'" value="'+id+'">'+
                    '<td>'+
                      '<div id="qty'+count+'">'+value+'</div>'+
                      '<input type="hidden" name="quantity'+count+'" id="quantity'+count+'" value="'+value+'">'+
                    '</td>'+
                    '<td>'+
                      '<div id="price_before'+count+'">'+price_before+'</div>'+
                      '<input type="hidden" name="price_before'+count+'" id="price_before'+count+'" value="'+price_before+'">'+
                      '<input type="hidden" name="price_after'+count+'" id="price_after'+count+'" value="'+price_after+'">'+
                    '</td>'+
                    '<td>'+
                      '<div>'+rtotalwvat+'</div>'+
                      '<input type="hidden" name="rtotal'+count+'" id="rtotal'+count+'" value="'+rtotal+'">'+
                      '<input type="hidden" name="rtotalvat'+count+'" id="rtotalvat'+count+'" value="'+rtotalvat+'">'+
                      '<input type="hidden" name="rtotalwvat'+count+'" id="rtotalwvat'+count+'" value="'+rtotalwvat+'">'+
                    '</td>'+
                    '<td>'+
                      '<button onclick="removeItem('+count+')" class="btn btn-danger" type="button" style="margin: 5px"><i class="fa fa-trash"></i></button>'+
                    '</td>'+
                  '</tr>';
      $( "#tbody" ).append(inner);
      $( "#total" ).empty().append(parseFloat(total).toFixed(2));
      $( "#totalvat" ).empty().append(parseFloat(totalvat).toFixed(2));
      $( "#totalwvat" ).empty().append(parseFloat(totalwvat).toFixed(2));

      document.getElementById("totalinput").value = parseFloat(total).toFixed(2);
      document.getElementById("totalvatinput").value = parseFloat(totalvat).toFixed(2);
      document.getElementById("totalwvatinput").value = parseFloat(totalwvat).toFixed(2); 
      }
    });
    
  }
  function removeItem(trnum){
        
    var rtotal = document.getElementById("rtotal"+trnum+"").value;
    var rtotalvat = document.getElementById("rtotalvat"+trnum+"").value;
    var rtotalwvat = document.getElementById("rtotalwvat"+trnum+"").value;
    var myobj = document.getElementById("tr-"+trnum+"-");
    

    total -= parseFloat(rtotal).toFixed(2);
    totalvat -= parseFloat(rtotalvat).toFixed(2);
    totalwvat -= parseFloat(rtotalwvat).toFixed(2);

      $( "#total" ).empty().append(parseFloat(total).toFixed(2));
      $( "#totalvat" ).empty().append(parseFloat(totalvat).toFixed(2));
      $( "#totalwvat" ).empty().append(parseFloat(totalwvat).toFixed(2));

      document.getElementById("totalinput").value = parseFloat(total).toFixed(2);
      document.getElementById("totalvatinput").value = parseFloat(totalvat).toFixed(2);
      document.getElementById("totalwvatinput").value = parseFloat(totalwvat).toFixed(2);

    myobj.remove();
  }
</script>
<script>
function tab(id){
  if(id==1){
    document.getElementById("wash").style.display = "flex";
    document.getElementById("iron").style.display = "none";
    document.getElementById("wi").style.display = "none";
  }else if(id==2){
    document.getElementById("wash").style.display = "none";
    document.getElementById("iron").style.display = "flex";
    document.getElementById("wi").style.display = "none";
  }else{
    document.getElementById("wash").style.display = "none";
    document.getElementById("iron").style.display = "none";
    document.getElementById("wi").style.display = "flex";
  }
}
</script>
<script>
  var customers_all = <?php echo json_encode($customers_all); ?>;
  var customers_balance = <?php echo json_encode($customers_balance); ?>;
  var availableTags = <?php echo json_encode($customers); ?>;
    $( ".autocomplete" ).autocomplete({
    source: availableTags
  });

</script>
@endsection