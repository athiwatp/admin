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
               User Managements
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
                        <td>
                           {{ user.name }}
                           <span v-if="user.id == currentId" class="label label-info">It's You!</span>
                        </td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                           <router-link :to="{ name: 'user.profile', params: {id: user.id }}" class="btn btn-xs btn-default">
                              <i class="fa fa-user fa-fw"></i>
                           </router-link>

                           <router-link :to="{ name: 'user.edit', params: {id: user.id}}" class="btn btn-info btn-xs">
                              <i class="fa fa-edit fa-fw"></i>
                           </router-link>

                           <button-delete :index="index" :url="'/user/' + user.id"></button-delete>
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
            currentId: null,
            users: []
         }
      },

      mounted() {
         // page settings
         this.$root.$data.page = {
            title: 'Users',
            icon: 'fa-users'
         };
         
         this.paginate(this.url);

         // set logged id
         this.currentId = this.$root.$data.app.user.id;

         this.$bus.$on('pagination', url => {
            this.paginate(url);
         });

         // enable search
         this.$bus.$emit('enable-search', true);

         // on search
         this.$bus.$on('search', keyword => {
            let params = {
               keyword: keyword
            }

            this.paginate(this.url, params);
         });

         // on delete
         this.$bus.$on('delete', index => {
            this.users.data.splice(index, 1);
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