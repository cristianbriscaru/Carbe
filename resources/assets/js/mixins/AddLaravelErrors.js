export default {
    created:function(){    
            if(Object.keys(window.errors).length>0){
                for(var error in window.errors){
                    this.$validator.errors.add(error,window.errors[error]['0'],'lv');
                }
            }            
    }       
};