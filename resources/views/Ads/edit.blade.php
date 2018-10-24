@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="card">
            <h2 class="card-header text-center mb-3">رفع الإعلان</h2>

            <form method="post" action="{{action('AdminController@update' , $ad->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="body" class="col-md-4 col-form-label text-md-right"
                               style="font-size: 18px">الإعلان</label>

                        <div class="col-md-6">
                            <textarea id="body" type="text"
                                      class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"
                                      value="{{ $ad->body }}" required autofocus>
                            </textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="video" class="col-md-4 col-form-label text-md-right" style="font-size: 18px">مقطع الفيديو</label>

                        <div class="col-md-6">
                            <input id="video" type="file"
                                   class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" autofocus>

                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="col-md-6">
                        <input type="submit" class="col-md-offset-2 btn btn-success" style="font-size: 18px;margin-left: -12%;" value="إرفع الإعلان">

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection