<template>
   <li v-if="enabled" class="navbar-search hidden-sm">
      <input @keyup="search" v-model="state.keyword" id="search" type="text" placeholder="Search..">
      <button class="btn-search"><i class="fa fa-search"></i></button>
   </li>
</template>

<script>
   export default {
      data() {
         return {
            enabled: false,
            state: {
               keyword: ''
            }
         }
      },

      mounted() {
         this.$bus.$on('enable-search', status => {
            this.enabled = status
         });
      },

      methods: {
         search() {
            this.$bus.$emit('search', this.state.keyword);
         }
      }
   }
</script>