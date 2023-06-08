<template>
    <div class="contain">
        <VerificationComponent  :email="email"/>
    </div>
</template>

<script>
import VerificationComponent from '@/components/login&register/VerificationComponent.vue'
export default {
    name:"VerificationView",
    props:['email'],
    components:{
        VerificationComponent
    },
    mounted(){
        console.log(this.$route.props);
    }
}
</script>

<style scoped>

</style>