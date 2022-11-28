@extends('layouts.masterPage_dashboard')


@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">

            <div class="col-lg-8" style="margin: auto">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4 mt-5" style="margin: auto">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-white" style="font-size: large">تعديل المستخدم</h6>
                </div>
                <div class="card-body">
                   @if ($users->count() > 0)
                   @foreach ($users as $user)
                  <form class="user" method="POST" action="{{ route('users.update', $user->id) }}" enctype = "multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="form-group col-md-6">
                      <label class="form-control-label" for="name">الإسم | Name</label>
                      <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}" placeholder="اسم المستخدم">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label class="form-control-label" for="email">البريد الإلكتروني | Email</label>
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}" placeholder="البريد الالكتروني">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label class="form-control-label" for="phone">رقم الهاتف | Phone</label>
                      <input type="phone" class="form-control form-control-user @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$user->phone}}" placeholder="البريد الالكتروني">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label class="form-control-label" for="password">كلمة المرور الجديدة | New Password</label>
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="كلمة المرور">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                      <label for="img" class="col-md-12 col-form-label text-md-right">{{ __('تغيير صورة المستخدم') }}</label>
                      <input style="padding:5px" id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" >
                      @error('img')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                      <input type="submit" class="btn btn-success" style="width: 100%" value="حفظ">
                    </div>
                  </div>
                  </form>
                  @endforeach
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
