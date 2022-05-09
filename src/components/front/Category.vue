<template>
  <div class="products">
         <div class="container" v-if="isLoad == false">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Categorys :</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="our_products">
                     <div class="row">
                        <div class="col-md-4 margin_bottom1" v-for="(item,index) in data" :key="index">
                           <div class="product_box">
                              <router-link :to="'/category/'+item.id"><h3>{{item.name}}</h3></router-link>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container" v-if="isLoad == true">
            Loding ..
        </div>
      </div>
</template>

<script>
import axios from 'axios';
import { RouterLink, RouterView } from 'vue-router'
import api from '@/router/base.js';

let baseUrl = api;
export default {

data(){
    return {
        
        data : null,
        isLoad : true
        
    }
},
created(){
    axios.get(baseUrl+'CategoryController.php?m=index')
        .then(response => (this.data = response.data.data,this.isLoad = false,console.log(this.data)))
        .catch(error => (this.isLoad = true,console.log("Error get data")));
}

}
</script>

<style>

</style>