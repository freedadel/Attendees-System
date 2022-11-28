@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-10" style="float:left;text-align:right">
          <h3 class="text-white">بيانات العملية</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
          
        </div>
      </div>
    </div>
    <div class="card-body">
        
        <div class="row">
        <div class="pl-lg-4 col-lg-12">
          <div class="row">
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">نوع العملية</label>
                <h4 style="color:#f5365c">
                  @if($stock->in == 0)
                  <span class="bg-danger" style="padding: 2px;border-radius:5px">عملية سحب</span>
                  @else
                    <span class="bg-success" style="padding: 2px;border-radius:5px">عملية اضافة</span>
                  @endif  
                </h4>
              </div>
            </div>
          </div>
          <div class="row col-lg-12">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">الوصف / البيان</label>
                <h4 style="color:#f5365c">{{$stock->description}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">التاريخ</label>
                <h4 style="color:#f5365c">{{$stock->ddate}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الصنف</label>
                <h4 style="color:#f5365c">
                {{$stock->item->name}}
                </h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الكمية</label>
                <h4 style="color:#f5365c">{{$stock->in==0?$stock->out:$stock->in}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">الاجمالي</label>
                <h4 style="color:#f5365c">{{$stock->in==0?$stock->out*$stock->item->price:$stock->in*$stock->item->price}} ريال</h4>
              </div>
            </div>

          </div>
        </div>
        <hr class="my-4" />
        <!-- Description -->
        </div>

        </div>
    </div>
  </div>
</div>
@endsection
