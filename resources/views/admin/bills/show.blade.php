<style>
  body{
  -webkit-print-color-adjust:exact;
  text-align: center;
}
  @page { size: auto;  margin: 0mm; }
  .btn-red{
    background-color: #f63b44;
    padding: 10px;
    border-radius: 5px;
    color:#fff;
    border: none;
    font-size: 1rem;
    margin: auto;
    margin-top:5px;
    display: inline-block;
  }
  @media print {
    .btn-red{
      display: none !important;
    }
  }
  .dashed-line {
    border: 2px dashed black;
  }
</style>
<a href="{{route('bills.index')}}" class="btn btn-red col-md-1" style="padding: 7px">رجوع</a>
<div style="margin-top: 10px;font-size:large;text-align: center;direction:rtl">
  <div>
    <div style="margin: 10px">
        <h4 style="text-align: center;margin:10px">فاتورة ضريبية مبسطة</h4>
        <h4 style="text-align: center;margin:10px">Simplified Tax Invoice</h4>
        <div style=""><img src="{{asset('img/about/'.$about->img)}}" width="50px" /></div>
        <h4 style="text-align: center;margin:10px">{{$about->name_ar}}</h4>
        <h6 style="text-align: center;margin:0px">{{$about->address_ar}}</h6>
        <hr style="width:70mm"/>
        <h6 style="text-align: center;display:inline-block;margin:0px">رقم الفاتورة:</h6>
        <h6 style="text-align: center;display:inline-block;margin:0px">{{$bill->id}}</h6>
        <h6 style="text-align: center;display:inline-block;margin:0px">:Bill No</h6>
        
        
        <hr style="width:70mm"/>
        <h6 style="text-align: center;display:inline-block;margin:0px">الوقت والتاريخ:</h6>
        <h6 style="text-align: center;display:inline-block;margin:0px">{{$bill->created_at}}</h6>
        <br>
        <h6 style="text-align: center;display:inline-block;margin:0px">الرقم الضريبي:</h6>
        <h6 style="text-align: center;display:inline-block;margin:0px">{{$about->vat_no}}</h6>
        <br>
        <h6 style="text-align: center;display:inline-block;margin:0px">العميل:</h6>
        <h6 style="text-align: center;display:inline-block;margin:0px">{{$bill->customer->name}}</h6>
        <table style="border-collapse: collapse;margin:auto;width:100%;text-align:center;padding:5px" >
          <tr>
            <td>الصنف</td>
            <td>السعر</td>
            <td>الكمية</td>
            <td>المجموع شامل الضريبة</td>
          </tr>
          @foreach ($bill->items as $detail)
          <tr>
            <td>{{$detail->item_name}}</td>
            <td>{{$detail->price}}</td>
            <td>{{$detail->quantity}}</td>
            <td>{{$detail->total}}</td>
          </tr>
          @endforeach
          
          <tr>
            <td colspan="3">المجموع Total </td>
            <td>{{$bill->total+$bill->discount}}</td>
          </tr>
          @if ($bill->discount > 0)
          <tr>
            <td colspan="3">الخصم Discount </td>
            <td>{{$bill->discount}}</td>
          </tr>
          <tr>
            <td colspan="3">الاجمالي بعد الخصم Total </td>
            <td>{{$bill->total}}</td>
          </tr>
          @endif
          <tr>
            <td colspan="3">الضريبة VAT 15% </td>
            <td>{{$bill->vat}}</td>
          </tr>
          <tr>
            <td colspan="3"> الإجمالي شامل الضريبة Total</td>
            <td>{{$bill->totalwvat}}</td>
          </tr>
        </table>
        <hr style="width:70mm"/>
        @if($bill->customer->phone != "0000000000")
          <table style="border-collapse: collapse;margin:auto;width:100%;text-align:center;padding:5px" >
            <tr>
              <td style="border: 1px solid #ddd;"><h5 style="text-align: left;display:inline-block;margin:0px">
                رصيد ما قبل: {{$bill->c_balance_before}}</h5></td>
              <td style="border: 1px solid #ddd;"><h5 style="text-align: left;display:inline-block;margin:0px">
                الرصيد الحالي: {{$bill->c_balance_after}}</h5></td>
            </tr>
          </table>
        @endif
          <h6 style="text-align: left;display:inline-block;margin:0px">المستخدم: {{$bill->user->name}}</h6>
          <hr style="width:70mm"/>
          <h6 style="text-align: left;display:inline-block;margin:0px">{{$about->phone1}}</h6>
          <hr style="width:70mm"/>
          <h6 style="text-align: left;display:inline-block;margin:0px">تشرفنا بكم</h6>
        <!-- Description -->
        <div class="demo" style="display: block;margin-top:2px;margin-bottom:70px"></div>
        <hr class="dashed-line">
        <h1 style="text-align: center;display:inline-block;margin:0px">{{$bill->id}}</h6>
          <table style="border-collapse: collapse;margin:auto;width:100%;text-align:center;padding:5px" >
            <tr>
              <td>الصنف</td>
              <td>السعر</td>
              <td>الكمية</td>
              <td>المجموع شامل الضريبة</td>
            </tr>
            @foreach ($bill->items as $detail)
            <tr>
              <td>{{$detail->item_name}}</td>
              <td>{{$detail->price}}</td>
              <td>{{$detail->quantity}}</td>
              <td>{{$detail->total}}</td>
            </tr>
            @endforeach
          </table>
            <input type="hidden" id="bill_date" value="{{$bill->created_at}}">
            <input type="hidden" id="bill_total" value="{{$bill->totalwvat}}">
            <input type="hidden" id="tax_total" value="{{$bill->vat}}">
          <!-- Description -->
            <input type="hidden" id="supplier_name" value="{{$about->name_ar}}">
            <input type="hidden" id="tax_num" value="{{$about->taxnum}}">
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="{{asset('dist/jquery-qrcode.js')}}"></script>
<script>
  window.print();
</script>
<script>
  var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
  function decimalToHexString(number)
  {
    if (number < 0)
    {
      number = 0xFFFFFFFF + number + 1;
    }

    return number.toString(16).toUpperCase();
  }
  
  function hex_to_ascii(str1)
 {
  var hex  = str1.toString();
  var str = '';
  for (var n = 0; n < hex.length; n += 2) {
    str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
  }
  return str;
 }
  function tlv(tag,svalue){
    var sLength = new TextEncoder().encode(svalue).length;
    var hexSTag = tag.toString(16);
    var hexSLength = sLength.toString(16);
    return hex_to_ascii(hexSTag)+hex_to_ascii(hexSLength)+String(svalue);
  }
  
    $(".demo").qrcode({
    size: 120,
    fill: '#333',
    text:  Base64.encode(tlv(1,document.getElementById('supplier_name').value)+tlv(2,document.getElementById('tax_num').value)+tlv(3,document.getElementById('bill_date').value)+tlv(4,document.getElementById('bill_total').value)+tlv(5,document.getElementById('tax_total').value)),
    mode: 3,
    //label: 'elite fitness',
    fontcolor: '#000',
  });
  $("canvas").css({border:'solid white',});
</script> 