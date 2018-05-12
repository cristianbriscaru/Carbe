@extends('layouts.dashboard')
@section('title')
Subscriptions
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
        </ol>
</nav>
    <h2 class="text-center text-info heading mb-5">Subscriptions</h2> 
    <div class="row justify-content-center text-center">
        <div class="col-11 col-md-11 col-lg-10  text-light rounded px-5">
            @if(count($subscriptions))
                @foreach($subscriptions as $subscription)
                    @php
                    
                        $id=array_pull($subscription,'id');
                        $subscription['subscribed']=  \Carbon\Carbon::createFromTimeStamp(strtotime($subscription['subscribed']))->toDateString();
                    @endphp
                    <div class="custom-shadow my-5">
                    <div class="table-responsive">
                        <table class="table table-sm bg-custom rounded">
                            <tbody>
                                <tr>
                            @foreach($subscription as $key => $atribute)
                                @if(fmod($loop->index,4) == 0 && $loop->index != 0)
                                </tr>
                               <tr>
                                @endif
                                <td class="">  {{ucfirst(str_replace("_"," ",$key)).": ".($atribute == 'undefined' || $atribute == 'OTHER'  ? 'Any' : ucfirst(strtolower($atribute))) }} </td>

                            @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" form="{{$id}}" value="Delete" class="btn btn-danger w-50 mb-3">Delete</button>
                        <form method="POST" action=" {{route('subscription.destroy',['subscription' => $id])}} " id="{{$id}}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                    </form>
                    </div> 
                @endforeach
            @else
                <div class="w-100 mx-auto p-5 rounded bg-custom">
                    <h3 class="">No Subscriptions</h3>
                    <hr class="custom-input">
                    <p> Please Subscribe first and you will be able to view them here</p>
                    <p> For more Information on Subscriptions please see our Help page</p>
                    <p class="my-2"><a class="btn btn-light w-50" href="{{ route('help') }}" role="button">Help</a>  </p>

                </div>
            @endif
        </div>
    </div>
@endsection