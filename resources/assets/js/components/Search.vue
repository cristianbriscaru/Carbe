<template>
        <div class="bg-secondary rounded p-5">
             
            <form novalidate @submit.prevent="validateForm" method="GET" action="http://carbe.co.uk/search/results">
                <div class="row search">
                        <div class="col-4 col-md-2 small-i custom-label">
                            <post-code :location="false" v-on:postcode="postcodes"></post-code>
                        </div>
                        <div class="col-8 col-sm-8 col-md-4 px-1 custom-label">
                            
                            <make-model :pmake="make" :pmodel="model" any-other="Any" v-on:makeModel="makeModel"></make-model>
                            
                        </div>
                        <div class=" col-12 col-md-6 justify-content-center">
                            <div class="pl-2">
                                <label for="euro" class="custom-input custom-label w-30 d-inline-block">Distance</label>
                                <label for="euro" class="custom-input custom-label w-30 d-inline-block">Min Price</label>
                                <label for="euro" class="custom-input custom-label w-30 d-inline-block">Max Price</label>

                                <select class="custom-select custom-input w-30 d-inline-block radius-left search-select border-right" v-bind:class="{'invalid' : errors.has('distance')}"  name="distance" v-model="distance" >
                                    <option selected hidden value="undefined">Distance :</option>
                                    <option value="1000">National</option>
                                    <option value="1">1 mile</option>
                                    <option value="5">5 miles</option>
                                    <option value="10">10 miles</option>
                                    <option value="20">20 miles</option>
                                    <option value="30">30 miles</option>
                                    <option value="40">40 miles</option>
                                    <option value="50">50 miles</option>
                                    <option value="75">75 miles</option>
                                    <option value="100">100 miles</option>
                                    <option value="150">150 miles</option>
                                    <option value="200">200 miles</option> 
                                    <option value="500">500 miles</option>                       
                                </select>
                                <select class="custom-select custom-input w-30 d-inline-block border-right search-select" v-bind:class="{'invalid' : errors.has('min_price')}" v-model="min_price"  name="min_price" >
                                    <option selected hidden value="undefined">Min Price :</option>
                                    <option value="0">Any</option>
                                    <option value="1">£1</option>
                                    <option value="500">£500</option>
                                    <option value="1000">£1,000</option>
                                    <option value="2000">£2,000</option>
                                    <option value="3000">£3,000</option>
                                    <option value="4000">£4,000</option>
                                    <option value="5000">£5,000</option>
                                    <option value="6000">£6,000</option>
                                    <option value="7000">£7,000</option>
                                    <option value="8000">£8,000</option>
                                    <option value="9000">£9,000</option>
                                    <option value="10000">£10,000</option>
                                    <option value="12500">£12,500</option>
                                    <option value="15000">£15,000</option>
                                    <option value="17500">£17,500</option>
                                    <option value="20000">£20,000</option>
                                    <option value="25000">£25,000</option>
                                    <option value="30000">£30,000</option>
                                    <option value="35000">£35,000</option>
                                    <option value="40000">£40,000</option>
                                    <option value="45000">£45,000</option>
                                    <option value="50000">£50,000</option>
                                    <option value="55000">£55,000</option>
                                    <option value="60000">£60,000</option>
                                    <option value="75000">£75,000</option>
                                    <option value="100000">£100,000</option>
                                    <option value="250000">£250,000</option>
                                    <option value="500000">£500,000</option>
                                    <option value="1000000">£1,000,000</option>                     
                                </select>
                                <select class="custom-select custom-input w-30 d-inline-block search-select radius-right" v-bind:class="{'invalid' : errors.has('max_price')}" v-model="max_price"  name="max_price" >
                                    <option selected hidden value="undefined">Max Price :</option>
                                    <option value="50000000">Any</option>
                                    <option value="500">£500</option>
                                    <option value="1000">£1,000</option>
                                    <option value="2000">£2,000</option>
                                    <option value="3000">£3,000</option>
                                    <option value="4000">£4,000</option>
                                    <option value="5000">£5,000</option>
                                    <option value="6000">£6,000</option>
                                    <option value="7000">£7,000</option>
                                    <option value="8000">£8,000</option>
                                    <option value="9000">£9,000</option>
                                    <option value="10000">£10,000</option>
                                    <option value="12500">£12,500</option>
                                    <option value="15000">£15,000</option>
                                    <option value="17500">£17,500</option>
                                    <option value="20000">£20,000</option>
                                    <option value="25000">£25,000</option>
                                    <option value="30000">£30,000</option>
                                    <option value="35000">£35,000</option>
                                    <option value="40000">£40,000</option>
                                    <option value="45000">£45,000</option>
                                    <option value="50000">£50,000</option>
                                    <option value="55000">£55,000</option>
                                    <option value="60000">£60,000</option>
                                    <option value="75000">£75,000</option>
                                    <option value="100000">£100,000</option>
                                    <option value="250000">£250,000</option>
                                    <option value="500000">£500,000</option>
                                    <option value="1000000">£1,000,000</option>                         
                                </select>
                                
                            </div>
                        </div>
                </div>
                
                <b-collapse id="options" v-bind:visible="poptions">
                    <div class="row my-4">
                        <div class="col-4 col-md-2">
                            <label for="state" class="custom-input custom-label">State</label>
                            <select id="state" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('state')}" id="state" v-model="state" name="state" >
                                <option selected hidden value="undefined">State :</option>
                                <option value="ANY">Any</option>
                                <option value="USED">Used</option>
                                <option value="NEW">New</option>
                                <option value="NEARLYNEW">Nearly New</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="age" class="custom-input custom-label">Age</label>
                            <select id="age" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('age')}" v-model="age" name="age" >
                                <option selected hidden value="undefined">Age :</option>
                                <option value="150">Any</option>
                                <option value="1">up to 1 year</option>
                                <option value="2">up to 2 years</option>
                                <option value="3">up to 3 years</option>
                                <option value="4">up to 4 years</option>
                                <option value="5">up to 5 years</option>
                                <option value="6">up to 6 years</option>
                                <option value="7">up to 7 years</option>
                                <option value="8">up to 8 years</option>
                                <option value="9">up to 9 years</option>
                                <option value="10">up to 10 years</option>
                                <option value="15">up to 15 years</option>
                                <option value="20">up to 20 years</option>
                            </select>                            
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="service" class="custom-input custom-label">Service</label>
                            <select id="service" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('service')}" id="service" v-model="service" name="service" >
                                <option selected hidden value="undefined">Service :</option>
                                <option value="ANY">Any</option>
                                <option value="FULL">Full history</option>
                                <option value="PART">Part history</option>
                                <option value="NONE">No history</option>                     
                            </select>
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="mileage" class="custom-input custom-label">Mileage</label>
                            <select id="mileage" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('mileage')}" id="mileage" v-model="mileage" name="mileage" >
                                <option selected hidden value="undefined">Mileage :</option>    
                                <option value="5000000">Any</option>
                                <option value="0">Up to 0 miles</option>
                                <option value="100">Up to 100 miles</option>
                                <option value="500">Up to 500 miles</option>
                                <option value="5000">Up to 5,000 miles</option>
                                <option value="10000">Up to 10,000 miles</option>
                                <option value="15000">Up to 15,000 miles</option>
                                <option value="20000">Up to 20,000 miles</option>
                                <option value="25000">Up to 25,000 miles</option>
                                <option value="30000">Up to 30,000 miles</option>
                                <option value="35000">Up to 35,000 miles</option>
                                <option value="40000">Up to 40,000 miles</option>
                                <option value="45000">Up to 45,000 miles</option>
                                <option value="50000">Up to 50,000 miles</option>
                                <option value="60000">Up to 60,000 miles</option>
                                <option value="70000">Up to 70,000 miles</option>
                                <option value="80000">Up to 80,000 miles</option>
                                <option value="90000">Up to 90,000 miles</option>
                                <option value="100000">Up to 100,000 miles</option>
                                <option value="125000">Up to 125,000 miles</option>
                                <option value="150000">Up to 150,000 miles</option>
                                <option value="200000">Up to 200,000 miles</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="fuel" class="custom-input custom-label">Fuel Type</label>
                            <select id="fuel" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('fuel_type')}" id="fuel_type" v-model="fuel_type" name="fuel_type" >
                                <option selected hidden value="undefined">Fuel Type :</option>
                                <option value="ANY">Any</option> 
                                <option value="PETROL">Petrol</option>
                                <option value="DIESEL">Diesel</option>
                                <option value="ELECTRIC">Electric</option>
                                <option value="DIESEL/ELECTRIC">Diesel Hybrid</option>
                                <option value="PETROL/ELECTRIC">Petrol Hybrid</option>
                                                       
                            </select> 
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="gearbox" class="custom-input custom-label">Gearbox</label>
                            <select id="gearbox" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('transmission')}" id="transmission" v-model="transmission" name="transmission" >
                                <option selected hidden value="undefined">Gearbox :</option>
                                <option value="ANY">Any</option>
                                <option value="MANUAL">Manual</option>
                                <option value="AUTOMATIC">Automatic</option>
                                <option value="SEMIAUTOMATIC">Semi Auto</option>
                                <option value="CVT">Auto CVT</option> 
                                
                            </select>
                        </div>                                                                                                    
                    </div>
                    <div class="row my-4">
                        <div class="col-4 col-md-2">
                            <label for="body" class="custom-input custom-label">Body</label>
                            <select id="body" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('body')}" id="body" v-model="body" name="body" >
                                <option selected hidden value="undefined">Body :</option>
                                <option value="ANY">Any</option>
                                <option value="SALOON">Saloon</option>
                                <option value="HATCHBACK">Hatchback</option>
                                <option value="PICKUP">Pickup</option>
                                <option value="COUPE">Coupe</option>
                                <option value="SUV">SUV</option>
                                <option value="ESTATE">Estate</option>
                                <option value="CONVERTIBLE">Convertible</option>
                                <option value="MPV">MPV</option>
                                
                            </select>                             

                        </div>
                        <div class="col-4 col-md-2">
                            <label for="doors" class="custom-input custom-label">Doors</label>
                            <select id="doors" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('doors')}" id="doors" v-model="doors" name="doors" >
                                <option selected hidden value="undefined">Doors :</option>
                                <option value="10">Any</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>                      
                            </select>
                        </div>
                        <div class="col-4 col-md-2">
                            <label for="consumption" class="custom-input custom-label">Consumption</label>
                            <select id="consumption" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('consumption')}"  v-model="consumption" name="consumption" >
                                <option selected hidden value="undefined">Consumption :</option>
                                <option value="1000">Any</option>
                                <option value="25">Over 25 mpg</option>
                                <option value="50">Over 50 mpg</option>
                                <option value="75">Over 75 mpg</option>
                                <option value="100">Over 100 mpg</option>                    
                            </select>
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="seller" class="custom-input custom-label">Seller</label>
                            <select id="seller" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('seller_type')}" v-model="seller_type" name="seller_type" >
                                <option selected hidden value="undefined">Seller :</option>
                                <option value="any">Any</option>
                                <option value="private">Private</option>
                                <option value="trader">Trader</option>
                                
                            </select>
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="engine" class="custom-input custom-label">Engine</label>
                            <select id="engine" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('engine_size')}" v-model="engine_size"  name="engine_size" >
                                <option selected hidden value="undefined">Engine :</option>
                                <option value="20000">Any</option>
                                <option value="1000">Up to 1.0 L</option>
                                <option value="1500">Up to 1.5 L</option>
                                <option value="1700">Up to 1.7 L</option>
                                <option value="2000">Up to 2.0 L</option>
                                <option value="2500">Up to 2.5 L</option>
                                <option value="3000">Up to 3.0 L</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-2 pt-4 pt-md-0">
                            <label for="colour" class="custom-input custom-label">Colour</label>
                            <select id="colour" class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('colour')}" id="colour" v-model="colour" name="colour" >
                                    <option selected hidden value="undefined">Colour :</option>
                                    <option value="ANY">Any</option>
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
                                    
                            </select> 
                        </div>                                                                                                    
                    </div>    
                    <div class="row my-4">
                        <div class="col text-center">
                            <label for="sort" class="custom-input custom-label">Sort by</label>
                                <select id="sort" class="custom-select custom-input " v-bind:class="{'invalid' : errors.has('sortby')}" v-model="sortby"  name="sortby" >
                                    <option selected hidden value="undefined">Sort By :</option>
                                    <option value="HIGHESTPRICE">Heigheist Price</option>
                                    <option value="LOWESTPRICE">Lowest Price</option>
                                    <option value="MOSTRECENT">Most Recent</option>
                                    <option value="MAKE">Make</option>
                                    <option value="MODEL">Model</option>
                                    <option value="AGE">Age</option>
                                    <option value="MILEAGE">Mileage</option>
                                </select>
                        </div>
                    </div>                                    
                </b-collapse>
               



                <hr class="custom-input">
                <div class="row pt-3 ">
                        <div v-if="errors.any()" class="custom-error w-100 rounded px-3 mx-2 mb-4" role="alert">
                            <ul class="list-inline text-center m-3">
                                <li v-for="error in errors.all()" class="list-inline-item small-font">
                                    {{error}}
                                </li>
                            </ul> 
                        </div>
                        <alert v-if="alert" :alert="alert" position="relative" ></alert>
                        <div class="btn-group w-100 justify-content-center" role="group" aria-label="Search buttons">
                                <button id="option" type="button" class="btn btn-info border-right small-i" v-b-toggle.options><i class="material-icons pr-1">settings_applications</i></button>
                                <button id="reset" type="reset" class="btn btn-info border-left border-right small-i" @click="errors.clear()" ><i class="material-icons pr-1">highlight_off</i></button>
                                <button  type="submit" class="btn btn-info w-50 border-left border-right small-i"><i class="material-icons pr-1">find_in_page</i>Search</button>
                                <button @click=" saveSearchSubscription('search') " id="save" type="button" class="btn btn-info border-left border-right small-i"><i class="material-icons pr-1" >save</i></button>
                                <button @click="saveSearchSubscription('subscription')" id="subscribe" type="button" class="btn btn-info border-left small-i"><i class="material-icons pr-1" >rss_feed</i></button>
                        </div>
                        <b-tooltip target="option" placement="bottom" triggers="hover">
                            Search Options
                        </b-tooltip>
                        <b-tooltip target="reset" placement="bottom" triggers="hover">
                            Search Reset
                        </b-tooltip>    
                        <b-tooltip target="save" placement="bottom" triggers="hover">
                            Save Search
                        </b-tooltip>   
                        <b-tooltip target="subscribe" placement="bottom" triggers="hover">
                            Subscribe Search
                        </b-tooltip>
                </div>





            </form>



        </div>
</template>

<script>
import FormValidation from '../Mixins/FormValidation';
import AddLaravelErrors from '../Mixins/AddLaravelErrors';
export default{
    mixins:[FormValidation,AddLaravelErrors],
    data(){
        return{
            
            distance:window.old.distance,
            min_price: window.old.min_price,
            max_price:window.old.max_price,
            mileage: window.old.mileage,
            state: window.old.state,
            make:window.old.make,
            model:window.old.model,
            body:window.old.body,
            transmission:window.old.transmission,
            fuel_type:window.old.fuel_type,
            colour:window.old.colour,
            doors:window.old.doors,
            age:window.old.age,
            engine_size:window.old.engine_size,
            consumption:window.old.consumption,
            service: window.old.service,
            sortby: window.old.sortby,  
            seller_type:window.old.seller_type, 
            postcode:'window.old.postcode',
            lat:window.old.lat,
            lng:window.old.lng,
            make:window.old.make,
            model:window.old.model,
            alert:false,
            success:false,
            warning:false,
                
        }
    },
    methods:{
        saveSearchSubscription(type){
            this.$validator.errors.remove('save'); 
            this.$validator.validateAll();
            if( !this.$validator.errors.any()){
                axios({
                    method:'post',
                    url:"http://carbe.co.uk/"+type,
                    data:{
                        postcode:this.postcode,
                        lat:this.lat,
                        lng:this.lng,
                        make:this.make,
                        model:this.model,
                        distance:this.distance,
                        min_price: this.min_price,
                        max_price:this.max_price,
                        mileage: this.mileage,
                        state: this.state,
                        make:this.make,
                        model:this.model,
                        body:this.body,
                        transmission:this.transmission,
                        fuel_type:this.fuel_type,
                        colour:this.colour,
                        doors:this.doors,
                        age:this.age,
                        engine_size:this.engine_size,
                        consumption:this.consumption,
                        service: this.service,
                        sortby: this.sortby,  
                        seller_type:this.seller_type,                    
                    }
                })
                .then(response  =>  {
                    this.$validator.errors.remove('save');
                    this.alert={'variant':'success','title':'Your '+type+' has been saved', 'message':'Your '+type+' has been saved and can be viewed from your Dashboard'};                                                                       
                }) 
                .catch(error  =>  {
                    if(error.response.status == 422){
                            var errors=error.response.data.errors;
                            for(var key in errors) {
                                this.$validator.errors.add(key,errors[key][0],'validation');
                            }
                    }
                    else if(error.response.status == 405){
                        this.alert={'variant':'warning','title':'Error saving your '+type, 'message':'Error saving '+type+' .  You have reached the maxim number of Saved '+type};                                                                       
                    }  
                    else if(error.response.status == 401){
                        this.alert={'variant':'warning','title':'Error saving your '+type, 'message':'You have to be logged in in order to save a '+type};                                                                       
                    }                 
                    else{
                        this.alert={'variant':'warning','title':'Error saving '+type, 'message':'Something went wrong while trying to save '+type};                                                                       
                    }                                 
                }); 
            }
        },
        postcodes(postcode,lat,lng){
            this.postcode=postcode;
            this.lat=lat;
            this.lng=lng;
        },
        makeModel(make,model){
            this.make=make;
            this.model=model;
        }
    },
   
    props:['poptions'],
}

</script>