export default {
    methods:{
        validateForm(e) {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    var form = e.target || e.srcElement;
                    form.submit();
                } 
            });
        },      
    },
};