@extends('layouts.masterPage_dashboard')


@section('content')
<div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-white">اضافة معاملة جديدة</h3>
        </div>
        <div class="col-4 text-right">
          
        </div>
      </div>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{ route('transactions.store') }}" enctype = "multipart/form-data">
        @csrf
        <h6 class="heading-small text-muted mb-4">بيانات المعاملة</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">المعاملة</label>
                <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="حدد المعاملة" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="type">نوع المعاملة</label>
                <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                  <option value="">اختر النوع</option>
                  @foreach ($types as $type)
                  <option value="{{$type->id}}">{{$type->name}}</option>
                  @endforeach
                </select>
                @error('type')
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
                <label class="form-control-label" for="stage">المرحلة</label>
                <select name="stage" class="form-control @error('stage') is-invalid @enderror" id="stage">
                  <option value="">اختر المرحلة</option>
                  @foreach ($stages as $stage)
                  <option value="{{$stage->id}}">{{$stage->name}}</option>
                  @endforeach
                </select>
                @error('stage')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label" for="description">تفاصيل المعاملة</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required></textarea>
              @error('description')
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
              <label class="form-control-label" for="first_date">تاريخ البداية</label>
              <input type="date"  class="form-control @error('first_date') is-invalid @enderror" id="first_date" name="first_date" placeholder="" required>
              @error('first_date')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="comment">تعليق</label>
                <input type="text"  class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" placeholder="اكتب التعليق اذا وجد">
                @error('comment')
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
@endsection
