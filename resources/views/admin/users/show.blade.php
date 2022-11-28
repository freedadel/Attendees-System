@extends('layouts.masterPage_dashboard')
<style>
  @media only screen and (max-width: 600px) {
  #first-shape {
    margin-right: 10px  !important;
  }
}
#first-shape {
    margin-right: 70px;
  }
</style>

@section('content')
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4 mt-5" >
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-white" style="font-size: large">ملف المستخدم | User profile</h6>
                </div>
                <div class="card-body row">
                   @if (!empty($user))
                   <div class="col-xl-4 order-xl-2" style="margin: auto">
                    <div class="card card-profile">
                      <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                      <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                          <div class="card-profile-image" style="left: 50%">
                            <a href="#">
                              <img src="{{asset('img/users/'.$user->img)}}" style="width: 120px;height:120px" class="rounded-circle">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                          <a href="{{route('users.edit',$user->id)}}" class="btn btn-secondary"><i class="fa fa-edit text-blue"> تعديل | Edit </i></a>
                        </div>
                      </div>
                      <div class="card-body pt-0 mt-3">
                        <div class="text-center">
                          <h5 class="h3">
                            {{$user->name}}
                          </h5>
                          <div class="h5 font-weight-300">
                            <i class="fa fa-mail"></i>{{$user->email}}
                          </div>
                          <div class="h5 mt-4">
                            @if (!empty($record_checkin))
                              <h4><i class="far fa-clock text-success"></i> Last check in at {{$record->created_at}}</h4>
                            @endif
                          </div>
                          @if (!empty($record))
                            @if ($record->type == 1 && $available_checkout && $available_day)
                            <a href="{{route('users.checkout')}}" class="btn btn-danger"><i class="far fa-clock"></i> Check out</a>
                            @elseif($available_checkin && $available_day)
                            <a href="{{route('users.checkin')}}" class="btn btn-success"><i class="far fa-clock"></i> Check in</a>
                            @endif
                          @elseif($available_checkin && $available_day)
                            <a href="{{route('users.checkin')}}" class="btn btn-success"><i class="far fa-clock"></i> Check in</a>
                          @endif
                          <a href="{{route('users.records')}}" class="btn btn-dark"><i class="far fa-clock"></i> Records</a>
                        </div>
                      </div>
                    </div>
                    </div>
                  @endif
                </div>
              </div>

            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <input type="hidden" id="pageName" value="projectsPage">
@endsection
