<style>
  body{
  -webkit-print-color-adjust:exact;
}
  @page { size: auto;  margin: 0mm; }

</style>
<div style="margin-top: 10px;font-size:large;text-align: center;direction:rtl">
  <div>
    <div>
        <div style=""><img src="{{asset('img/about/'.$about->img)}}" width="50px" /></div>
        <h4 style="text-align: center;margin:10px">{{$about->name_ar}}</h4>
        <h6 style="text-align: center;margin:0px">{{$about->address_ar}}</h6>
        <h4 style="text-align: center;margin:0px">سند قبض</h4>
        <hr style="width:70mm"/>
        <h6 style="text-align: right;display:inline-block;margin:0px">رقم السند:</h6>
        <h6 style="text-align: right;display:inline-block;margin:0px">{{$sanad->id}}</h6>        
        
        <hr style="width:70mm"/>
        <h6 style="text-align: right;display:inline-block;margin:0px">التاريخ:</h6>
        <h6 style="text-align: right;display:inline-block;margin:0px">{{$sanad->created_at->format('Y-m-d')}}</h6>
        <br>
        <h6 style="text-align: right;display:inline-block;margin:0px">لقد استلمنا من السيد/ة {{$sanad->customer->name}}
        مبلغ وقدره {{$sanad->total}} ريال. فقط ({{$total}}). وذلك بغرض {{$sanad->describtion}}.
        </h6>
        <br>
        <h6 style="text-align: right;display:inline-block;margin:0px">المستلم:</h6>
        <h6 style="text-align: right;display:inline-block;margin:0px">{{$sanad->user->name}}</h6>
    </div>
  </div>
</div>

<script>
  window.print();
</script>
