<template>
    <form method="POST" :action=" !displayVehicleLookup  ? 'http://carbe.co.uk/car/'+advertId : 'http://carbe.co.uk/car'"  enctype="multipart/form-data" novalidate class="p-3 border rounded" @submit.prevent="validateForm" >
     
        <csrf></csrf>
        <input v-if="!displayVehicleLookup" name="_method" type="hidden" value="PATCH">
        <fieldset v-if="displayVehicleLookup && showVehicleLookup" class="my-3">
            <legend class="text-center text-secondary">Vehicle Lookup</legend>             
        <div class="row text-center">
            <div class="col">
                <label for="regplate" class="custom-input"><i class="material-icons md-48 custom-input">drive_eta</i>Registration Plate<span class="text-danger"> *</span></label>
                <input id="regplate" type="text" class="text-uppercase form-control custom-input w-50 mx-auto" v-bind:class="{'invalid' : errors.has('regplate')}" v-model="vrm"  placeholder="VRM :" data-vv-name="registrationplate" v-validate="{regex:/^[a-zA-Z-0-9]{6,7}$/}" >
                <small v-if="errors.has('regplate')" class="form-text invalid">{{ errors.first('regplate') }}</small>
            </div>        
            <div class="col">
                <button type="button" class="btn btn-info btn-lg mt-5 mt-md-4" id="lookup" @click="vehicleLookup()">Vehicle Lookup</button>
                <small v-if="errors.has('vehiclelookup')" class="form-text invalid">{{ errors.first('vehiclelookup') }}</small>
            </div>        
        </div>
        <div v-if="vehicleData!=''" class="text-center">
            <div class="row">
                <div class="alert alert-light m-2 w-100 mx-auto">
                    <p class="text-secondary font-weight-bold w-100 mt-3">Vehicle Details Found:<span class="text-dark font-weight-normal mt-3">
                            {{vehicleData.ClassificationDetails.Dvla.Make+' '+vehicleData.ClassificationDetails.Dvla.Model+' '+vehicleData.SmmtDetails.BodyStyle+' '+vehicleData.VehicleRegistration.Colour}}
                        </span>
                    </p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="button" class="btn btn-warning "  @click="wrongVehicleDetails()">Wrong Vehicle Details</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary "  @click="correctVehicleDetails()">Correct Vehicle Details</button>
                </div>
            </div>    
        </div>
        <div v-if="vehicleDataNaN" class="row text-center">
            <div class="alert alert-warning mt-4 w-75 mx-auto" role="alert">
                Could not fetch the vehicle details from our records. Please check you have entered the correct Registration Plate Number (VRM).
                 If so, please enter the vehicle details manualy.
            </div>
             
            <button type="button" class="btn btn-info mx-auto mt-3"  @click="showVehicleLookup=false">Enter Vehicle Details Manualy</button> 
        </div>
        </fieldset> 
        <div v-show="!showVehicleLookup || !displayVehicleLookup">
            <input type="hidden" name="mot" v-model="mot">
            <div class="form-group row custom-input">
                <div class="col-4">
                    <label for="regplate" class="custom-input">Registration Plate<span class="text-danger"> *</span></label>
                    <input id="regplate" type="text" class="text-uppercase form-control custom-input" v-bind:class="{'invalid' : errors.has('regplate')}" v-model="vrm"  name="vrm" placeholder="VRM :" v-validate="{regex:/^[a-zA-Z-0-9]{6,7}$/}" >
                    <small v-if="errors.has('regplate')" class="form-text invalid">{{ errors.first('regplate') }}</small>
                </div>        
                <make-model  :pmake="make" :pmodel="model" any-other="Other"></make-model>       
            </div>
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="variant" class="custom-input">Variant<span class="text-danger"> *</span></label>
                    <input id="variant" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('variant')}" v-model="variant"  name="variant" placeholder="Variant :" v-validate="{required:'true',regex:/^[a-zA-Z-0-9 -]{1,50}$/}" >
                    <small v-if="errors.has('variant')" class="form-text invalid">{{ errors.first('variant') }}</small>
                </div>       
                <div class="col">
                    <label for="body" class="custom-input">Body Type<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('body')}" id="body" v-model="body" name="body" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Select Body :</option>
                        <option value="SALOON">Saloon</option>
                        <option value="HATCHBACK">Hatchback</option>
                        <option value="PICKUP">Pickup</option>
                        <option value="COUPE">Coupe</option>
                        <option value="SUV">SUV</option>
                        <option value="ESTATE">Estate</option>
                        <option value="CONVERTIBLE">Convertible</option>
                        <option value="MPV">MPV</option>
                        <option value="OTHER">Other</option>
                    </select>                    
                    <small v-if="errors.has('body')" class="form-text invalid">{{ errors.first('body') }}</small>
                </div> 
                <div class="col">
                    <label for="service" class="custom-input">Service History<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('service')}" id="service" v-model="service" name="service" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Service History :</option>
                        <option value="FULL">Full history</option>
                        <option value="PART">Part history</option>
                        <option value="NONE">No history</option>                     
                    </select>                    
                    <small v-if="errors.has('service')" class="form-text invalid">{{ errors.first('service') }}</small>
                </div>                      
            </div>             
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="price" class="custom-input">Price<span class="text-danger"> *</span></label>
                    <input id="price" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('price')}" v-model="price"  name="price" placeholder="Enter Price :" v-validate="'required|numeric|min_value:1|max_value:50000000'" >
                    <small v-if="errors.has('price')" class="form-text invalid">{{ errors.first('price') }}</small>
                </div>                
                <div class="col">
                    <label for="mileage" class="custom-input">Mileage<span class="text-danger"> *</span></label>
                    <input id="mileage" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('mileage')}" v-model="mileage"  name="mileage" placeholder="Mileage :" v-validate="'required|numeric|min_value:0|max_value:5000000'" >
                    <small v-if="errors.has('mileage')" class="form-text invalid">{{ errors.first('mileage') }}</small>
                </div>        
                <div class="col">
                    <label for="state" class="custom-input">State<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('state')}" id="state" v-model="state" name="state" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Select State :</option>
                        <option value="USED">Used</option>
                        <option value="NEW">New</option>
                        <option value="NEARLYNEW">Nearly New</option>
                    </select>                    
                    <small v-if="errors.has('state')" class="form-text invalid">{{ errors.first('state') }}</small>
                </div>        
            </div>            
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="description" class="custom-input">Description<span class="text-danger"> *</span></label>
                    <textarea id="description" rows="2" class="form-control custom-input"  v-bind:class="{'invalid' : errors.has('description')}" v-model="description"  name="description" placeholder="Advert Description :"  v-validate="'required|min:25|max:1000'"></textarea>
                    <small v-if="errors.has('description')" class="form-text invalid">{{ errors.first('description') }}</small>
                </div>                          
            </div> 
            <div v-if="displayVehicleLookup" class="form-group row custom-input">
                <div class="col">
                    <span class="custom-input pb-5">Photos</span><span class="text-danger"> *</span>
                    <b-form-file accept="image/*" v-model="photos" id="photos" :state="!errors.has('photos')" multiple  name="photos[]" placeholder="Upload Photos :" data-vv-name="photos" v-validate="'required|image|size:5000|mimes:image/jpeg,image/png,image/gif,image/jpg'"></b-form-file>   
                    <small v-if="errors.has('photos')" class="form-text invalid">{{ errors.first('photos') }}</small>
                </div>                          
            </div>
            <div class="w-100 bg-light rounded my-2">
                <button type="button" class="btn btn-info w-25" @click="showTechnicalData = !showTechnicalData">Technical Data</button>
            </div>
            <div v-show="vehicleDataNaN || showTechnicalData" class="mb-3">                        
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="fuel_type" class="custom-input">Fuel Type<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('fuel_type')}" id="fuel_type" v-model="fuel_type" name="fuel_type" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Fuel :</option>
                        <option value="PETROL">Petrol</option>
                        <option value="DIESEL">Diesel</option>
                        <option value="ELECTRIC">Electric</option>
                        <option value="DIESEL/ELECTRIC">Diesel Hybrid</option>
                        <option value="PETROL/ELECTRIC">Petrol Hybrid</option>
                        <option value="OTHER">Other</option>                        
                    </select>                    
                    <small v-if="errors.has('fuel_type')" class="form-text invalid">{{ errors.first('fuel_type') }}</small>
                </div>       
                <div class="col">
                    <label for="transmission" class="custom-input">Transmission<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('transmission')}" id="transmission" v-model="transmission" name="transmission" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Gearbox :</option>
                        <option value="MANUAL">Manual</option>
                        <option value="AUTOMATIC">Automatic</option>
                        <option value="SEMIAUTOMATIC">Semi Auto</option>
                        <option value="CVT">Auto CVT</option> 
                        <option value="OTHER">Other</option>
                    </select>                    
                    <small v-if="errors.has('model')" class="form-text invalid">{{ errors.first('model') }}</small>
                </div>
                <div class="col">
                    <label for="colour" class="custom-input">Colour<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('colour')}" id="model" v-model="colour" name="colour" v-validate="'required'">
                            <option disabled selected hidden value="undefined">Colour :</option>
                            <option value="BEIGE">Beige</option>
                            <option value="BLACK">Black</option>
                            <option value="BLUE">Blue</option>
                            <option value="BRONZE">Bronze</option>
                            <option value="BROWN">Brown</option>
                            <option value="BURGUNDY">Burgundy</option>
                            <option value="GOLD">Gold</option>
                            <option value="GREEN">Green</option>
                            <option value="GREY">Grey</option>
                            <option value="INDIGO">Indigo</option>
                            <option value="MAGENTA">Magenta</option>
                            <option value="MAROON">Maroon</option>
                            <option value="MULTICOLOUR">Multicolour</option>
                            <option value="NAVY">Navy</option>
                            <option value="ORANGE">Orange</option>
                            <option value="PINK">Pink</option>
                            <option value="PURPLE">Purple</option>
                            <option value="RED">Red</option>
                            <option value="SILVER">Silver</option>
                            <option value="TURQUOISE">Turquoise</option>
                            <option value="WHITE">White</option>
                            <option value="YELLOW">Yellow</option>
                            <option value="OTHER">Other</option>
                    </select>                    
                    <small v-if="errors.has('colour')" class="form-text invalid">{{ errors.first('colour') }}</small>
                </div>                                         
            </div>
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="doors" class="custom-input">Doors<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('doors')}" id="doors" v-model="doors" name="doors" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Doors :</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>                      
                    </select>                    
                    <small v-if="errors.has('doors')" class="form-text invalid">{{ errors.first('doors') }}</small>
                </div>       
                <div class="col">
                    <label for="seats" class="custom-input">Seats<span class="text-danger"> *</span></label>
                    <input id="seats" type="number" class="form-control  custom-input" v-bind:class="{'invalid' : errors.has('seats')}" v-model="seats"  name="seats" placeholder="Seats :" v-validate="'required|numeric|min_value:1|max_value:50'" >
                    <small v-if="errors.has('seats')" class="form-text invalid">{{ errors.first('seats') }}</small>
                </div>
                <div class="col">
                    <label for="registration_year" class="custom-input">Registration Year<span class="text-danger"> *</span></label>
                    <input id="registration_year" type="number" class="form-control  custom-input" v-bind:class="{'invalid' : errors.has('registration_year')}" v-model="registration_year" placeholder="Year :" name="registration_year" v-validate="'required|numeric|min_value:1900|max_value:2018'" >
                    <small v-if="errors.has('registration_year')" class="form-text invalid">{{ errors.first('registration_year') }}</small>
                </div>                                       
            </div>
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="engine_size" class="custom-input">Engine size<span class="text-danger"> *</span></label>
                    <input id="engine_size" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('engine_size')}" v-model="engine_size"  name="engine_size" placeholder="Engine CC :" v-validate="'required|numeric|min_value:10|max_value:20000'" >
                    <small v-if="errors.has('engine_size')" class="form-text invalid">{{ errors.first('engine_size') }}</small>
                </div>        
                <div class="col">
                    <label for="power" class="custom-input">Engine power<span class="text-danger"> *</span></label>
                    <input id="power" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('power')}" v-model="power"  name="power" placeholder="Engine bhp :" v-validate="'required|numeric|min_value:1|max_value:2000'" >
                    <small v-if="errors.has('power')" class="form-text invalid">{{ errors.first('power') }}</small>
                </div>
                <div class="col">
                    <label for="emissions" class="custom-input">Emissions<span class="text-danger"> *</span></label>
                    <input id="emissions" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('emissions')}" v-model="emissions"  name="emissions" placeholder="CO2 :" v-validate="'required|numeric|min_value:0|max_value:2000'" >
                    <small v-if="errors.has('emissions')" class="form-text invalid">{{ errors.first('emissions') }}</small>
                </div>                       
            </div>
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="combined_consumption" class="custom-input">Fuel Consumption MPG<span class="text-danger"> *</span></label>
                    <div class="input-group">
                    <input id="combined_consumption" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('combined_consumption')}" v-model="combined_consumption"  name="combined_consumption" placeholder="Combined :" v-validate="'required|decimal|min_value:0|max_value:1000'" >
                    <input id="urban_consumption" type="number" class="form-control custom-input border-left" v-bind:class="{'invalid' : errors.has('urban_consumption')}" v-model="urban_consumption"  name="urban_consumption" placeholder="Urban :" v-validate="'required|decimal|min_value:0|max_value:1000'">
                    <input id="motorway_consumption" type="number" class="form-control custom-input border-left" v-bind:class="{'invalid' : errors.has('motorway_consumption')}" v-model="motorway_consumption"  name="motorway_consumption" placeholder="Motorway :" v-validate="'required|decimal|min_value:0|max_value:1000'">
                    </div>
                    <small v-if="errors.has('combined_consumption') || errors.has('urban_consumption') || errors.has('motorway_consumption')" class="form-text invalid">{{ errors.first('combined_consumption')}}  {{errors.first('urban_consumption')}} {{errors.first('motorway_consumption')}}</small>
                </div>
            </div>
            <div class="form-group row custom-input">
                <div class="col">
                    <label for="owners" class="custom-input">Previous Owners<span class="text-danger"> *</span></label>
                    <input id="owners" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('owners')}" v-model="owners"  name="owners" placeholder="Previous Owners :" v-validate="'required|numeric|min_value:0|max_value:100'" >
                    <small v-if="errors.has('owners')" class="form-text invalid">{{ errors.first('owners') }}</small>
                </div>        
                <div class="col">
                    <label for="tax" class="custom-input">Road Tax<span class="text-danger"> *</span></label>
                    <input id="tax" type="number" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('tax')}" v-model="tax"  name="tax" placeholder="Tax £ :" v-validate="'required|numeric|min_value:0|max_value:1000'" >
                    <small v-if="errors.has('tax')" class="form-text invalid">{{ errors.first('tax') }}</small>
                </div>
                <div class="col">
                    <label for="euro" class="custom-input">Emision Standard<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('euro')}" id="euro" v-model="euro" name="euro" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Euro Standard :</option>
                        <option value="1">Euro 1</option>
                        <option value="2">Euro 2</option>
                        <option value="3">Euro 3</option>
                        <option value="4">Euro 4</option>
                        <option value="5">Euro 5</option>
                        <option value="6">Euro 6</option>
                        <option value="0">None Euro</option>                      
                    </select>                    
                    <small v-if="errors.has('doors')" class="form-text invalid">{{ errors.first('doors') }}</small>
                </div>                       
            </div>
            </div>             
            <div class="w-100 bg-light rounded my-2">
                <button type="button" class="btn btn-info w-25" @click="showFeatures = !showFeatures">Extra Features</button>
            </div>            
            <div v-show="showFeatures" class="mb-3">
                
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="1" id="sunroof">
                            <label class="form-check-label ml-2 py-2" for="sunroof">Sunroof</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="2" id="alarm">
                            <label class="form-check-label pl-2 py-2" for="alarm">Alarm</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="3" id="satnav">
                            <label class="form-check-label pl-2 py-2" for="satnav">Sat Nav</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="4" id="cd-player">
                            <label class="form-check-label pl-2 py-2" for="cd-player">CD Player</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="5" id="dvd-player">
                            <label class="form-check-label pl-2 py-2" for="dvd-player">DVD Player</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="6" id="leather">
                            <label class="form-check-label pl-2 py-2" for="leather">Leather Trim</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="7" id="roof-rails">
                            <label class="form-check-label pl-2 py-2" for="roof-rails">Roof Rails</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="8" id="folding-seats">
                            <label class="form-check-label pl-2 py-2" for="folding-seats">Folding Seats</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="9" id="sport-seats">
                            <label class="form-check-label pl-2 py-2" for="sport-seats">Sport Seats</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="10" id="spare-wheel">
                            <label class="form-check-label pl-2 py-2" for="spare-wheel">Spare Wheel</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="11" id="immobiliser">
                            <label class="form-check-label pl-2 py-2" for="imobiliser">Immobiliser</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="12" id="airbags">
                            <label class="form-check-label pl-2 py-2" for="airbags">Airbags</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="13" id="air-conditioning">
                            <label class="form-check-label pl-2 py-2" for="air-conditioning">AC</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="14" id="parking-aid">
                            <label class="form-check-label pl-2 py-2" for="parking-aid">Parking Aid</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="15" id="mp3-player">
                            <label class="form-check-label pl-2 py-2" for="mp3-player">MP3 Player</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="16" id="bluetooth">
                            <label class="form-check-label pl-2 py-2" for="bluetooth">Bluetooth</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="17" id="heated-seats">
                            <label class="form-check-label pl-2 py-2" for="heated-seats">Heated Seats</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="18" id="isofix">
                            <label class="form-check-label pl-2 py-2" for="isofix">Isofix System</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="19" id="metalic-paint">
                            <label class="form-check-label pl-2 py-2" for="metalic-paint">Metalic Paint</label>
                        </div>
                    </div>       
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="20" id="alloy-weels">
                            <label class="form-check-label pl-2 py-2" for="alloy-wheels">Alloy Wheels</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="21" id="cruise-control">
                            <label class="form-check-label  py-2" for="cruise-control">Cruise Control</label>
                        </div>
                    </div>                                          
                </div>
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="22" id="central-locking">
                            <label class="form-check-label pl-2 py-2" for="central-locking">Central Locking</label>
                        </div>
                    </div>                           
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="23" id="power-steering">
                            <label class="form-check-label pl-2 py-2" for="power-steering">Power Steering</label>
                        </div>
                    </div> 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="24" id="traction-control">
                            <label class="form-check-label pl-2 py-2" for="traction-control">Traction Control</label>
                        </div>
                    </div>                                          
                </div>                
                <div class="form-group row custom-input">
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="25" id="adjustable-seats">
                            <label class="form-check-label pl-2 py-2" for="adjustable-seats">Adjustable Seats</label>
                        </div>
                    </div>                     
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="26" id="electric-windows">
                            <label class="form-check-label pl-2 py-2" for="electric-windows">Electric Windows</label>
                        </div>
                    </div>                          
 
                    <div class="col">
                        <div class="form-check custom-check">
                            <input class="form-check-input mt-2 mt-md-3" type="checkbox" name="features[]" v-model="features" value="27" id="voice-command">
                            <label class="form-check-label pl-2 py-2" for="voice-command">Voice Command</label>
                        </div>
                    </div>                                          
                </div>


                <small v-if="errors.has('features')" class="form-text invalid">{{ errors.first('features') }}</small>
            </div>          
            <div class="form-group row mt-5">                
                <div class="col custom-input text-center">
                    <div  v-if="errors.any()" class="bg-light w-100 mx-auto" >
                        <ul class="list-inline text-danger">
                            <li v-for="error in errors.all()" class="list-inline-item">
                                {{error}}
                            </li>
                        </ul> 
                    </div>                    
                    <button type="submit" class="btn btn-primary">{{button}} Advert</button>
                </div>
            </div>




        </div>
        
    </form>
</template>
<script>
import csrf from './csrf.vue';
import FormValidation from '../Mixins/FormValidation';
import AddLaravelErrors from '../Mixins/AddLaravelErrors'; 

export default {
    mixins:[FormValidation,AddLaravelErrors],
    components:{
        csrf,
    },
    data(){
        return{
            vrm: window.old.vrm,
            prevVrm:'',
            vehicleData:[],
            showVehicleLookup:true,
            vehicleDataNaN:false,
            price: window.old.price,
            mileage: window.old.mileage,
            state: window.old.state,
            make:'',
            model:'',
            variant:'',
            body:'',
            transmission:'',
            fuel_type:'',
            colour:'',
            doors:'',
            seats:'',
            registration_year:'',
            engine_size:'',
            emissions:'',
            power:'',
            urban_consumption:'',
            combined_consumption:'',
            motorway_consumption:'',
            description: window.old.description,
            photos:[],
            service: window.old.service,
            owners:'',
            tax:'',
            euro:'',
            showTechnicalData:false,
            showFeatures:false,
            features:[window.old.features],
            mot:'',

        }
    },
    computed:{
        button: function(){
            return this.displayVehicleLookup ? 'Publish' : 'Update';
        }
    },
    props:[
        'displayVehicleLookup','advertId',        
    ],
    methods:{
        setData(data,isOldInput){
            this.make= isOldInput ? data.make : data.ClassificationDetails.Smmt.Make;
            this.model= isOldInput ? data.model : data.ClassificationDetails.Smmt.Range;
            this.variant= isOldInput ? data.variant : data.ClassificationDetails.Smmt.Trim;
            this.body= isOldInput ? data.body : data.SmmtDetails.BodyStyle;
            this.transmission= isOldInput ? data.transmission : data.SmmtDetails.Transmission;
            this.fuel_type= isOldInput ? data.fuel_type : data.SmmtDetails.FuelType;
            this.colour= isOldInput ? data.colour : data.VehicleRegistration.Colour;
            this.doors= isOldInput ? data.doors : data.SmmtDetails.NumberOfDoors;
            this.seats= isOldInput ? data.seats : data.VehicleRegistration.SeatingCapacity;
            this.registration_year= isOldInput ? data.registration_year : data.VehicleRegistration.YearOfManufacture;
            this.engine_size= isOldInput ? data.engine_size : data.VehicleRegistration.EngineCapacity;
            this.emissions= isOldInput ? data.emissions : data.VehicleRegistration.Co2Emissions;
            this.power= isOldInput ? data.power : data.TechnicalDetails.Performance.Power.Bhp;
            this.urban_consumption= isOldInput ? data.urban_consumption : data.TechnicalDetails.Consumption.UrbanCold.Mpg;
            this.combined_consumption= isOldInput ? data.combined_consumption : data.TechnicalDetails.Consumption.Combined.Mpg;
            this.motorway_consumption= isOldInput ? data.motorway_consumption : data.TechnicalDetails.Consumption.ExtraUrban.Mpg;
            this.owners= isOldInput ? data.owners : data.VehicleHistory.NumberOfPreviousKeepers;
            this.tax= isOldInput ? data.tax : data.VehicleStatus.MotVed.VedRate.Standard.TwelveMonth;
            this.euro= isOldInput ? data.euro : data.TechnicalDetails.General.EuroStatus;
            this.mot= isOldInput ? data.mot : JSON.stringify(Object.values(data.MotHistory.RecordList));
        },        
        vehicleLookup(){
                if(!this.$validator.errors.has('registrationplate') && this.vrm!=this.prevVrm && this.vrm!=undefined){
                    this.prevVrm=this.vrm;
                    axios.post("http://carbe.co.uk/vehiclelookup",{vrm:this.vrm}).then(response  =>  { 
                        if(response.data.Response.StatusCode=="Success"){
                            this.vehicleData=response.data.Response.DataItems;
                            this.vehicleDataNaN=false;
                        }
                        else{
                            
                            this.vehicleDataNaN=true;
                            this.vehicleData=[];                        
                        } 
                    }) 
                    .catch(error  =>  {
                        this.$validator.errors.add('vehiclelookup','Service unavailable. Try again later','UKVehicleData');
                        this.vehicleDataNaN=true;
                        this.vehicleData=[];                         
                    });
                }            
        },
        wrongVehicleDetails(){
            this.showVehicleLookup=true; 
            this.vehicleData=[]; 
            this.vehicleDataNaN=true;
        },
        correctVehicleDetails(){
            this.showVehicleLookup=false; 
            this.setData(this.vehicleData,false)
        }

    },
    created: function(){
        this.setData(window.old,true);
        if(Object.keys(window.old).length>0){
            this.showVehicleLookup=false;
        }            
    }
 
          
};

</script>
