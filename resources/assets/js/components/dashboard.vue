<template>
   <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         <a class="card card-banner card-green-light">
            <div class="card-body">
               <i class="icon fa fa-shopping-basket fa-4x"></i>
               <div class="content">
                  <div class="title">Sale Today</div>
                  <div class="value"><span class="sign">$</span>420</div>
               </div>
            </div>
         </a>

      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         <a class="card card-banner card-blue-light">
            <div class="card-body">
               <i class="icon fa fa-thumbs-o-up fa-4x"></i>
               <div class="content">
                  <div class="title">Page Likes</div>
                  <div class="value"><span class="sign"></span>2453</div>
               </div>
            </div>
         </a>

      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
         <router-link :to="{ name: 'user.index' }" class="card card-banner card-yellow-light">
            <div class="card-body">
               <i class="icon fa fa-user-plus fa-4x"></i>
               <div class="content">
                  <div class="title">New Registration</div>
                  <div class="value"><span class="sign"></span>{{ user }}</div>
               </div>
            </div>
         </router-link>
      </div>
   </div>
</template>

<script>
   export default {
      data() {
         return {
            user: 0
         }
      },

      mounted() {
         // page settings
         this.$root.$data.page = {
            title: 'Dashboard',
            icon: 'fa-dashboard'
         };

         // count total user
         axios.get('/user/count').then(response => {
            this.user = response.data.total;
         });

         this.$bus.$emit('enable-search', false);
      }
   }
</script>