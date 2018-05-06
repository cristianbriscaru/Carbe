<template>
<input type="hidden" name="_token" :value="csrf">
</template>
<script>
export default{ 
    data(){
        return{
            csrf:document.head.querySelector('meta[name="csrf-token"]').content,
        }
    }          
}

</script>