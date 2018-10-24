@extends('layouts.guest')

@section('content')

    <div class="container" dir="rtl">
        <div class="content">
            @if(!empty($ads))


                @forelse($ads as $ad)
                    <div class="card mb-2">
                        <div class="card-header text-right">
                            إعلان بتاريخ :{{$ad->created_at->toDateString()}}
                            <div class="text-left">بواسطه : {{$ad->Admin->name}}</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-right">
                                    {{$ad->body}}
                                </div>
                                <div class="media col-md-8 text-left">
                                    <div class="media-body">
                                        <video style="width: 100%;" src="{{asset('video/' .  $ad->viedo)}}" autobuffer
                                               autoloop loop controls
                                               poster="{{asset('video.png')}}"></video>
                                        {{--<iframe width="560" height="315" src="{{asset('video/' .  $ad->viedo)}}" frameborder="0"--}}
                                        {{--allowfullscreen></iframe>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                @empty

                @endforelse


            @else
                <div class="alert alert-warning">
                    No Ads Founds
                </div>

            @endif
        </div>
    </div>
@endsection
