export default {
    methods:{
        validateForm(e) {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    e.srcElement.submit();
                } 
            });
        },      
    },
};