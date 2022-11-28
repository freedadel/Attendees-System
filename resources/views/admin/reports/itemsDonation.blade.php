<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
 @font-face {
  font-family:ARABTYPE;
  src:url("{{ asset('assets/fonts/Questv1.otf')}}");
  
  }
  body {
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
  }
  * {
    font-family:ARABTYPE;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-print-color-adjust: exact !important;
  }
  .page {
      width: 21cm;
      min-height: 29.7cm;
      padding: 2cm;
      margin: 0cm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      
  }
  .subpage {
      padding: 0cm;
      margin-top:-45px;
      
  }
  h5{
    line-height: .7cm !important;
  }
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
  .btn-green{
    background-color: #378b42;
    padding: 10px;
    border-radius: 5px;
    color:#fff;
    border: none;
    font-size: 1rem;
    margin: auto;
    margin-top:5px;
    text-decoration: none;
    display: inline-block;
  }
  .btn-black{
    background-color: #000;
    padding: 10px;
    border-radius: 5px;
    color:#fff;
    border: none;
    font-size: 1rem;
    margin: auto;
    margin-top:5px;
    text-decoration: none;
    display: inline-block;
  }
  .btn-grey{
    background-color: #b3b4b4;
    padding: 10px;
    border-radius: 5px;
    color:#fff;
    border: none;
    font-size: 1rem;
    margin: auto;
    margin-top:5px;
    text-decoration: none;
    display: inline-block;
  }
  @page {
      size: A4;
      margin: 0;
  }
  @media print {
      .page {
          margin: 0;
          padding: 2cm;
          border: initial;
          border-radius: initial;
          width: initial;
          min-height: initial;
          box-shadow: initial;
          background: initial;
          page-break-after: always;
          min-height: 29.6cm;

      }
      .no-print, .no-print *
      {
          display: none !important;
      }
  }
  table, th, td{
    border:solid 1px !important;
    border-collapse: collapse !important;
    font-weight: bold !important;
    font-size: 15px !important;
  }
</style>


<div class="book">
  <div class="page" style="background-image:url({{asset('/img/report3.jpg')}});background-size: 100%;margin-top:0px">
    <div class="subpage">
      <div class="row col-12" style="direction: rtl;margin-top:10px">
        <div class="col-4" style="display: inline-block;text-align:right">
          <img src="{{asset('img/brand.png')}}" width="200px" alt="">
        </div>
        <div class="col-8" style="display: inline-block"><h3 style="text-align: center">تقرير التبرعات</h3>
          <div class="col-xs-12"><h6 style="text-align: center">
            <span> في الفترة من <strong class="text-danger">{{$dateFrom}}</strong> وحتى <strong class="text-danger">{{$dateTo}}</strong></span>
          </h6>
          </div>
        </div>
      </div>
      <hr>
      <div class="row" style="direction: rtl">
        @foreach ($items as $item)
        @if($item->itemsInStock->where('ddate','>=',$dateFrom)->where('ddate','<=',$dateTo)->sum('in') > 0)
        <div class="col-4 pt-1 pb-1">
          <div class="card col-11" style="margin: auto;height:100px">
            <div class="card-header" style="background-color: #55a7c2 !important;color:#fff;">
              <h6 class="text-center">{{$item->name}}</h5>
            </div>
            <div class="card-body">
              @if(auth()->user()->permission == 2)
              <h4 class="text-center">{{$item->itemsInStock->where('ddate','>=',$dateFrom)->where('ddate','<=',$dateTo)->sum('in')}}</h4>
              @else
              <h4 class="text-center">{{$item->itemsInStock->where('ddate','>=',$dateFrom)->where('ddate','<=',$dateTo)->sum('in') * $item->price}} <span style="font-size: small">ريال</span></h4>
              @endif
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>  


<script>
  window.print();
</script>

  
