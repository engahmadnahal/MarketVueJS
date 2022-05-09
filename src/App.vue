<script >
import { RouterLink, RouterView } from 'vue-router'
import { fromJSON } from 'postcss';

export default {

   data(){
      return {
         userInfo: null
      }
   },
   created(){
      this.userInfo = JSON.parse(localStorage.getItem('userInfo'));
      console.log(this.userInfo);
   }
}
</script>

<template>
   <header>
      
            <div class="alert alert-success d-flex align-items-center" role="alert" v-if="userInfo != null || userInfo != undefined">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"></use></svg>
            <div>
               Hello Mr.{{userInfo.name}}
            </div>
            </div>
            <!-- header inner -->
            <div class="header">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 Markets Manger
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 
                                 
                                 <li class="nav-item ">
                                    <RouterLink :to="{name : 'home'}" class="nav-link">Home</RouterLink>
                                 </li>
                                 <span  class="auth">
                                    <li class="nav-item" v-if="userInfo == null || userInfo == undefined">
                                       <RouterLink :to="{name : 'Register'}" class="nav-link" id="registerR">Register</RouterLink>
                                    </li>
                                    </span>
                                 <span  class="auth">
                                    <li class="nav-item" v-if="userInfo == null || userInfo == undefined">
                                       <RouterLink :to="{name : 'Login'}" class="nav-link" id="loginR">Login</RouterLink>
                                    </li>
                                 </span>
                                 <li class="nav-item" v-if="userInfo != null || userInfo != undefined">
                                       <RouterLink :to="'/logout/'+userInfo.id" class="nav-link" id="LogoutR">Logout</RouterLink>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
   </header>

  <RouterView />

</template>

<style>
@import '@/assets/front/css/bootstrap.min.css';
@import '@/assets/front/css/style.css';
@import '@/assets/front/css/responsive.css';
@import '@/assets/front/css/jquery.mCustomScrollbar.min.css';

.logo{
    color: #fff;
    text-align: center;
    font-size: 20px;;
}
.header {
    background: #373464;
    position: relative;
}
section.banner_main {
    display: none;
}
.center {
    text-align: center;
    width: 100%;
}
.alert.alert-success.d-flex.align-items-center {
    margin: 0;
}
</style>
