<template>
    <li class="list-inline-item mx-1 save-favorite " id="favorite">
        <span @click="saveFavorite" class="btn btn-light text-secondary bg-white border-0">
        <img :src="src" alt="Favorite" class="img-fluid share-icon" height="36" width="36"> 
        Favorite+ 
        </span>
        <b-tooltip target="favorite" title="Save to Favorites"></b-tooltip>
        <span>
        <b-modal v-model="showAlert" id="modal"
            size="md"
            centered
            lazy
            :title="alert.title"
            :headerTextVariant="text"
            :header-bg-variant="header"
            footer-bg-variant='light'
            ok-only
            ok-variant="secondary"
            ok-title="Close"
        >
            <div  class="rounded text-center mt-5" :class="[ alert.variant == 'alert-success' ? 'alert-success' : 'alert-warning' ]">
                <h5 class="font-weight-bold pt-5 text-secondary" :class="[ alert.variant == 'alert-success' ? 'text-light' : 'text-secondary' ]">{{alert.title}}</h5>
                <hr class="custom-input">
                <p class="pb-3">{{alert.message}}</p>
                <div v-if="alert.variant == 'alert-warning'" class=" pb-5">
                    <p class=" text-dark"> Please see our Help page for more information on Favorite Car Adverts</p>
                    <a class="btn btn-info px-5" href="http://carbe.co.uk/help" role="button"><i class="material-icons pr-3">help_outline</i>  Help  </a>
                </div>
            </div> 
        </b-modal>
        </span>
    </li> 

</template>

<script>

export default{
    data(){
        return{
            src:"http:/\/carbe.co.uk/media/app/if_star_green.png",
            prevAdvert:'',
            alert:false,
            showAlert:false,
            success:false,

            
        }
    },
    computed:{
        header: function(){
            return this.alert.variant == 'alert-success' ? 'info' : 'warning' ;
        },
        text: function(){
            return this.alert.variant == 'alert-warning' ? 'secondary' : 'light' ;
        }
    },
    watch:{
        alert: function(alert){
            this.showAlert=true;
            setTimeout(()=>{   
                this.showAlert=false;
            },10000);
        }
    },
    props:['advert'],
    methods:{
        saveFavorite(){
            if( this.advert != this.prevAdvert || this.success == false ){ 
                    this.prevAdvert=this.advert;
                    axios.post("http://carbe.co.uk/favorite",{advert_id:this.advert}).then(response  =>  { 
                        this.success=true;
                        this.src="http:/\/carbe.co.uk/media/app/if_check_1930264.png";
                        this.alert={'variant':'alert-success','title':'Your Favorite Car Advert has been saved', 'message':'Favorite Car Advert has been saved and can be viewed from your Dashboard'};                                                                                                                          
                    }) 
                    .catch(error  =>  {
                        this.src="http:/\/carbe.co.uk/media/app/if_star_orange.png";
                        if(error.response.status == 401){
                        this.alert={'variant':'alert-warning','title':'Error Saving Favorite Car Advert', 'message':'Please login in order to save Favorite Car Adverts'};                                                                       
                        }
                        else if(error.response.status == 405){
                            this.alert={'variant':'alert-warning','title':'Maximum Number of Adverts Reached', 'message':'You have reached your maximum number of 25 Saved Favorite Car Adverts'};                                                                       
                        }
                        else{
                            this.alert={'variant':'alert-warning','title':'Error Saving Favorite Car Advert', 'message':'Something went wrong while trying to save Favorite Car Advert'};                                                                       
                        }                         
                    }); 
            }
            else if(this.advert == this.prevAdvert && this.success == true) {
                this.alert={'variant':'alert-info','title':'Your Favorite Car Advert already saved', 'message':'Your Favorite Car Advert has already been saved and can be viewed from your Dashboard'};                                                                                                                          
                
            }          
        },
    },


}



</script>
