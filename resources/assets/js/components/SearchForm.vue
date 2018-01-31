<template>
<div>
    <div class="columns is-centered">
        <div class="form">
            <div class="column">
                <div class="field has-addons">
                    <div class="control">
                     <input class="input" id="searchinput" v-model="SearchData" type="text" placeholder="Find a user by email or name">
                    </div>
                    <div class="control">
                        <a class="button is-info" @click="search()">Search</a>
                         <a class="button" href="/finduser">search autocomplete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" v-show="ShowUserCard">
        <div class="card-image">
            <figure class="image">
            <img :src="user.img" :alt="user.name">
            </figure>
        </div>
        <div class="card-content">
            <h1>{{user.name}}</h1>
        </div>
    </div>
</div>
</template>

<script>
 import axios from 'axios';
    export default {
        mounted() {
          document.getElementById("searchinput").focus();
        },
        data() {
            return {
                user:'',
                SearchData:'',
                ShowUserCard: false,
            }
        },
        methods:{
            search() {
                if(this.SearchData.length != 0){
                    axios.get(`/search/${this.SearchData}`)
                    .then((res)=>{
                        this.ShowUserCard = false 
                    this.user  = res.data
                    this.ShowUserCard = true
                    if(res.data.length === 0){
                        this.ShowUserCard = false 
                    }
                    this.SearchData = ''
                    })
                    .catch((err)=>{
                        console.log(err)
                    })
                }
            },
        }
    }
</script>
<style scoped>
.image img {
    width: 160px;
    height: 160px;
    margin: 0 auto;
    border-radius: 50%;
}
.card {
    padding: 20px;
    max-width: 340px;
    height: 300px;
    margin: 0 auto;
}
.card-content {
    text-align: center;
    font-size: 25px;
}
</style>
