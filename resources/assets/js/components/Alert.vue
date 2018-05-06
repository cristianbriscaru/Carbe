<template>
        <b-alert 
            :show="dismissCountDown"
            dismissible
            :variant="alert.variant"
            @dismissed="dismissCountDown=0"
            @dismiss-count-down="countDownChanged"
            :class="classes" 
            
        >   
            <h4 :class="[ alert.variant == 'warning' ? 'text-secondary' : 'text-light' ]">{{alert.title}}</h4>
            <hr>
            <p class="h5 font-weight-bold">{{alert.message}}</p>
            <b-progress variant="secondary"
                        :max="dismissSecs"
                        :value="dismissCountDown"
                        height="4px">
            </b-progress>
        </b-alert>
</template>

<script>
export default{
    
    data(){
        return{
            dismissSecs: 10,
            dismissCountDown:0,
        }
    },
    watch:{
        alert: function(alert){
            this.showAlert();
        }
    },
    props:['alert','position'],
    computed:{
        classes:function(){
            return this.position == 'fixed' ?  "w-75 mx-auto custom-shadow text-center fixed-alert" : "w-75 mx-auto custom-shadow text-center";
        }
    }, 
    methods:{
        countDownChanged (dismissCountDown) {
        this.dismissCountDown = dismissCountDown
        },
        showAlert () {
            if(this.alert){
                this.dismissCountDown = this.dismissSecs
            }
        },
    },
    created: function() {
        this.showAlert();
    }
}
</script>