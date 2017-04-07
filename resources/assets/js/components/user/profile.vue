<template>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body app-heading">
               <img class="profile-img" :src="user.gravatar_url" :alt="user.name">
               <div class="app-title">
                  <div class="title"><span class="highlight">{{ user.name }}</span></div>
                  <div class="description">{{ user.email }}</div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-md-12">
         <router-link :to="{ name: 'user.index' }" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
         </router-link>
      </div>
   </div>
</template>

<script>
   export default {
      data() {
         return {
            url : '/user/',
            user: []
         }
      },

      mounted() {
         this.$root.$data.page.title = 'Users';
         let url = this.url + this.$route.params.id;
         this.show(url);
      },

      methods: {
         show(url, params = {}) {
            axios.get(url, {params}).then(response => {
               this.user = response.data;
            });
         } 
      }
   }
</script>