<template>
                    <form method="POST" :action=" methods == 'patch' ? 'http://carbe.co.uk/seller/'+sellerId : 'http://carbe.co.uk/seller'" novalidate @submit.prevent="validateForm">
                                           
                        <csrf></csrf>
                        <input v-if="methods == 'patch'" name="_method" type="hidden" value="PATCH">
                        <post-code :location="true"></post-code>
                        <hr class="custom-input">
                        <div class="form-group row custom-input">
                                <div class="col-md">
                                    <label for="telephone" class=" custom-input"><i class="material-icons md-48 custom-input">contact_phone</i>Telephone<span class="text-danger"> *</span></label>
                                    <input id="telephone" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('telephone')}" v-model="telephone" name="telephone" placeholder="Telephone :"  required  v-validate="'required|min:11|max:15|numeric'">
                                    <small v-show="errors.has('telephone')" class="form-text invalid">{{ errors.first('telephone') }}</small>    
                                </div> 
                                <div class=" col-md">
                                    <hr class="custom-input d-md-none d-lg-none d-xl-none">
                                    <label for="sellertype" class="custom-input"><i class="material-icons md-48 custom-input">account_balance</i>Seller Type<span class="text-danger"> *</span></label>
                                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('sellertype')}" id="sellertype" v-model="sellertype" name="sellertype" v-validate="'required'">
                                            <option disabled selected hidden value="undefined">Select Seller :</option>
                                            <option value="private">Private</option>
                                            <option value="trader">Trader</option>
                                    </select>
                                    <small v-show="errors.has('sellertype')" class="form-text invalid">{{ errors.first('sellertype') }}</small>                                            
                                </div>       
                            </div>
                        
                        
                        <div v-if="sellertype=='trader'">
                            <hr class="custom-input">
                            <div class="form-group row custom-input">
                                <div class="col-md">
                                    <label for="business" class="custom-input"><i class="material-icons md-48 custom-input">account_balance</i>Business Name <span class="text-danger"> *</span></label>
                                    <input id="business" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('business')}" v-model="business"  name="business" placeholder="Business Name :" v-validate="'required|min:2|max:255'" >
                                    <small v-show="errors.has('business')" class="form-text invalid">{{ errors.first('business') }}</small>
                                </div>        
                                <div class="col-md">
                                    <hr class="custom-input d-md-none d-lg-none d-xl-none">
                                    <label for="website" class="custom-input"><i class="material-icons md-48 custom-input">language</i>Website Address<span class="text-danger"> *</span></label>
                                    <input id="website" type="text" class="form-control custom-input" v-bind:class="{'invalid' : errors.has('website')}" v-model="website"  name="website" placeholder="Website Address :" v-validate="'required|min:3|max:255|url:strict'" >
                                    <small v-show="errors.has('website')" class="form-text invalid">{{ errors.first('website') }}</small>
                                </div>        
                            </div>    
                        </div>
                        
                        <hr class="custom-input">                        
                       
                        <div class="form-group row">
                            <div class="col custom-input text-center">
                                <button type="submit" class="btn btn-primary btn-lg w-50">{{button}} Seller</button>
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
            telephone: window.old.telephone,
            sellertype: window.old.sellertype,
            business: window.old.business,
            website: window.old.website, 
        }
    },
    computed:{
        button: function(){
            return this.methods == 'patch' ? 'Update' : 'Register';
        }
    },
    props:['methods','sellerId'],
    methods:{
        getGeo: function(){
            if(!(this.$validator.errors.has('postcode') || this.postcode=="" || this.postcode==undefined)){
                delete window.axios.defaults.headers.common['X-CSRF-TOKEN'];
                delete window.axios.defaults.headers.common['X-Requested-With'];
                axios.get("https://api.postcodes.io/postcodes/"+this.postcode).then(response  =>  {
                    this.lat=response.data.result.latitude;
                    this.lng=response.data.result.longitude;
                    this.town=response.data.result.admin_district;
                    this.county=response.data.result.admin_county==null ? response.data.result.region : response.data.result.admin_county;
                    
                }) 
                .catch(error  =>  {
                    this.$validator.errors.add('postcode',error.response.data.error,'postcode.io');
                    this.lat='';
                    this.lng='';                       
                });
                window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                window.axios.defaults.headers.common['X-CSRF-TOKEN']=document.head.querySelector('meta[name="csrf-token"]').content;
            }
        }
    },
    created: function(){
            
    }
 
          
};
</script>
