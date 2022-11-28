@extends('layouts.masterPage_dashboard')


@section('content')
              <div class="col-xl-8 order-xl-1" style="margin: auto;margin-top:40px">
                <div class="card">
                  <div class="card-header">
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h3 class="mb-0 text-white">تعديل بيانات الصنف</h3>
                      </div>
                      <div class="col-4 text-right">
                        
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                   @if (!empty($district))
                  <form class="customer" method="POST" action="{{ route('districts.update', $district->id) }}" enctype = "multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-username">اسم الحي</label>
                            <input type="text"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="اكتب اسم الحي" {{$district->name}} required>
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
                            <option value="1" @if($district->group_id == 1) selected @endif>المجموعة الأولى</option>
                            <option value="2" @if($district->group_id == 2) selected @endif>المجموعة الثانية</option>
                            <option value="3" @if($district->group_id == 3) selected @endif>المجموعة الثالثة</option>
                            <option value="4" @if($district->group_id == 4) selected @endif>المجموعة الرابعة</option>
                            <option value="5" @if($district->group_id == 5) selected @endif>المجموعة الخامسة</option>
                            <option value="6" @if($district->group_id == 6) selected @endif>المجموعة السادسة</option>
                            <option value="7" @if($district->group_id == 7) selected @endif>المجموعة السابعة</option>
                            <option value="8" @if($district->group_id == 8) selected @endif>المجموعة الثامنة</option>
                            <option value="9" @if($district->group_id == 9) selected @endif>المجموعة التاسعة</option>
                            <option value="10" @if($district->group_id == 10) selected @endif>المجموعة العاشرة</option>
                            </select>
                            @error('group_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-4" />
                  </form>
                  @endif
                </div>
              </div>

            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  
@endsection
