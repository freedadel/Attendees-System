@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة صنف جديد</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('items.store') }}" enctype = "multipart/form-data">
        @csrf
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">اسم الصنف</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسم الصنف" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="type">النوع</label>
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                  <option value="1">غسيل</option>
                  <option value="2">كواية</option>
                  <option value="3">مستعجل</option>
                </select>
                @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="price">سعر الصنف</label>
                <input type="text"  class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="اكتب السعر" required>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">صورة الصنف</label>
                <input type="file" class="form-control" name="img" id="img">
                @error('img')
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
