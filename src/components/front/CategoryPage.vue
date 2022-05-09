<template>
  <div class="products">
         <div class="container" v-if="isLoad == false && data != false">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>{{titleCategory}}</h2>
                  </div>
               </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col-md-4" v-for="(item,index) in data" :key="index">
                <div class="card h-100">
                <img :src="'/backend/'+item.logo" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{item.name}}</h5>
                    <p class="card-text">{{item.description}} .</p>
                </div>
                <div class="card-footer" :style="'display: flex;justify-content: space-between;'">
                    <small class="text-muted">
                    <div id="rating">
                        <p class="card-text"><b>Category</b>  <span v-for="(cat,i) in item.category" :key="i">{{cat.name}}</span></p>
                    </div>
                    </small>
                    <router-link :to="'/store/'+item.id">More >></router-link>
                </div>
                </div>
            </div>
           
            </div>
         </div>
         <div class="container" v-if="isLoad == true">
            Loding ..
        </div>
         <div class="container" v-if="isLoad == false && data == false">
            No Result .
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
        id : this.$route.params.id,
        data : null,
        isLoad : true,
        titleCategory : ""
        
        
    }
},
created(){
    axios.get(baseUrl+'CategoryController.php?m=show&id='+this.id)
        .then(response => {
            if(response.data.data != null){
                this.data = response.data.data,
                this.isLoad = false,
                console.log(this.data);
                this.titleCategory = response.data.data[0].category[0].name
            }else{
                this.data = false
            }
            })
        .catch(error => (this.data = false,console.log("Error get data")));
}

}
</script>

<style>

</style>