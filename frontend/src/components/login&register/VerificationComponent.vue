<template>
    <div class="OTPVerification">
        <h4 class="text-success text-center mb-3">OTP Verification</h4>
        <form action="">
            <input type="text" name="" id="" class="form-control">
            <div class="text-center mt-3">
                <button class="btn btn-success">Verify</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    name:"VerificationComponent",
    data(){
        return{

        }
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