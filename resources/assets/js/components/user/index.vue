<template>
   <div class="row"> 
        <div class="btn-floating" id="help-actions">
           <div class="btn-bg"></div>
           <router-link :to="{ name: 'user.create' }" class="btn btn-default btn-toggle">
             <i class="icon fa fa-plus"></i>
           </router-link>
         </div>

      <div class="col-md-12">
         <div class="card">
            <div class="header">
               <h4 class="title">User Managements</h4>
               <p class="category">You can create, edit, and delete users here</p>
            </div>
            <div class="content table-responsive table-full-width">

               <table class="table table-hover table-striped">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Registered</th>
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
                           <router-link :to="{ name: 'user.profile', params: {id: user.id} }" class="btn btn-xs btn-info btn-fill">
                              <i class="fa fa-user"></i>
                           </router-link>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <ul class="pagination">
            <li v-if="users.prev_page_url">
               <a @click.prevent="paginate(users.prev_page_url)" :href="users.prev_page_url">&laquo; Previous</a>
            </li>
            <li v-if="users.next_page_url">
               <a @click.prevent="paginate(users.next_page_url)" :href="users.next_page_url">Next &raquo;</a>
            </li>
         </ul>
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