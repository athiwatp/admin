<template>
<div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  Create new user
               </div>
               <div class="card-body">
                  <form @submit.prevent="store" method="post" action="/user/store" class="form form-horizontal">
                     <div class="section">
                        <div class="section-title">Basic Information</div>
                        <div class="section-body">

                           <div :class="['form-group', errors.name ? 'has-error' : '']">
                              <label class="col-md-3 control-label">Name</label>
                              <div class="col-md-5">
                                 <input v-model="state.name" type="text" class="form-control">
                                 <span v-if="errors.name" class="label label-danger">
                                    {{ errors.name[0] }}
                                 </span>
                              </div>
                           </div>

                           <div :class="['form-group', errors.name ? 'has-error' : '']">
                              <label class="col-md-3 control-label">Email Address</label>
                              <div class="col-md-5">
                                 <input v-model="state.email" type="text" class="form-control">
                                 <span v-if="errors.email" class="label label-danger">
                                    {{ errors.email[0] }}
                                 </span>
                              </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-3">
                                 <label class="control-label">About</label>
                                 <p class="control-label-help">short detail of products , 150 max words</p>
                              </div>
                              <div class="col-md-9">
                                 <textarea class="form-control"></textarea>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="section">
                        <div class="section-title">Credentials</div>
                        <div class="section-body">

                           <div :class="['form-group', errors.password ? 'has-error' : '']">
                              <label class="col-md-3 control-label">Password</label>
                              <div class="col-md-9">
                                 <input v-model="state.password" type="password" class="form-control">
                                 <span v-if="errors.password" class="label label-danger">
                                    {{ errors.password[0] }}
                                 </span>
                              </div>
                           </div>

                        </div>
                     </div>

                     <div class="form-footer">
                        <div class="form-group">
                           <div class="col-md-9 col-md-offset-3">
                              <button type="submit" class="btn btn-success btn-submit">Save</button>
                              <button @click="cancel" type="button" class="btn btn-default">Cancel</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </template>

<script>
   export default {
      data() {
         return {
            loading: false,
            errors: [],
            state: {
               name: '',
               email: '',
               password: ''
            }
         }
      },

      methods: {
         store(e) {
            axios.post(e.target.action, this.state).then(response => {
               if (response.data.status == true) {
                  this.errors = [];

                  this.state = {
                     name: '',
                     email: '',
                     password: ''
                  }
               }
            }).catch(error => {
               if (! _.isEmpty(error)) {
                  if (error.response.status == 422) {
                     this.errors = error.response.data;
                  }
               }
            });
         },

         cancel() {
            this.$router.replace({name: 'user.index'});
         }
      }
   }
</script>