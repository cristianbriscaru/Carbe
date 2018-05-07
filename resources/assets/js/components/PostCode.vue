<template>
    <div>                    
                       
                            <div class="form-group row custom-input">
                                <div class="col">
                                    <label for="postcode" class="custom-input"><i class="material-icons custom-input">location_on</i>Postcode<span class="text-danger"> *</span></label>           
                                    
                                        <input id="postcode" type="text" class="form-control custom-input " v-bind:class="{'error' : postcode_error  }" v-model="postcode" name="postcode" placeholder="Postcode :"  required autofocus data-vv-delay="0" v-validate="'required|min:5|max:7|alpha_num'" >
                                        <input type="hidden"  v-model="lat" name="lat" v-validate="'required'">
                                        <input type="hidden" v-model="lng" name="lng" v-validate="'required'">
                                
                                        <small v-show="errors.has('postcode')" class="form-text invalid">{{ errors.first('postcode') }}</small>
                                        <small v-if="(errors.has('lat') || errors.has('lng')) && !errors.has('postcode') " class="form-text invalid">Something wrong with the postcode</small>
                                </div>    
                            </div> 
                        
                        <div v-if="location">
                        <hr class="custom-input">   
                        <div class="form-group row custom-input">
                            <div class="col-md">
                                <label for="town" class="custom-input"><i class="material-icons md-48 custom-input">pin_drop</i>Town<span class="text-danger"> *</span></label>
                                <input id="town" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('town')}" v-model="town" name="town" placeholder="Town :" readonly v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                                <small v-show="errors.has('town')" class="form-text invalid">{{ errors.first('town') }}</small>

                            </div>

                               
                            <div class="col-md">
                                <hr class="custom-input d-md-none d-lg-none d-xl-none">
                                <label for="county" class=" custom-input"><i class="material-icons md-48 custom-input">pin_drop</i>County<span class="text-danger"> *</span></label>
                                <input id="county" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('county')}" v-model="county" name="county" placeholder="County :"  readonly  v-validate="{required:true,min:2,max:255,regex:/^[a-zA-Z . ,'`-]+$/}">
                                <small v-show="errors.has('county')" class="form-text invalid">{{ errors.first('county') }}</small>    
                            </div>
                        </div>
                        </div>
    </div>                    
</template>

<script>

export default {
    inject: ['$validator'],
    data(){
        return{
            postcode: window.old.postcode,
            lat: window.old.lat,
            lng: window.old.lng,
            town: window.old.town,
            county: window.old.county,
            prevPostocde:'',
        }
    },
    computed:{
        postcode_error: function (){
            return (this.$validator.errors.has('postcode') || this.$validator.errors.has('lat') || this.$validator.errors.has('lng'));
        }
    },
    watch:{
        postcode: function(postcode){
            this.postcode=this.postcode.toUpperCase();
            setTimeout(()=>{   
                this.getPostcode(this.postcode);
            },500);
        },
        lat: function(lat){
            this.emitLocation();
        }          
    },
    props:[
        'location'
    ],
    methods:{
        getPostcode (value){
                delete window.axios.defaults.headers.common['X-CSRF-TOKEN'];
                delete window.axios.defaults.headers.common['X-Requested-With'];
                if(this.fields.postcode.valid && this.prevPostcode!=this.postcode){
                    this.prevPostcode=this.postcode;
                    axios.get("https://api.postcodes.io/postcodes/" + value).then(response  =>  {
                        this.setLocation(response.data);     
                    }) 
                    .catch(error => {
                        if(error.response.data.status == 404){
                            this.$validator.errors.add('postcode','Invalid Postcode','postcode.io');
                        }
                        else{
                            this.$validator.errors.add('postcode','Service unaviable. Try again later','postcode.io');   
                        }
                        
                        
                    });
                }
                window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                window.axios.defaults.headers.common['X-CSRF-TOKEN']=document.head.querySelector('meta[name="csrf-token"]').content;            
        }, 
        setLocation (location){
                if(location.status==200){  
                    this.lat=location.result.latitude;
                    this.lng=location.result.longitude;
                    this.town=location.result.admin_district;
                    this.county=location.result.admin_county==null ? location.result.region : location.result.admin_county;
                }
                else{
                    this.lat='';
                    this.lng='';
                    this.town='';
                    this.county=''; 
                }            
        },
        emitLocation(){
            this.$emit('postcode', this.postcode , this.lat , this.lng );
        },
    },

    created: function(){      
        this.emitLocation();
              
    },
 
          
};
</script>
