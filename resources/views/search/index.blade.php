@extends('layouts.dashboard')
@section('title')
Searches
@endsection
@section('resources')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Searches</li>
        </ol>
</nav>
    <h2 class="text-center text-info heading mb-5">Saved Searches</h2> 
    <div class="row justify-content-center text-center">
        <div class="col-12 col-md-11 col-lg-10  text-light rounded px-5">
            @if(count($searches))
                @foreach($searches as $search)
                    @php
                        $url=array_pull($search,'url');
                        $id=array_pull($search,'id');
                        $search['saved']=  \Carbon\Carbon::createFromTimeStamp(strtotime($search['saved']))->toDateString();
                    @endphp
                    <div class="custom-shadow my-5">
                    <div class="table-responsive">
                        <table class="table table-sm bg-custom rounded">
                            <tbody>
                                <tr>
                            @foreach($search as $key => $atribute)
                                @if(fmod($loop->index,4) == 0 && $loop->index != 0)
                                </tr>
                               <tr>
                                @endif
                                <td class="">  {{ucfirst(str_replace("_"," ",$key)).": ".($atribute == 'undefined' || $atribute == 'OTHER' ? 'Any' : ucfirst(strtolower($atribute))) }} </td>

                            @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="share-icon py-3 px-5 pb-4">
                        <li class="w-30"><a class="btn btn-info w-100" href="{{$url}}" role="button">Search</a></li> 
                        <li class="w-30"><button type="submit" form="{{$id}}" value="Delete" class="btn btn-danger w-100 ">Delete</button></li>
                    </ul>
                        <form method="POST" action=" {{route('search.destroy',['search' => $id])}} " id="{{$id}}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                    </form>
                    </div> 
                @endforeach
            @else
                <div class="w-100 mx-auto p-5 rounded bg-custom">
                    <h3 class="">No Saved Searches</h3>
                    <hr class="custom-input">
                    <p> Please Save a Search first and you will be able to view them here</p>
                    <p> For more Information on Searches please see our Help page</p>
                    <p class="my-2"><a class="btn btn-light w-50" href="{{ route('help') }}" role="button">Help</a>  </p>

                </div>
            @endif
        </div>
    </div>
@endsection