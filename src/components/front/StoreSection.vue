<template>

  <div class="three_box">
         <div class="container">
            <div class="mb-3">
            <input type="text" class="form-control" id="serch_store" placeholder="Serching for Stores..." v-model="name">
            
            </div>
            <div class="row"  >
                <div v-if="data == false" v-text="`No Result Data`" class="center"></div>
                <div v-if="load == true" v-text="`Loading...`" class="loding center"></div>
                <div v-if="isSearch == true" v-text="`Searching...`" class="loding center"></div>
                <div class="col-md-4" v-for="(item,index) in data" :key="index">
                    <div class="card h-100">
                    <img :src="'/backend/'+item.logo" class="card-img-top" :alt="item.name" :style="'height: 150px;object-fit: contain;'">
                    <div class="card-body">
                        <h5 class="card-title">{{item.name}}</h5>
                        <p class="card-text">{{item.description}} .</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">
                            <div v-if="userInfo == null || userInfo == undefined">Login , send rating</div>
                        <div class="rating" v-if="userInfo != null || userInfo != undefined">
                            <button :id="'like-'+item.id" @click="sendLike(index,item.id)">Like<span>{{item.rating.like}}</span></button>
                            <button id="dislike" @click="sendDisLike(index,item.id)">Dislike <span>{{item.rating.dislike}}</span></button>
                        </div>
                            <router-link :to="'/store/'+item.id" class="more">More .</router-link>
                        </small>
                    </div>
                    </div>
                </div>

            </div>
         </div>
      </div>
      
</template>

<script >
import axios from 'axios';
import { RouterLink, RouterView } from 'vue-router'
import api from '@/router/base.js';
let baseUrl = api;
export default {


    created(){
        axios.get(baseUrl+'StorController.php?m=index')
        .then(response => (this.data = response.data.data,this.load = false))
        .catch(error => (this.data = false,this.load = false));
        
    },
    data(){
        return {
            data : null,
            load : true,
            userInfo : JSON.parse(localStorage.getItem('userInfo')),
            name : "",
            isSearch : false
        }
    },
    methods :{
        sendLike(index,id){
            let formData = {
                "stor_id":id,
                "user_id" : this.userInfo.id,
                "like":1,
                "dislike":0
            };
            axios.post(baseUrl+'RatingController.php?m=store',formData)
            .then(response => (
                // document.querySelector(el+' span').innerHTML = response.data.data[0].rating.like
                this.data[index].rating.like = response.data.data[0].rating.like,
                this.data[index].rating.dislike = response.data.data[0].rating.dislike,
                console.log(this.data[index].rating.like)
            ))
            .catch(error => (console.log("error rating")));
        },
        sendDisLike(index,id){
            let formData = {
                "stor_id":id,
                "user_id" : this.userInfo.id,
                "like":0,
                "dislike":1
            };
            axios.post(baseUrl+'RatingController.php?m=store',formData)
            .then(response => (
                // document.querySelector(el+' span').innerHTML = response.data.data[0].rating.like
                this.data[index].rating.like = response.data.data[0].rating.like,
                this.data[index].rating.dislike = response.data.data[0].rating.dislike,
                console.log(this.data[index].rating.dislike)
            ))
            .catch(error => (console.log("error rating")));
        },
        search(n){
            this.isSearch = true;
            axios.get(baseUrl+'StorController.php?m=search&name='+n)
        .then(response => {
            this.data = response.data.data,this.load = false;
            this.isSearch = false;
        })
        .catch(error => (this.data = false,this.load = false));

        }

    },
    watch : {
        name(n,o){
            this.search(n)
        }
    }
}
</script>

<style>
.rating {
    display: flex;
    margin-top: 8px;
}
.rating button:hover {
    background: #0848ae;
    transition: .4s;
}
.rating button {
    background: #5c5c5c;
    margin-right: 10px;
    padding: 4px 9px;
    color: #fff;
    border-radius: 26px;
}
.rating span {
    color: #a6e9cd;
}
input#serch_store {
    padding: 10px;
    width: 100%;
    overflow: hidden;
    margin-bottom: 23px;
    border: #0848ae solid 1px;
    /* border: #48ca95 solid 1px;
    border-radius: 15px; */
    text-align: left;
}
.col-md-4 {
    margin-bottom: 20px;
}
.more{
    font-size: 14px;
}
small.text-muted {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
</style>