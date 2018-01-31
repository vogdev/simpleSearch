<template>
<div>
    <div class="columns is-centered">
        <div class="form">
            <div class="column">
                <div class="intro">
                    <h1>laravel simple autocomplete search functionality</h1>
                    <p>try with this words " gmail Mike .com America Balli "</p>
                </div>
                <div class="field has-addons">
                    <div class="control">
                     <input class="input" id="searchinput" v-model="SearchData" type="text" placeholder="Find a user by email or name">
                    </div>
                </div>
                <div class="dropdown-menu" :class="{'is-active': ShowSuggestions}" id="dropdown-menu3" role="menu">
                    <div class="dropdown-content">
                        <div class="dropdown-item" v-for="user in SearchResult" :key="user.id" @click="DisplayUser(user)">
                            <img :src="user.img" alt="">
                            <div class="info">
                                <h1>{{user.name}}</h1>
                                <p>{{user.email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" v-show="ShowUserCard">
        <div class="card-image">
            <figure class="image">
            <img :src="SelectedUser.img" :alt="SelectedUser.name">
            </figure>
        </div>
        <div class="card-content">
            <h1>{{SelectedUser.name}}</h1>
        </div>
    </div>
</div>
</template>

<script>
 import axios from 'axios';
 import _ from 'lodash'
    export default {
        mounted() {
          document.getElementById("searchinput").focus();
        },
        data() {
            return {
                SearchResult:'',
                SearchData:'',
                SelectedUser:{},
                ShowSuggestions: false,
                ShowUserCard: false,
            }
        },
        watch: {    
            SearchData: function(){
                // checking if the Search Data length is >= than 2 if so execute the search method
                if(this.SearchData.length >= 2){
                    this.search()
                }else{
                    this.ShowSuggestions = false
                }
            }
        },
        methods:{
            search: _.debounce(function () {
                    axios.get(`/find/${this.SearchData}`)
                    .then((res)=>{
                        this.SearchResult = res.data
                        if(this.SearchResult.length != 0){
                            // show Suggestions if there is any
                            this.ShowSuggestions = true
                        }
                    })
                }, 1000),
                DisplayUser(user){
                    this.SelectedUser = user 
                    this.ShowUserCard = true
                }
            },
    }
</script>
<style scoped>
.control {
    width: 342px;
}
.column{
    position: relative
}
.dropdown-content {
    padding: 0;
}
.field.has-addons {
    justify-content: center;
    margin-bottom: -5px;
}
.dropdown-menu {
    display: none;
    left: 13px;
    right: 13px;
    min-width: 12rem;
    padding-top: 4px;
    position: absolute;
    top: 45px;
    z-index: 20;
    max-width: 340px;
}
.is-active {
display: block!important;
    position: static;
    margin: 0 auto;
}
.dropdown-item {
    color: #4a4a4a;
    font-size: .875rem;
    line-height: 1.5;
    padding: .375rem 1rem;
    position: relative;
    display: flex;
    align-items: center;
    border: 1px solid #e8e8e8;
    cursor: pointer;
}
.dropdown-item:hover {
    background-color: #f5f5f5;
}
.dropdown-item img{
    width: 40px;
    margin-right: 20px;
}
.info h1{
    color: #1b1b1b;
    font-weight: 700;
    font-size: 15px;
}
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
.intro h1{
    font-size: 19px;
    font-weight: 700;
    text-align: center;
    padding-bottom: 10px;
}
.intro p {
    text-align: center;
    padding-bottom: 10px;
}
</style>
