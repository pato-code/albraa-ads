@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="mb-3">
            <h2 class="text-center">الإعلانات</h2>
            @if(isset($_GET['message']))
                <div class="alert alert-{{$_GET['class']}}">
                    {{$_GET['message']}}
                </div>
            @endif
            <a href="{{url('/admin/add')}}" style="margin-left: 100%; font-size: 18px;">
                <button class="btn btn-success">

                    إضافه إعلان جديد

                </button>
            </a>
        </div>
        @forelse($ads as $ad)
            <div class="card mb-2">
                <div class="card-header text-right">
                    إعلان بتاريخ :{{$ad->created_at->toDateString()}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-right">
                            {{$ad->body}}
                        </div>
                        <div class="media col-md-8 text-left">
                            <div class="media-body">
                                <video style="width: 100%;" src="{{asset('video/' .  $ad->viedo)}}" autobuffer autoloop loop controls
                                       poster="{{asset('video.png')}}"></video>
                                {{--<iframe width="560" height="315" src="{{asset('video/' .  $ad->viedo)}}" frameborder="0"--}}
                                {{--allowfullscreen></iframe>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <a href="{{url('/admin/'.$ad->id.'/edit')}}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <button class="btn btn-danger" onclick="del('{{ $ad->id }}','{{url('/admin')}}');">Delete
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                لا يوجد إعلانات
            </div>
        @endforelse
        <script src="{{asset ('js/jquery.js')}}"></script>
        <script type="application/javascript">
            function del(id, url) {
                if (confirm('خل أنت متأكد من مسح هذا الإعلان ؟')) {
                    var url = url + '/' + id + '/delete';
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (data) {
                            if (data.error) {
                                window.location.replace("/admin?message=تم الحذف بنجاح&class=danger");
                            }
                        }
                    });
                }
            }
        </script>

    </div>

@endsection