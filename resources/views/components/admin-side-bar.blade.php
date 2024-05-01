 <!--sidebar wrapper -->
 <div class="sidebar-wrapper" data-simplebar="true">
     <div class="sidebar-header">
         <div>
             <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
         </div>
         <div>
             <h4 class="logo-text">Admin</h4>
         </div>
         <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
         </div>
     </div>
     <!--navigation-->
     <ul class="metismenu" id="menu">
         <li>
             <a href="{{ url('/admin/dashboard') }}">
                 <div class="parent-icon"><i class='bx bx-home-circle'></i>
                 </div>
                 <div class="menu-title">Dashboard</div>
             </a>

         </li>
         <li>
             <a href="javascript:;" class="has-arrow">
                 <div class="parent-icon"><i class="bx bx-category"></i>
                 </div>
                 <div class="menu-title">Application</div>
             </a>
             <ul>
                 <li> <a href="app-emailbox.html"><i class="bx bx-right-arrow-alt"></i>Email</a>
                 </li>
                 <li> <a href="app-chat-box.html"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
                 </li>
                 <li> <a href="app-file-manager.html"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
                 </li>
                 <li> <a href="app-contact-list.html"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
                 </li>
                 <li> <a href="app-to-do.html"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
                 </li>
                 <li> <a href="app-invoice.html"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                 </li>
                 <li> <a href="app-fullcalender.html"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
                 </li>
             </ul>
         </li>
         <li class="menu-label">Home</li>
         <li>
             <a href="{{ url('admin/home-banner') }}">
                 <div class="parent-icon"><i class='bx bx-cookie'></i>
                 </div>
                 <div class="menu-title">Home Banner</div>
             </a>
         </li>
         <li>
             <a href="javascript:;" class="has-arrow">
                 <div class="parent-icon"><i class='bx bx-cart'></i>
                 </div>
                 <div class="menu-title">Attributes</div>
             </a>
             <ul>
                 <li> <a href="{{ url('admin/attribute-name') }}"><i class="bx bx-right-arrow-alt"></i>Attribute
                         Name</a>
                 </li>
                 <li> <a href="{{ url('admin/attribute-value') }}"><i class="bx bx-right-arrow-alt"></i>Attribute
                         Value</a>
                 </li>

             </ul>
         </li>
         <li>
             <a href="javascript:;" class="has-arrow">
                 <div class="parent-icon"><i class='bx bx-cart'></i>
                 </div>
                 <div class="menu-title">Category</div>
             </a>
             <ul>
                 <li> <a href="{{ url('admin/category-index') }}"><i class="bx bx-right-arrow-alt"></i>
                         Categories</a>
                 </li>
                 <li> <a href="{{ url('admin/category-attribute') }}"><i class="bx bx-right-arrow-alt"></i>
                         Category Attributes</a>
                 </li>


             </ul>
         </li>
         <li>
             <a href="{{ url('admin/brand') }}">
                 <div class="parent-icon"><i class='bx bx-cookie'></i>
                 </div>
                 <div class="menu-title">Brand</div>
             </a>
         </li>


         <li class="menu-label">Pages</li>

         <li>
             <a href="{{ url('admin/profile') }}">
                 <div class="parent-icon"><i class="bx bx-user-circle"></i>
                 </div>
                 <div class="menu-title">User Profile</div>
             </a>
         </li>





     </ul>
     <!--end navigation-->
 </div>
 <!--end sidebar wrapper -->
