require('./bootstrap');
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);
import VeeValidate from 'vee-validate';
Vue.use(VeeValidate, {delay: 500, events:'input', classes: true,});
var SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);
import RadialProgressBar from 'vue-radial-progress';


import SellerCreate from './components/SellerCreate';
import FormValidation from './Mixins/FormValidation';
import AdvertCreate from './components/AdvertCreate';
import Search from './components/Search';

Vue.component('post-code', require( './components/Postcode' )) ;
Vue.component('make-model', require( './components/MakeModel' )) ;
Vue.component('save-favorite', require( './components/SaveFavorite' )) ;
Vue.component('search', require( './components/Search' )) ;
Vue.component('login', require( './components/Login' )) ;
Vue.component('head-app', require( './components/HeadApp' )) ;
Vue.component('alert', require( './components/Alert' )) ;

var vm = new Vue({
    el: '#app',
    mixins:[FormValidation],
    components:{
        SellerCreate,
        AdvertCreate,
        RadialProgressBar
       
    },
    data:{
        auth:window.auth,
        name:window.name,
        alert:window.alert,
    },
    created:function (){
        
    }    
    
});

