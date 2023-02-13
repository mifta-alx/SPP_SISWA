       <!--  BEGIN CUSTOM STYLE FILE  -->
       <!-- <link href="<?= base_url(); ?>/template/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" /> -->
       <!--  END CUSTOM STYLE FILE  -->
       <!--  BEGIN CONTENT AREA  -->
       <!-- <div id="content" class="main-content">
            <div class="layout-px-spacing"> -->
       <style>

           .icp {
               font-size: 22px;
               text-align: justify;
               color: var(--moredark);
           }

           .txt {
               padding: 3px;
           }

           .sosmed:hover {
               color: white;
               padding: 8px;
               background-color: var(--moredark);
               border-radius: 50px;
               font-size: 30px;
           }
           .sosmed{
               font-size: 30px;
               color: var(--moredark);
               padding: 8px;
               border-radius: 50px;
               background-color: white;
           }
           h5 {
               font-weight: 600;
           }

           .card4 {
               box-shadow: 2px 5px 17px 0 rgb(31 45 61 / 17%);
               border-radius: 10px;
           }

           .b-skills {
               padding: 30px 30px 24px;
           }

           .b-title {
               font-size: 16px;
               margin-bottom: 10px;
               font-weight: 700;
               color: #3b3f5c;
           }

           .b-body {
               font-size: 13px;
               color: #888ea8;
               margin-bottom: 10px;
               font-weight: 300;
               font-family: 'Nunito', sans-serif;
           }
       </style>

       <div class="row container-fluid m-0">

           <!-- Content -->
           <div class="col-xl-5 col-lg-6 col-md-5 col-sm-12 card shadow mb-4">

               <!-- <div class="user-profile layout-spacing"> -->
               <div class="card-title px-4 pt-3 pb-0">

                   <div class="d-flex justify-content-between row">
                       <div class="col-9 p-2">
                           <h5 class="mb-2" style="color: var(--moredark)">Profile</h5>
                       </div>
                       <div class="col-2 ml-xl-4 pr-2 pl-0">
                           <a href="<?= base_url('Profile/settings'); ?>" class="btn btn-circle" style="background-color: var(--moredark)"> 
                           <i class="feather-edit-3 text-white"></i>
                           </a>
                       </div>
                   </div>
               </div>
               <div class="mt-0">
                   <div class="text-center user-info mt-4 mb-4">
                       <img src="<?= base_url() ?>/gambar/<?= session()->get('foto'); ?>" class="img-circle" alt="avatar" style="width: 90px; border: solid 3px var(--moredark); border-radius: 100px;">
                       <p class="font-weight-bold mt-3" style="color: var(--moredark)"><?= session()->get('nama_petugas'); ?></p>
                   </div>
                   <div class="user-info-list">

                       <div class="">
                           <ul class="contacts-block list-unstyled row d-flex justify-content-center">
                               <div class="col-2"></div>
                               <div class="col-1">
                                   <i class="icp las la-briefcase mr-3 mt-1 mb-2"></i>
                                   <i class="icp las la-calendar mr-3 mt-3 mb-2"></i>
                                   <i class="icp las la-map-marked-alt mr-3 mt-3 mb-2"></i>
                                   <i class="icp las la-envelope mr-3 mt-3 mb-2"></i>
                                   <i class="icp las la-phone mr-3 mt-3 mb-2"></i>
                               </div>
                               <div class="col-7">
                                   <p class="txt"> <?= $job; ?> </p>
                                   <p class="txt"> <?= $born; ?> </p>
                                   <p class="txt"> <?= $life; ?> </p>
                                   <p class="txt"> <?= $mail; ?> </p>
                                   <p class="txt"> <?= $phone; ?> </p>
                               </div>
                               <!-- <div class="col-2"></div> -->
                               <li class="list d-flex justify-content-center mt-4 mb-3">
                                   <ul class="list-inline">
                                       <li class="list-inline-item mr-2">
                                           <div class="social-icon">
                                               <a href="#"><i class="sosmed la la-facebook"></i></a>
                                           </div>
                                       </li>
                                       <li class="list-inline-item mr-2">
                                           <div class="social-icon">
                                               <a href="#"><i class="sosmed fa fa-twitter"></i></a>
                                           </div>
                                       </li>
                                       <li class="list-inline-item mr-2">
                                           <div class="social-icon">
                                               <a href="#"><i class="sosmed fa fa-instagram"></i></a>
                                           </div>
                                       </li>
                                   </ul>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12 card shadow mb-4">


               <div class="bio py-3">
                   <div class="card-title px-3 m-0">
                       <h5 class="m-0" style="color: var(--moredark);">Bio</h5>
                   </div>
                   <div class="card-body">
                       <div class="one">
                           <p>I'm Web Developer from California. I code and design websites worldwide. Mauris varius tellus vitae tristique sagittis. Sed aliquet, est nec auctor aliquet, orci ex vestibulum ex, non pharetra lacus erat ac nulla.</p>
                           <p>Sed vulputate, ligula eget mollis auctor, lectus elit feugiat urna, eget euismod turpis lectus sed ex. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ut velit finibus, scelerisque sapien vitae, pharetra est. Nunc accumsan ligula vehicula scelerisque vulputate.</p>
                       </div>
                       <div class="row px-2 mt-4">
                           <div class="card card4 col-12 col-xl-6 col-lg-12 mb-xl-5 mb-3 px-0">
                               <div class="b-skills">
                                   <div class="b-title">
                                       <p>Sass Applications</p>
                                   </div>
                                   <div class="b-body">
                                       <p>Duis aute irure dolor in reprehenderit in voluptate velit esse eu fugiat nulla pariatur.</p>
                                   </div>
                               </div>
                           </div>

                           <div class="card card4 col-12 col-xl-6 col-lg-12 mb-xl-5 mb-3 px-0">

                               <div class="b-skills">
                                   <div class="b-title">
                                       <p>Github Countributer</p>
                                   </div>
                                   <div class="b-body">
                                       <p>Ut enim ad minim veniam, quis nostrud exercitation aliquip ex ea commodo consequat.</p>
                                   </div>
                               </div>
                           </div>

                           <div class="card card4 col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 px-0">

                               <div class="b-skills">
                                   <div class="b-title">
                                       <p>Photograhpy</p>
                                   </div>
                                   <div class="b-body">
                                       <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia anim id est laborum.</p>
                                   </div>
                               </div>
                           </div>

                           <div class="card card4 col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 px-0">

                               <div class="b-skills">
                                   <div class="b-title">
                                       <p>Mobile Apps</p>
                                   </div>
                                   <div class="b-body">
                                       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do et dolore magna aliqua.</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- </div> -->
                   </div>
               </div>
           </div>
       </div>
       <!-- </div>
        </div> -->
       <!--  END CONTENT AREA  -->