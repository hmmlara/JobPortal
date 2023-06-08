<template>
    <div class="OTPVerification">
        <h4 class="text-success text-center mb-3">OTP Verification</h4>
        <form action="">
            <input type="text" name="" id="" class="form-control">
            <div class="text-center mt-3">
                <button class="btn btn-success" v-if="verify">Verify OTP</button>
                <button class="btn btn-success" v-else>Resend OTP</button>
            </div>
        </form>
    </div>
</template>

<script>
import Apicalls from "@/api/index";
export default {
    name:"VerificationComponent",
    props:["email"],
    data(){
        return{
            verify:true,
            formData : new FormData()
        }
    },
    mounted(){
        this.requestOTP();
    },
    methods:{
        requestOTP() {
            this.formData.append("email",this.email);
            Apicalls.post("requestOTP",this.formData);
            console.log(this.email);
            this.verify=true;
        },
        // verifyOTP(){
        //     A
        // }
    }
}
</script>

<style scoped>
.OTPVerification{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}
</style>