<template>
	<div class="row">
		<h1>Create User</h1>

		<div class="btn-floating">
           <div class="btn-bg"></div>
           <router-link :to="{ name: 'user.index' }" class="btn btn-danger btn-toggle">
             <i class="icon fa fa-arrow-left"></i>
           </router-link>
         </div>
	</div>
</template>