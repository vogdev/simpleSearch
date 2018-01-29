<template>
<div class="container userscontainer">
  <div v-for="user in users" :key="user.id" class="columns card is-centered">
    <div class="column">
      <div class="user-img">
        <img :src="user.img" alt="">
      </div>
      <p>{{user.name}}</p>
      <p>{{user.email}}</p>
      <p>{{user.birthdate}}</p>
    </div>
  </div>
</div>
</template>

<script>
 import axios from 'axios';
    export default {
        mounted() {
         this.fetchData()
        },
        data() {
            return {
                users:'',

            }
        },
       methods:{
            fetchData() {
                axios.get('/getusers')
                          .then((res)=>{
                            this.users  = res.data
                          })
                          .catch((err)=>{
                            console.log(err)
                          })
            },
       }
    }
</script>
<style>
  img {
      width: 50px;
      margin-left: 15px;
  }
  .user-img {
   display: flex;
  }
  .card {
    background: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 2px 3px rgba(0, 0, 0, 0.15);
    height: 65px;
    margin-bottom: 25px!important;
  }
  .userscontainer{
    margin-top: 10vh;
  }
  .card .column {
    display: flex;
    align-items: center;
  }
  .card .column  > * {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    -ms-flex: 1;
    flex: 1;
    font-size: 18px;
    padding-left: 10px;
  }
</style>
