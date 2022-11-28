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
          <h3 class=" text-white">رسالة جديدة</h3>
        </div>
        <div class="col-2" style="float:left;text-align:left">
            
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
            <form class="user" method="POST" action="{{ route('Emails.store') }}" enctype = "multipart/form-data">
              @csrf
              @if(!empty(session()->get('error')))
              <div class="alert alert-danger" id="error-msg" role="alert">
                خطأ في عنوان المرسل إليه
              </div>
              @endif
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="to_id"> المُرسل إليه</label>
                      <input type="text" class="form-control @error('to_id') is-invalid @enderror" id="to_id" name="to_id" placeholder="المُرسل إليه" value="{{session()->get('to_id')}}" required>
                      @error('to_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="subject"> عنوان الرسالة</label>
                      <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="عنوان الرسالة" value="{{session()->get('subject')}}" required>
                      @error('subject')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="msg"> الموضوع</label>
                      <textarea class="form-control @error('msg') is-invalid @enderror" id="editor" name="msg" rows="8">{{session()->get('msg')}}</textarea>
                      @error('msg')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label class="form-control-label" for="attachment">ارفاق ملف</label>
                      <input type="file"  class=" @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                      @error('attachment')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name"> </label>
                      <br>
                      <input type="submit" class="btn btn-success" value="ارسال" style="width:100%">
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
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) , {
        language: {
            // The UI will be English.
            ui: 'en',

            // But the content will be edited in Arabic.
            content: 'ar'
        }
    } )
      .catch( error => {
          console.error( error );
      } );
</script>


<script>
  $("#error-msg").delay(800).fadeOut(5000);
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( "#to_id" ).autocomplete({
    source: <?php echo json_encode($users); ?>
    });
</script>
@endsection
