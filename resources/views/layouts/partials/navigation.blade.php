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

   <li class="dropdown ">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <div class="icon">
         <i class="fa fa-cube" aria-hidden="true"></i>
       </div>
       <div class="title">UI Kits</div>
     </a>
     <div class="dropdown-menu">
       <ul>
         <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> UI Kits</li>
         <li><a href="./uikits/customize.html">Customize</a></li>
         <li><a href="./uikits/components.html">Components</a></li>
         <li><a href="./uikits/card.html">Card</a></li>
         <li><a href="./uikits/form.html">Form</a></li>
         <li><a href="./uikits/table.html">Table</a></li>
         <li><a href="./uikits/icons.html">Icons</a></li>
         <li class="line"></li>
         <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Advanced Components</li>
         <li><a href="./uikits/pricing-table.html">Pricing Table</a></li>
         <!-- <li><a href="./uikits/timeline.html">Timeline</a></li> -->
         <li><a href="./uikits/chart.html">Chart</a></li>
       </ul>
     </div>
   </li>
   <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <div class="icon">
         <i class="fa fa-file-o" aria-hidden="true"></i>
       </div>
       <div class="title">Pages</div>
     </a>
     <div class="dropdown-menu">
       <ul>
         <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Admin</li>
         <li><a href="./pages/form.html">Form</a></li>
         <li><a href="./pages/profile.html">Profile</a></li>
         <li><a href="./pages/search.html">Search</a></li>
         <li class="line"></li>
         <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Landing</li>
         <!-- <li><a href="./pages/landing.html">Landing</a></li> -->
         <li><a href="./pages/login.html">Login</a></li>
         <li><a href="./pages/register.html">Register</a></li>
         <!-- <li><a href="./pages/404.html">404</a></li> -->
       </ul>
     </div>
   </li>
 </ul>
