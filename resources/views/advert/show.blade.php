@extends('layouts.master')
@section('title')
Car Advert: {{$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Advert</li>
        </ol>
</nav> 
<div class="container ">
    <div class="row justify-content-center"> 
        <div class="col-12  col-xl-9">
            <h2 class="text-center text-info">{{$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant}}</h2>
            <h3 class="text-center text-secondary mt-5 small-h2 text-truncate"><strong>{{"£".$advert->price." - "}}</strong>{{$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant." ".$advert->transmission." ".$advert->colour." ".$advert->registration_year}} </h3> 
            @if(count($advert->photos))

                        <b-carousel
                            style="text-shadow: 1px 1px 2px #333;"
                            controls
                            indicators
                            background="#ababab"
                            :interval="2000"
                            img-width="700"
                            img-height="500">

                            @foreach($advert->photos->pluck('path') as $photo)
                                <b-carousel-slide>
                                    <img slot="img" class="d-block img-fluid w-100" width="700" height="500" src="http://carbe.co.uk/storage/{{$photo}}" alt="Vehicle">
                                </b-carousel-slide>
                            @endforeach

                        </b-carousel>

            @endif 
            <div class="text-center my-3">
                <social-sharing url="http://carbe.co.uk/car/{{$advert->id}}"
                    title="Carbe Car Network"
                    description="Car Advert {{$advert->model->make->make_name." ".$advert->model->model_name}}"
                    quote="£{{$advert->price." - ".$advert->model->make->make_name." ".$advert->model->model_name." ".$advert->variant." ".$advert->transmission." ".$advert->colour." ".$advert->registration_year}}"
                    hashtags="carbe,car,adverts"
                    twitter-user="Carbe_social"
                    inline-template>
                <div>
                    <ul class="list-inline px-5 text-center share-icon ">
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Facebook">
                            <network network="facebook">
                                <img src="{{asset ('media/app/if_facebook_circle_294710.png') }}" alt="Facebook" class="img-fluid share-icon" height="36" width="36">
                            </network>
                        </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Linkedin">
                            <network network="linkedin">
                                    <img src="{{asset ('media/app/if_linkedin_circle_294706.png') }}" alt="Linkedin" class="img-fluid share-icon" height="36" width="36">
                            </network>
                        </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Google+">
                                <network network="googleplus">
                                        <img src="{{asset ('media/app/if_google_circle_294707.png') }}" alt="Google Plus" class="img-fluid share-icon" height="36" width="36">
                                </network>
                            </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Skype">
                            <network network="skype">
                                    <img src="{{asset ('media/app/if_skype_287531.png') }}" alt="Skype" class="img-fluid share-icon" height="36" width="36">
                            </network>
                        </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share via SMS">
                                <network network="sms">
                                        <img src="{{asset ('media/app/if_imessage_287572.png') }}" alt="Sms" class="img-fluid share-icon" height="36" width="36">
                                </network>
                            </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Twitter">
                            <network network="twitter">
                                <img src="{{asset ('media/app/if_twitter_circle_294709.png') }}" alt="Twitter" class="img-fluid share-icon" height="36" width="36">
                            </network>
                        </li>
                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share on Whatsapp">
                            <network network="whatsapp">
                                    <img src="{{asset ('media/app/if_whatsapp_287520.png') }}" alt="Whatsapp" class="img-fluid share-icon" height="36" width="36">
                            </network>
                        </li>

                        <li class="list-inline-item mx-1 btn btn-light bg-white border-0" v-b-tooltip.hover title="Share via Email">
                                <network network="email">
                                        <img src="{{asset ('media/app/if_mail_287559.png') }}" alt="Email" class="img-fluid share-icon" height="36" width="36">
                                </network>
                            </li>
                        <save-favorite advert="{{$advert->id}}"></save-favorite>
                    </ul>
                </div>
                </social-sharing>

            </div>
            <div class="row bg-custom">
            <div class="col-8 pr-1">
            <section class="p-2 text-light">               
                <article>
                <h4 class="mt-3">Top Specs</h4>   
                    <ul class="list-inline mt-2 rounded bg-light text-info custom-shadow">
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Registration Year" class="advert-list" src="{{ asset('media/app/calendar.png') }}" width="32px" height="32px" alt="Calendar" >{{ $advert->registration_year }}</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Mileage" class="advert-list" src="{{ asset('media/app/mileage.png') }}" width="32px" height="32px" alt="Car Dashboard">{{ $advert->mileage }} mi</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Fuel Type" class="advert-list" src="{{ asset('media/app/pump.png') }}" width="32px" height="32px" alt="Petrol Pump">{{ $advert->fuel_type }}</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Number of Doors" class="advert-list" src="{{ asset('media/app/doors.png') }}" width="32px" height="32px" alt="Car Doors">{{ $advert->doors }} DOORS</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Engine Size" class="advert-list" src="{{ asset('media/app/engine.png') }}" width="32px" height="32px" alt="Car Engine">{{ $advert->engine_size }} CC</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Number of Seats" class="advert-list" src="{{ asset('media/app/seats.png') }}" width="32px" height="32px" alt="Car Seats">{{ $advert->seats }} SEATS</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Gearbox Type" class="advert-list" src="{{ asset('media/app/gearbox.png') }}" width="32px" height="32px" alt="Car Gearbox">{{ $advert->transmission }}</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Body Type" class="advert-list" src="{{ asset("media/app/".$advert->body.".png") }}" width="32px" height="32px" alt="Car Body">{{ $advert->body }}</li>
                        <li class="list-inline-item advert-list"><img v-b-tooltip.hover title="Fuel Consumption" class="advert-list" src="{{ asset('media/app/CONSUMPTION.png') }}" width="32px" height="32px" alt="Oil Canister">{{ $advert->combined_consumption }} mpg</li>
                        
                    </ul>
                </article>

                <article>
                    <h4>Description</h4>
                    <div class="row p-2 mb-3 align-items-center mx-auto rounded bg-light text-secondary custom-shadow advert-list">
                        <p 
                            @if(strlen($advert->description)>250) 
                                class="p-2 small" 
                            @else
                                class="p-2"
                            @endif
                        >
                            {{$advert->description}}
                        </p>
                    </div>
                </article>
            </section>
            </div>
            <div class="col-4 pl-1 mb-3  p-2">
                    <h4 class="text-center text-light mt-3 mr-2">Overview</h4>
                                <ul class="list-unstyled roundeds p-2 mr-2 bg-light text-info rounded text-justify custom-shadow advert-list">
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">attach_money</i>PRICE : <span class="text-secondary">£{{$advert->price}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">history</i>STATE : <span class="text-secondary">{{$advert->state}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">people_outline</i>OWNERS : <span class="text-secondary">{{$advert->owners}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">build</i>SERVICE : <span class="text-secondary">{{$advert->service}}</span></li>                         
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">account_balance</i>SELLER: <span class="text-secondary text-uppercase">{{$advert->seller->sellertype}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">person_pin_circle</i>TOWN: <span class="text-secondary text-uppercase">{{$advert->seller->town}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">place</i>COUNTY: <span class="text-secondary text-uppercase">{{$advert->seller->county}}</span></li>
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">contact_phone</i>PHONE: <span class="text-secondary text-uppercase">{{$advert->seller->telephone}}</span></li>
                                    @if($advert->seller->sellertype=="trader")
                                    <li class="advert-overview"><i class="material-icons pr-1 advert-list">account_balance</i>SELLER: <span class="text-secondary text-uppercase">{{$advert->seller->business}}</span></li>
                                    <li class="advert-overview text-truncate"><i class="material-icons pr-1 advert-list">language</i>WEBSITE: <span class="text-secondary"><a href="{{$advert->seller->website}}">{{$advert->seller->website}}</a></span></li>
                                    @endif                        
                                </ul>
            </div>
            </div>
            
            <div class="row pt-3 bg-light text-center">
                <div class="col">
                    <button v-b-toggle.specifications type="button" class="btn btn-info w-100">Specifications</button> 
                </div>
                <div class="col">
                    <button v-b-toggle.features type="button" class="btn btn-info w-100">Features</button>
                </div>
                <div class="col">
                    <button v-b-toggle.mot type="button" class="btn btn-info w-100">MOT </button> 
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-12 pb-5">
                    <div role="tablist" class="rounded custom-shadow">
                        <b-collapse id="specifications" visible accordion="details" role="tabpanel">
                            <b-card title="Specifications" class="text-info">
                                <ul class="list-inline text-secondary">
                                    @php
                                        $atributes=$advert->toArray();
                                        $atributes=array_diff_key($atributes,array_flip(['description','mot','photos','seller','model']));
                                    @endphp
                                    
                                    @foreach($atributes as $key => $atribute )
                                    <li class="list-inline-item advert-list h-25 my-2 ml-1"><span class="text-info text-capitalize mr-2">{{str_replace("_"," ",$key)}}</span>{{ucfirst(strtolower($atribute))}}</li>
                                    @endforeach
                                </ul>
                            </b-card>
                        </b-collapse>
                        <b-collapse id="features" accordion="details" role="tabpanel">
                            <b-card title="Features" class="text-info">
                                    @if(count($advert->features))
                                        <ul class="list-inline text-center text-justify text-secondary">    
                                            @foreach($advert->features as $feature)
                                                <li class="list-inline-item advert-list h-25 my-2 ml-1">{{$feature->feature}}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-center text-secondary my-5"> This advert does not have any features</p>
                                    @endif
                            </b-card>
                        </b-collapse>
                        <b-collapse id="mot" accordion="details" role="tabpanel">
                            <b-card title="MOT History" class="text-info">
                                @isset($advert->mot)
                                    @php
                                        $motHistory=json_decode($advert->mot);
                                       

                                    @endphp
                                    <table class="table table-striped text-center">
                                        <thead class="thead-light">
                                              <tr>
                                                <th scope="col">#</th>  
                                                <th scope="col">Date</th>
                                                <th scope="col">Mileage</th>
                                                <th scope="col">Result</th>
                                                <th scope="col">Failure</th>
                                                <th scope="col">Advisory</th>
                                              </tr>
                                        </thead>
                                        <tbody class="small-font">
                                            @foreach($motHistory as $mot)
                                                <tr>
                                                    <th scope="row">{{($loop->index)+1}}</th>
                                                    <td>{{ $mot->TestDate }}</td>
                                                    <td>{{ $mot->OdometerReading }}</td>
                                                    <td 
                                                        @if($mot->TestResult=="Pass")
                                                            class="text-success"
                                                        @else
                                                            class="text-danger"
                                                        @endif
                                                    >
                                                        
                                                        {{ $mot->TestResult }}</td>
                                                    <td class="mx-5 text-justify w-25">
                                                        @if(count($mot->FailureReasonList))
                                                                @foreach($mot->FailureReasonList as $failure)
                                                                    <small class="text-danger">{{$failure}}</small><br>
                                                                @endforeach
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td class="mx-5 text-justify w-25">
                                                            @if(count($mot->AdvisoryNoticeList))
                                                                    @foreach($mot->AdvisoryNoticeList as $failure)
                                                                        <small class="text-warning">{{$failure}}</small>
                                                                    @endforeach
                                                            @else
                                                                -
                                                            @endif
                                                    </td>                                                    
                                                </tr>
                                                
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </ul>
                                @endisset
                                @empty($advert->mot)
                                    <p class="text-center text-secondary my-5"> This advert does not have MOT History data</p>
                                @endempty
                            </b-card>
                        </b-collapse>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>

@endsection
