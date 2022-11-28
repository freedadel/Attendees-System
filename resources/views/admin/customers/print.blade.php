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
    font-family:Arial, Helvetica, sans-serif;
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
    font-size: 14px !important;
    padding: 2px !important;
  }

  table th{
    background-color: #b3b4b4 !important;
  }
</style>


<div class="book">
  <div class="page" style="background-image:url({{asset('/img/report3.jpg')}});background-size: 100%;margin-top:0px">
    <div class="subpage">
      <div class="row col-12" style="direction: rtl;margin-top:10px">
        <div class="col-4" style="display: inline-block;text-align:right">
          <img src="{{asset('img/brand.png')}}" width="200px" alt="">
        </div>
        <div class="col-8" style="display: inline-block">
          <h3 style="margin-right:30px;margin-top:10px;width:100%"> {{$title}} </strong></h3>
        </div>
      </div>
      <hr>
      <div class="row" style="direction: rtl">
        <div class="table-responsive">
          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
              <tr class="no-border" style="height: 40px"></tr>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">رقم الهاتف</th>
                <th style="font-size: small !important">الحي</th>
                <th style="font-size: small !important">الجنسية</th>
                <th style="font-size: small !important">رقم الهوية/الاقامة</th>
                <th style="font-size: small !important">عدد الأفراد</th>
                <th style="font-size: small !important">رقم الصحة</th>
                <th style="font-size: small !important">ملاحظات</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th style="font-size: small !important">رقم الهاتف</th>
                <th style="font-size: small !important">الحي</th>
                <th style="font-size: small !important">الجنسية</th>
                <th style="font-size: small !important">رقم الهوية/الاقامة</th>
                <th style="font-size: small !important">عدد الأفراد</th>
                <th style="font-size: small !important">رقم الصحة</th>
                <th style="font-size: small !important">ملاحظات</th>
              </tr>
              <tr class="no-border" style="height: 80px"></tr>
            </tfoot>
            <tbody>
              @if (count($customers) > 0)
              @foreach ($customers as $index => $customer)
              <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->addresses->name }}</td>
                <td>{{ $customer->origin }}</td>
                <td>{{ $customer->identity }}</td>
                <td>{{ $customer->numbers }}</td>
                <td>{{ $customer->home_no }}</td>
                <td style="width: 100px">&nbsp;</td>
              </tr>
              @endforeach
              @else
              <tr >
                  <th colspan="6" class="text-center">لا يوجد مستفيدين</th>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  


<script>
  window.print();
</script>

  
