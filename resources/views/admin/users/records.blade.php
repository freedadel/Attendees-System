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
                  <h6 class="m-0 font-weight-bold text-white" style="font-size: large">Check in & Check out records</h6>
                </div>
                <div class="card-body row">
                   @if (!empty($records))
                   @foreach ($records as $index => $record)
                      @if ($record->type==1)
                        <?php $checkin = $record->created_at; 
                        $checkin_day = $record->created_at->format('d');
                        ?>
                      @else
                        @if ($checkin_day == $record->created_at->format('d'))
                        <div class="card mt-1 border-left-0 border-top-0 border-bottom-0 rounded-right-0 border-danger border-3 shadow" style="height: 100px;width:100%;direction:ltr;text-align:left">
                          <div class="card-header row bg-dark" style="height: 25px;padding:2px;margin:0px">
                            <h5>Day {{$record->created_at->format('Y-m-d')}}</h5>
                          </div>
                          <div class="card-body row mr-1 ml-1" style="padding: 0px">
                          <div class="col-12" style="display: inline-block">
                            <h5>
                              <a href="#"><i class='fa fa-check-square text-success'></i> Check in {{$checkin->format('H:i:s')}}</a>
                            </h5>
                            <h5>
                              <a href="#"><i class='fa fa-check-square text-danger'></i> Check out {{$record->created_at->format('H:i:s')}}</a>
                            </h5>
                          </div>
                          <!--<div class="col-3 text-center" style="display: inline-block;margin:auto;height:65">
                            <h4 class="text-dark mt-4" style="margin: auto">@if($record->type==1)<i class='fa fa-check-square text-success'></i>@else<i class='fa fa-check-square text-danger'></i>@endif</h6>
                          </div>-->
                          </div>
                          <div class="card-footer row bg-dark" style="height: 25px;padding:2px;margin:0px">
                            <h5 class="text-white"> 
                              Working hours: {{number_format($record->created_at->diffInMinutes($checkin)/60,2,'.')}}
                            </h5>
                          </div>
                        </div> 
                        @endif
                      @endif
                    @endforeach
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
