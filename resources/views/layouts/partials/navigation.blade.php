<ul class="sidebar-nav">

   <router-link :to="{ name: 'dashboard' }" active-class="active" tag="li">
     <a href="#">
     <div class="icon">
       <i class="fa fa-dashboard" aria-hidden="true"></i>
     </div>
     <div class="title">Dashboard</div>
     </a>
   </router-link>

   <router-link :to="{ name: 'user.index' }" active-class="active" tag="li">
     <a href="#">
     <div class="icon">
       <i class="fa fa-users" aria-hidden="true"></i>
     </div>
     <div class="title">Users</div>
     </a>
   </router-link>
 </ul>
