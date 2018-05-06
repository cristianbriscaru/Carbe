<template>
<div class="">
        <div class="float-right fixed-top-app">
            <button @click="handleApp('Favorite')" type="button" class="btn btn-outline-primary top-nav" v-b-tooltip.hover title="Favorite Cars"><i class="material-icons">star_border</i></button>
            <button @click="handleApp('Recent')" type="button" class="btn btn-outline-primary top-nav" v-b-tooltip.hover title="Recent Cars"><i class="material-icons">history</i></button>
            <button v-if="!auth" @click="handleApp('login')" type="button" class="btn btn-outline-primary top-nav" v-b-tooltip.hover title="Login to Carbe"><i class="material-icons">account_circle</i>Login</button>
            <button v-if="auth" @click="handleApp('account')" type="button" class="btn btn-outline-primary top-nav" v-b-tooltip.hover title="Dashboard"><i class="material-icons text-success">account_circle</i>{{name}}</button>
            
        </div>
    
    <b-collapse v-model="deployApp" id="app" class="custom-shadow p-2 top-app">
        <div v-if="auth" class="row text-center text-light"> 
            <div class="col-4 h-100">
                <a role="button" class="btn btn-lg btn-info w-100 mt-4 mb-1" href="http://carbe.co.uk/help">Help</a>
                <small>Get help information on Carbe</small> 
            </div>
            <div class="col-4 h-100">
                <a role="button" class="btn btn-lg btn-secondary w-100 mt-4 mb-1" href="http://carbe.co.uk/dashboard">Dashboard</a>
                <small>View and Edit your account</small> 
            </div>            
            <div class="col-4 h-100">
                <button type="submit" class="btn btn-lg btn-warning w-100 mt-4 mb-1" form="logout-form">Logout</button>
                <small>Logout of your Carbe Account</small>
                <form id="logout-form" action="http://carbe.co.uk/logout" method="POST" >
                            
                <csrf></csrf>
                </form> 
            </div>
        </div>
        <div v-if="!auth" class="text-sceondary col-12 col-md-8 col-lg-6 mx-auto">
            <div class="text-center  rounded mt-2 bg-warning" role="alert">
                <h4 class="font-weight-bold">Please login to access this features</h4>
                <hr>
                <div class="row">
                    <div class="col-6 p-0">
                        <button @click="handleApp('login')" type="button" class="btn btn-info small-i w-50" aria-describedby="loginhelp"><i class="material-icons">account_circle</i>  Login</button><br>
                        <span id="registerhelp" class="text-center">Click to login into Carbe</span>
                    </div>
                    <div class="col-6 p-0">
                        <a class="btn btn-info small-i w-50" href="http://carbe.co.uk/register" role="button" aria-describedby="registerhelp"><i class="material-icons">perm_contact_calendar</i>  Register</a>
                        <span id="registerhelp" class="form-text ">Click to register a new account</span>   
                    </div> 
                </div>                
            </div>
        </div>
    </b-collapse>
                <b-modal v-model="showModal" id='modal'
                    size="lg"
                    centered
                    lazy
                    :title="title"
                    headerTextVariant= 'light'
                    header-bg-variant="info"
                    footer-bg-variant='light'
                    ok-only
                    ok-variant="secondary"
                    ok-title="Close"
                >
                    <div v-if="(request == 'Favorite') || (request == 'Recent')" class=" text-secondary">
                        <div v-if="carsError" class="bg-warning text-secondary rounded text-center m-5">
                            <h4 class="font-weight-bold p-5"> Something went wrong with {{title}}</h4>
                            <h5>{{carsError}}</h5>
                            <hr class="custom-input">
                            <p class="m-5"> Please see our Help page for more information on {{title}}</p>
                            <a class="btn btn-info px-5 m-3" href="http://carbe.co.uk/help" role="button"><i class="material-icons">help_outline</i>  Help  </a>
                        </div>
                        <div v-else-if="cars.length > 0 ">
                        <template v-for=" car in cars ">
                            <div class="card my-4 custom-shadow">
                                <div class="row">
                                    <div class="col-3 p-0">
                                        <a :href="'http://carbe.co.uk/car/'+car.advert_id" ><img class="img-fluid custom-shadow" width="200" height="150" :src="'http://carbe.co.uk/storage/'+car.path" alt="Car Vehicle"></a>
                                    </div>
                                    <div class="col-9 p-0 text-center">
                                        <div class="card-block p-0">
                                            <h3 class="p-1 pt-2 p-lg-3 card-title small-h2 text-truncate font-weight-bold"><a :href="'http://carbe.co.uk/car/'+car.advert_id" class="text-secondary"><strong class="text-info">£{{car.price}}</strong> - {{car.make_name+" "+car.model_name+" "+car.registration_year}} </a></h3>
                                            
                                            <ul class="list-inline pt-2 text-secondary small-font">                                                         
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Mileage" ><img class="search-desc" src="http://carbe.co.uk/media/app/mileage.png" width="32px" height="32px" alt="Car Dashboard">{{ car.mileage }} mi</li>
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Fuel Type"><img  class="search-desc" src="http://carbe.co.uk/media/app/pump.png" width="32px" height="32px" alt="Petrol Pump">{{ car.fuel_type }}</li>
                                                    <li class="list-inline-item search-desc d-none d-md-inline" v-b-tooltip.hover title="Gearbox Type"><img  class="search-desc" src="http://carbe.co.uk/media/app/gearbox.png" width="32px" height="32px" alt="Car Gearbox">{{ car.transmission }}</li>
                                                    <li class="list-inline-item search-desc" v-b-tooltip.hover title="Fuel Consumption"><img  class="search-desc" src="http://carbe.co.uk/media/app/CONSUMPTION.png" width="32px" height="32px" alt="Oil Canister">{{ car.combined_consumption }} mpg</li>
                                                    
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </template>
                        </div>

                        <div v-else class="bg-light text-secondary rounded text-center p-5">
                            <h4 class="font-weight-bold pb-5"> You do not have any {{title}}</h4>
                            <hr class="custom-input">
                            <p class="m-5"> Please see our Help page for more information on {{title}}</p>
                            <a class="btn btn-info px-5 m-3" href="http://carbe.co.uk/help" role="button"><i class="material-icons">help_outline</i>  Help  </a>
                        </div>
                    </div>
                    <login v-else-if="request == 'login' && !auth" v-on:authenticated="authenticated"></login>
                </b-modal>    
</div>



</template>

<script>
import csrf from './csrf.vue';
export default{
    components:{
        csrf,

    }, 
    props:['auth','name'],   
    data(){
        return{
            showModal:false,
            title:'',
            request:'',
            deployApp:false,
            displayAccount:false,
            displayCars:false,
            cars:[],
            carsError:false,
            
        }
    },
    methods:{
        handleApp(request){
            this.request=request;  
            if(!auth){
                if(request == 'login'){
                    this.showModal=true;
                    this.title='Login into Carbe';                
                }
                else{
                    this.deployApp=!this.deployApp;
                }
            }
            else{
                if(request == 'account'){
                    this.deployApp=!this.deployApp;    
                }
                else{
                    this.showCars(request);
                    this.title=request+' Car Adverts';
                    this.showModal=true;
                    
                    
                }
            }
            
        },
        showCars(types){
            this.displayAccount=false;
            this.displayCars=true;
            this.carsError=false;
            var url = (types == 'Favorite') ? 'favorite' : 'recent';
                    axios({
                        method:'get',
                        url:"http://carbe.co.uk/"+url,
                    })
                    .then(response  =>  { 
                        this.cars=response.data;
                                                    
                    }) 
                    .catch(error  =>  {
                            this.carsError=error.response.statusText;                        
                    }); 


            
        },
        showAccount(){
            this.displayCars=false;
            this.displayAccount=true;
        },
        authenticated(auth,name){
            if(auth){
                this.showModal=false;
                this.showLogin=false;
            }
        }
    },
    
}

</script>