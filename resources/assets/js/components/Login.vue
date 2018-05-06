<template> 
        <form class="m-5">
        <div class="row justify-content-center"> 
            <div class="col-12 col-md-10 mx-3">   
            <div class="form-group row custom-input">
                <label for="login-email" class="col-5 col-form-label col-form-label custom-input"><i class="material-icons md-48 custom-input">email</i>Email<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input ref="focusThis" id="login-email" type="email" class="form-control  custom-input" name="email" v-model="email" placeholder="Enter Email :"  required autofocus v-validate="'required|email|max:255'">
                </div>
                
            </div>
            <hr class="custom-input">
            <div class="form-group row custom-input">
                <label for="login-password" class="col-5 col-form-label col-form-label  custom-input"><i class="material-icons md-48 custom-input">lock</i>Password<span class="text-danger"> *</span></label>
                <div class="col-7">
                    <input id="login-password" type="password" class="form-control  custom-input" placeholder="Enter Password:" name="password" v-model="password" required v-validate="'required|min:6|max:255'" >
                </div>
            </div>
            <hr class="custom-input">
            <div class="form-group row  custom-input">
                <div class="w-100 mb-2">
                <small v-if="errors.has('auth') || errors.has('email') || errors.has('password')" class="form-text text-center custom-input invalid text-truncate">{{ errors.first('auth') }} {{ errors.first('password') }} {{ errors.first('email') }}</small>
                </div>
                <button type="button" class="btn btn-primary w-50 mx-auto" @click="logIn" >Login</button>
            </div> 
            <div id="login-help" class="form-group row custom-input text-center">
                <div class="col-6 justify-content-center">

                    <a class="btn btn-warning" href="http://carbe.co.uk/password/reset" role="button" >Forgot Password</a>
                    
                </div>
                <div class="col-6  justify-content-center">

                    <a class="btn btn-info" href="http://carbe.co.uk/register" role="button" >Register</a>
                    
                </div>
            </div>
            </div>             
        </div>
        </form>
</template>
error
<script>

    export default{
        data(){
            return{
                email:'',
                password:'',
                auth:this.$root.$data.auth,

            }
        },
        methods:{
            logIn(){

                this.$validator.validateAll();
                if(!(this.$validator.errors.has('email') || this.$validator.errors.has('password') || this.auth))
                    axios({
                        method:'post',
                        url:"http://carbe.co.uk/login",
                        data:{
                            email:this.email,
                            password:this.password,
                            ajax:true,
                        }  
                    })
                    .then(response  =>  {
                        this.$emit('authenticated', response.data.auth , response.data.name );
                        this.$root.$data.auth=response.data.auth;
                        this.$root.$data.name=response.data.name; 
                        if(window.location.href == 'http://carbe.co.uk/register' || window.location.href == 'http://carbe.co.uk/login' || window.location.href.split('/reset')[0] == 'http://carbe.co.uk/password' ){
                            window.location.replace("http://carbe.co.uk");
                        }                       
                    }) 
                    .catch(error  =>  { 
                        if(error.response.status = 422){
                            this.$validator.errors.add('auth','These credentials do not match our records.','password'); 
                        }
                        else{
                            this.$validator.errors.add('auth','Something went wrong. Unable to login','password');
                        }                       
                    }); 
            },
            focusMyElement (e) {
                this.$refs.focusThis.focus()
            },

        },
    }
</script>

