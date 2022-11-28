@extends('layouts.masterPage_dashboard')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<style>
  .ck-editor__editable_inline {
      min-height: 170px;
  }
  </style>
  
@section('content')
<div class="col-xl-12 order-xl-1" style="margin: auto;margin-top:40px">
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-10" style="float: right;text-align:right">
          <h3 class=" text-white">تفاصيل الرسالة</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
          <a href="{{ route('Emails.create') }}" class="btn btn-success" style="float: right">رسالة جديدة <i class="fa fa-plus"></i></a>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <!-- As a link -->
            <a class="navbar-brand" href="{{route('Emails.index')}}" style="width: 100%">
                <nav class="navbar navbar-light shadow-lg mb-2" style="font-size: medium">
                    البريد الوارد<i class="far fa-comment-alt text-success"></i> 
                </nav>
            </a>
            <!-- As a link -->
            <a class="navbar-brand" href="{{route('Emails.outbox')}}" style="width: 100%">
                <nav class="navbar navbar-light shadow-lg mb-2" style="font-size: medium">
                    البريد المُرسل<i class="fas fa-share-square text-danger"></i> 
                </nav>
            </a>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header bg-white" style="background-color: white !important">
                  <h6 class="heading-small text-muted mb-4"><span class="text-dark">مُرسل من:</span> {{$email->from->name}} - {{$email->from->email}}
                    <br><br><span class="text-dark">مُرسل إلى:</span> {{$email->to->name}} - {{$email->to->email}}
                    <br><br>{{$email->created_at->diffForHumans()}}
                  </h6>
              </div>
              <div class="card-body">
                  
                  <div class="row">
                  <div class="pl-lg-4 col-lg-12">
                    <div class="row">
                    <div class="row col-lg-12">
                      
                      <div class="col-lg-12">
                        <div class="form-group">
                          <div class="card">
                            <div class="card-header bg-white" style="background-color: white !important">
                              <h4 style="color:#f5365c">{{$email->subject}}</h4>
                            </div>
                            <div class="card-body">
                            <h4 style="color:#232436">{!! $email->msg !!}</h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if(!empty($email->attachment))
                  <hr class="my-4" />
                    <div class="row" style="text-align: center">
                      <div class="col-lg-12">
                        <label class="form-control-label" for="input-city">المرفقات</label>
                        <div class="form-group">
                          @if($email->attachment_type == 1)
                          <video class="col-md-8"  width="100%" controls>
                          <source src="{{asset('attachments/attachment/'.$email->attachment)}}" type="video/mp4" class="col-md-8" >
                          </video>
                          @elseif($email->attachment_type == 2)
                            <img src="{{asset('attachments/attachment/'.$email->attachment)}}" class="col-md-8" width="100%" />
                          @elseif($email->attachment_type == 3)
                          <audio controls>
                            <source src="{{asset('attachments/attachment/'.$email->attachment)}}" type="audio/mpeg">
                          </audio> 
                          @elseif($email->attachment_type == 4)
                          <a href="{{route('getfile2',$email->id)}}" class="col-md-4 btn btn-success d-block px-2 py-3" style="margin: auto">تحميل المرفق</a>
                          @elseif($email->attachment_type == 5)
                          <a href="{{route('getfile2',$email->id)}}" class="col-md-4 btn btn-success d-block px-2 py-3" style="margin: auto;color:#fff">تحميل المرفق</a>
                          @endif
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
                  <span class="heading-medium  text-danger" style="direction: rtl">{{$email->created_at->addHours(3)}}</span>
                  <hr class="my-4" />
                  <a href="{{route('Emails.send',$email->from->email)}}" class="btn btn-primary" style="float: right">الرد على الرسالة <i class="fa fa-reply"></i></a>
                  <!-- Description -->
                  </div>
          
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
