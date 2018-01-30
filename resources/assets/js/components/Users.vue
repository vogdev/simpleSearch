<template>
<div class="container userscontainer">
  <div v-for="user in users" :key="user.id" class="columns card is-centered">
    <div class="column">
      <div class="user-img">
        <img :src="user.img" alt="">
      </div>
      <p class="name">{{user.name}}</p>
      <p class="email" >{{user.email}}</p>
      <p class="date" >{{user.birthdate}}</p>
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
      -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 2px 3px rgba(0, 0, 0, 0.15);
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 2px 3px rgba(0, 0, 0, 0.15);
      height: 65px;
      margin: 0 auto 25px!important;
  }
  .userscontainer{
    margin-top: 10vh;
  }
  .card .column {
    display: flex;
    align-items: center;
    height: 65px;
  }
  .card .column  > * {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    -ms-flex: 1;
    flex: 1;
    font-size: 18px;
    padding-left: 10px;
  }
  .field.has-addons {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: center;
  }
</style>
