<template>
  <div v-if="isLogout == false">
    logout is loading..
  </div>

    <div v-if="isLogout == true">
        logout is success..
  </div>
</template>

<script>
export default {
    data(){
        return {
            isLogout : false,
        }
    },
    created(){
        localStorage.setItem('userInfo',null),
        this.isLogout = true;
        window.location.href = '/dist';
    }
}
</script>

<style>

</style>