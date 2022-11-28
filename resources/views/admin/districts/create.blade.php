@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-item-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة حي جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('districts.store') }}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">اسم الحي</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسم الحي" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="group_id">المجموعة</label>
                <select class="form-control @error('group_id') is-invalid @enderror" id="group_id" name="group_id" required>
                <option value="1">المجموعة الأولى</option>
                <option value="2">المجموعة الثانية</option>
                <option value="3">المجموعة الثالثة</option>
                <option value="4">المجموعة الرابعة</option>
                <option value="5">المجموعة الخامسة</option>
                <option value="6">المجموعة السادسة</option>
                <option value="7">المجموعة السابعة</option>
                <option value="8">المجموعة الثامنة</option>
                <option value="9">المجموعة التاسعة</option>
                <option value="10">المجموعة العاشرة</option>
                </select>
                @error('group_id')
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
                <input type="submit" class="btn btn-success form-control" value="حفظ" style="width: 100%">
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
@endsection
