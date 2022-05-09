<template>
    <div class="container">
        <div class="card mb-3" style="height: 500px;overflow: hidden;" v-if="isLoad == false">
            <div class="row g-0" style="height: 100%;overflow: hidden;">
                <div class="col-md-4 imgSection">
                <img :src="'/backend/'+data.logo" class="img-fluid rounded-start" :alt="data.name">
                </div>
                <div class="col-md-8" style="display: flex;align-items: center;">
                <div class="card-body">
                    <h5 class="card-title"><span class="titlePrudact">Title : </span>{{data.name}}</h5>
                    <p class="card-text"><span class="titlePrudact">Description : </span>{{data.description}} .</p>
                    <br>
                    <div id="category">
                        <p class="card-text"><b>Category</b> <span class="raduBtn">{{data.category.name}}</span></p>
                        
                    </div>
                    <div id="rating">
                        <p class="card-text"><b>Rating</b>  <span class="raduBtn">Like {{data.rating.like}}</span> ,  <span class="raduBtn">Dislike {{data.rating.dislike}}</span></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        
        <div v-if="isLoad == true">
            Loding ..
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import api from '@/router/base.js';

let baseUrl = api;
export default {

data(){
    return {
        id : this.$route.params.id,
        data : null,
        isLoad : true
        
    }
},
created(){
    axios.get(baseUrl+'StorController.php?m=show&id='+this.id)
        .then(response => (this.data = response.data.data[0],this.isLoad = false,console.log(this.data.id)))
        .catch(error => (this.isLoad = true,console.log("Error get data")));
}

}
</script>

<style>
span.titlePrudact {
    font-size: 20px;
    font-weight: bold;
    color: #6e788f;
}
.img-fluid {
    max-width: 100%;
    height: 50%;
    object-fit: contain;
    padding: 22px;
}
.card.mb-3 {
    margin-top: 50px;
}
.imgSection {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
        border-right: 1px solid #ddd;

}

.raduBtn {
    background: #ddd;
    border-radius: 25px;
    padding: 2px 6px;
}
div#category {
    margin-bottom: 13px;
}
</style>