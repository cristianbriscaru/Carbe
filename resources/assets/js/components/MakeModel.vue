<template>
    <div class="col">
        <div class="row">
                <div class="col">
                    <label for="make" class="custom-input">Make<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" required v-bind:class="{'invalid' : errors.has('make')}" id="make" v-model="make" name="make" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Make :</option>
                        <option v-if="anyOther=='Any'" value="OTHER">Any</option>
                        <option v-for="make in makes" :value="make">{{make | ucfirst}}</option>
                        

                    </select>                    
                    <small v-if="errors.has('make')" class="form-text invalid">{{ errors.first('model') }}</small>
                </div>       
                <div class="col">
                    <label for="model" class="custom-input">Model<span class="text-danger"> *</span></label>
                    <select class="custom-select custom-input" v-bind:class="{'invalid' : errors.has('model')}" id="model" v-model="model" name="model" v-validate="'required'">
                        <option disabled selected hidden value="undefined">Model :</option>
                        <option v-if="anyOther=='Any' && make!=undefined" value="OTHER">Any</option>
                        <option v-for="model in models" :value="model">{{model | ucfirst}}</option>
                        
                    </select>                    
                    <small v-if="errors.has('model')" class="form-text invalid">{{ errors.first('model') }}</small>
                </div>
        </div>
    </div>                    
</template>

<script>

export default {
    inject: ['$validator'],
    data(){
        return{
            makes:[],
            models:[],
            make:this.pmake,
            model:this.pmodel,
            prevMake:'',
        } 
    },
    props:['pmake','pmodel','anyOther'],
    watch:{
        make: function(make){
            if(make != this.prevMake && make != undefined){
                this.model='undefined';
                this.setModels(make);
                this.prevMake=make;
                if(make=='OTHER'){
                    this.model=make;
                }
            }
            this.emitMakeModel();
        },
        model: function(model){
            this.emitMakeModel();
        },
        pmake: function(pmake){
            this.make=pmake;
        },
        pmodel: function (pmodel){
            this.model=pmodel;
        },

    },
  
    methods:{
            setModels(make){
                    axios.post("http://carbe.co.uk/modelslookup",{make:this.make}).then(response  =>  { 
                        this.models=response.data;                                                   
                    }) 
                    .catch(error  =>  {
                        this.$validator.errors.add('model','Something went wrong!','Server');                        
                    });
                } ,
            emitMakeModel(){
                this.$emit('makeModel', this.make , this.model );
            }
    },
    filters:{
        ucfirst: function(string){
            return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
        }
    },
    created: function(){      
        this.makes = (typeof window.makes == undefined) ? [] : window.makes;
        this.models = (typeof window.models == undefined) ? [] : window.models;
        if(this.make != undefined){
            this.setModels(this.make);
        }
        this.emitMakeModel(); 
    },       
};
</script>
