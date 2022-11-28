@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-10" style="float:left;text-align:right">
          <h3 class="text-white">بيانات التبرع</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
          <a href="{{route('donations.edit',$donation->id)}}" class="btn btn-dark"><span class="fa fa-edit"></span> تعديل</a>
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
                <label class="form-control-label" for="input-username">الوصف / البيان</label>
                <h4 style="color:#f5365c">{{$donation->description}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">التاريخ</label>
                <h4 style="color:#f5365c">{{$donation->ddate}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">المستفيد</label>
                <h4 style="color:#f5365c">{{$donation->to?$donation->to:"لا يوجد"}}</h4>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">ملاحظات</label>
                <h4 style="color:#f5365c">{{$donation->comments?$donation->comments:"لا يوجد"}}</h4>
              </div>
            </div>
            <div class="col-lg-12">
              <input type="hidden" name="count" id="count">
              <table class="responsive table col-lg-12" style="margin: auto">
                <thead>
                  <th>اسم الصنف</th>
                  <th>الكمية</th>
                </thead>
                <tbody id="tbody">
                  @foreach ($donation->items as $item)
                      <tr>
                        <td>{{$item->item->name}}</td>
                        <td>{{$item->quantity}}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                @if (!empty($donation->img))
                  <img src="{{asset('img/donations/'.$donation->img)}}" width="100%" alt="">
                @endif
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
