<template>
   <div class="row"> 
      <div class="btn-floating" id="help-actions">
         <div class="btn-bg"></div>
         <router-link :to="{ name: 'user.create' }" class="btn btn-default btn-toggle">
            <i class="icon fa fa-plus"></i>
         </router-link>
      </div>

      <div class="col-xs-12">
         <div class="card">
            <div class="card-header">
               User Management
            </div>
            <div class="card-body no-padding">
               <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Registered at</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(user, index) in users.data">
                        <td>{{ users.from + index }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                           <router-link :to="{ name: 'user.profile', params: {id: user.id }}" class="btn btn-xs btn-default">
                              <i class="fa fa-user fa-fw"></i>
                           </router-link>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <pagination :data="users"></pagination>
      </div>
   </div>
</template>

<script>
   export default {
      data() {
         return {
            url: '/user/paginate',
            users: []
         }
      },

      mounted() {
         this.paginate(this.url);

         this.$bus.$on('pagination', url => {
            this.paginate(url);
         });
      },

      methods: {
         paginate(url, params = {}) {
            axios.get(url, {params}).then(response => {
               this.users = response.data;
            })
         }
      }
   }
</script>