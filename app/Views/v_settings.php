<!--  BEGIN CONTENT AREA  -->
<style>
    .header {
        text-transform: uppercase;
        font-weight: 700;
        font-size: 16px;
        color: #3b3f5c;
    }
</style>
<div class="container-fluid">

    <div class="card shadow mb-4 rounded">
        <div class="card-title px-4 py-3">
            <h6 class="header">General Information</h6>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 card-body">
            <form id="general-info" class="section general-info">
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row">
                            <div class="col-xl-2 col-lg-12 col-md-4">
                                <div class="upload mt-4 pr-md-4">
                                    <input type="file" id="foto" name="foto" class="dropify" data-default-file="<?= base_url() ?>/gambar/<?= session()->get('foto'); ?>" data-height="100"  data-errors-position="outside"/>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <small class="text-gray-600" for="fullName">Nama</small>
                                                <input type="text" class="form-control mb-4" id="fullName" placeholder="Full Name" value="<?= session()->get('nama_petugas'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <small class="dob-input text-gray-600">Tanggal Lahir</small>
                                            <div class="d-sm-flex d-block">
                                                <div class="form-group mr-1">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Day</option>
                                                        <option>1</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mr-1">
                                                    <select class="form-control" id="month">
                                                        <option>Month</option>
                                                        <option selected>Jan</option>
                                                        <option>Feb</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mr-1">
                                                    <select class="form-control" id="year">
                                                        <option>Year</option>
                                                        <option>2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-11">
                                            <div class="form-group">
                                                <small class="text-gray-600" for="profession">Jabatan</small>
                                                <input type="text" class="form-control mb-4" id="profession" placeholder="Designer" value="<?= $job; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- </div> -->

<div class="card shadow mb-4">
<div class="card-title px-4 py-3">
            <h6 class="header">Contact</h6>
        </div>
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form id="contact" class="section contact">
            <div class="info">
                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small for="country">Tempat Tinggal</small>
                                    <input type="text" class="form-control mb-4" id="tempat_tinggal" name="tempat_tinggal" placeholder="Write your address here" value="<?= $phone; ?>">
                                    <!-- <select class="form-control" id="country">
                                        <option>All Countries</option>
                                        <option selected>United States</option>
                                        <option>India</option>
                                        <option>Japan</option>
                                        <option>China</option>
                                        <option>Brazil</option>
                                        <option>Norway</option>
                                        <option>Canada</option>
                                    </select> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small for="address">Alamat</small>
                                    <input type="text" class="form-control mb-4" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small for="phone">No Telepon</small>
                                    <input type="text" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="<?= $phone; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <small for="email">Email</small>
                                    <input type="text" class="form-control mb-4" id="email" placeholder="Write your email here" value="<?= $mail; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- <div class="card shadow mb-4">
        <div class="card-title px-4 py-3">
            <h6 class="header">Social</h6>
        </div>
    <div class="col-xl-12 col-lg-12 col-md-12 card-body">
        <form id="social" class="section social">
            <div class="info">
                <div class="row">

                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group social-linkedin mb-3">
                                    <div class="input-group-prepend mr-3">
                                        <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin">
                                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="linkedin Username" aria-label="Username" aria-describedby="linkedin" value="jimmy_turner">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group social-tweet mb-3">
                                    <div class="input-group-prepend mr-3">
                                        <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Twitter Username" aria-label="Username" aria-describedby="tweet" value="@jTurner">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-11 mx-auto">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group social-fb mb-3">
                                    <div class="input-group-prepend mr-3">
                                        <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Facebook Username" aria-label="Username" aria-describedby="fb" value="Jimmy Turner">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group social-github mb-3">
                                    <div class="input-group-prepend mr-3">
                                        <span class="input-group-text" id="github"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                            </svg></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Github Username" aria-label="Username" aria-describedby="github" value="@TurnerJimmy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div> -->
    
</div>
<!-- </div>
</div>
</div> -->

<!-- <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <button id="multiple-reset" class="btn btn-warning">Reset All</button>
                            <div class="blockui-growl-message">
                                <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                            </div>
                            <button id="multiple-messages" class="btn btn-primary">Save Changes</button>

                        </div>

                    </div> -->
<!-- </div> -->

<!-- </div>
        </div> -->
<!--  END CONTENT AREA  -->