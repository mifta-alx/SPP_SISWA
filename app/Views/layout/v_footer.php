   <!-- Footer -->
   <footer class="sticky-footer bg-white">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span>Copyright &copy; Alx <?= date('Y'); ?></span>
           </div>
       </div>
   </footer>
   <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a>

   <!-- DataTables -->
   <script src="<?= base_url() ?>/template/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/DataTables-1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/DataTables-1.10.21/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/Buttons-1.6.2/js/dataTables.buttons.min.js"></script>
   <!-- <script src="<?= base_url() ?>/template/vendor/dist/DataTables/Buttons-1.6.2/js/buttons.bootstrap4.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/JSZip-2.5.0/jszip.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/Buttons-1.6.2/js/buttons.html5.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/Buttons-1.6.2/js/buttons.print.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/dist/DataTables/Buttons-1.6.2/js/buttons.colVis.min.js"></script> -->
   <!-- <script src="<?= base_url() ?>/template/js/popper.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url() ?>/template/vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- moment -->
   <script src="<?= base_url() ?>/template/vendor/moment/moment.min.js"></script>

   <!-- datepicker -->
   <!-- <script type="text/javascript" src="<?= base_url() ?>/template/vendor/bootstrap-datepicker/js/datepicker.js"></script> -->
   <script type="text/javascript" src="<?= base_url() ?>/template/vendor/daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="<?= base_url() ?>/template/js/jquery-dateformat.js"></script>
   <script type="text/javascript" src="<?= base_url() ?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url() ?>/template/js/sb-admin-2.min.js"></script>
   <!-- Page level plugins -->
   <!-- <script src="<?= base_url() ?>/template/vendor/chart.js/Chart.min.js"></script> -->

   <!-- Page level custom scripts -->
   <!-- <script src="<?= base_url() ?>/template/js/demo/chart-area-demo.js"></script>
   <script src="<?= base_url() ?>/template/js/demo/chart-pie-demo.js"></script> -->
   <!-- Page level plugins -->
   <!-- <script src="<?= base_url() ?>/template/vendor/chart.js/Chart.min.js"></script> -->
   <script src="<?= base_url() ?>/template/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url() ?>/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <script src="<?= base_url() ?>/template/js/demo/datatables-demo.js"></script>
   <!-- Toastr -->
   <script src="<?= base_url() ?>/template/vendor/toastr/toastr.min.js"></script>
   <!-- SweetAlert2 -->
   <script src="<?= base_url() ?>/template/vendor/sweetalert2/sweetalert2.min.js"></script>
   <?php if ($title == 'Settings') { ?>
       <script src="<?= base_url() ?>/template/plugins/dropify/dropify.min.js"></script>
       <script>
           $(document).ready(function() {
               $('.dropify').dropify({
                   messages: {
                       default: '<p style="font-size: 13px; line-height:100%;">Drag atau drop untuk memilih gambar</p>',
                       replace: 'Ganti',
                       remove: '<i class="fa fa-trash"></i>',
                       error: 'error',
                   }
               });
           });
       </script>
   <?php } ?>

   <script>
       $(document).ready(function() {
           <?php if (session()->getFlashdata('bahaya')) : ?>
               <?php if (session()->getFlashdata('success')) : ?>
                   Swal.fire({
                       title: 'Gagal!',
                       text: '<?= session()->getFlashdata('bahaya'); ?>',
                       text: "Anda tidak memiliki akses untuk halaman tersebut.",
                       icon: 'error'
                   });
               <?php endif; ?>
           <?php endif ?>
       });
       $(document).ready(function() {
           <?php if (session()->getFlashdata('pesan2')) : ?>
               <?php if (session()->getFlashdata('success')) : ?>
                   Swal.fire({
                       title: '<?= session()->getFlashdata('pesan2'); ?>',
                       text: 'Selamat Datang <?= session()->get('nama'); ?>',
                       icon: 'success',
                       confirmButtonColor: 'var(--moredark)',
                       //    cancelButtonColor: '#d33',
                   });
                   window.setTimeout(function() {
                       window.location.replace('<?= base_url('home') ?>');
                   }, 1100);
               <?php endif; ?>
           <?php endif ?>
       });
       $(document).ready(function() {
           <?php if (session()->getFlashdata('pesan1')) : ?>
               <?php if (session()->getFlashdata('success')) : ?>
                   Swal.fire({
                       title: '<?= session()->getFlashdata('pesan1'); ?>',
                       text: 'Selamat Datang <?= session()->get('nama_petugas'); ?>',
                       icon: 'success',
                       confirmButtonColor: 'var(--moredark)',
                       //    cancelButtonColor: '#d33',
                   });
                   window.setTimeout(function() {
                       window.location.replace('<?= base_url('home') ?>');
                   }, 1100);
               <?php endif; ?>
           <?php endif ?>
       });
   </script>
   <!-- SISWA -->
   <script>
       toastr.options = {
           "closeButton": true,
           "progressBar": true,
           "positionClass": "toast-top-right",
       }
       <?php if (session()->getFlashdata('msg')) : ?>
           <?php if (session()->getFlashdata('success')) : ?>
               toastr.success('<?= session()->getFlashdata('msg'); ?>', 'Success')
           <?php elseif (session()->getFlashdata('success')) : ?>
               toastr.error('<?= session()->getFlashdata('gagal'); ?>', 'Error')
           <?php endif; ?>
       <?php endif ?>
       //    TAMBAH
       <?php if ($title == 'Tambah Data Siswa') { ?>
           $(document).ready(() => {
               $('#id_kelas').val(`<?= old('id_kelas') ?>`);
           })
           $(document).ready(() => {
               $('#id_spp').val(`<?= old('id_spp') ?>`);
           })
           $("#id_spp").change(async function() {
               const data = await fetch("<?= base_url(); ?>/siswa/data1/" + $('#id_spp').val()).then(res => res.json()).then(res => res)
               $('#nominal').val(data.data[1].nominal)
            //    console.log(data);
           });
           $("#id_kelas").change(async function() {
               const data = await fetch("<?= base_url(); ?>/siswa/data1/" + $('#id_kelas').val()).then(res => res.json()).then(res => res)
               $('#nama_kelas').val(data.data[2].nama_kelas)
               console.log(data);
           });
       <?php } ?>
       //    EDIT
       <?php if ($title == 'Edit Data Siswa') { ?>
           $(document).ready(() => {
               $('#id_spp').val(`<?= old('id_spp', $siswa['id_spp']) ?>`);
               $('#id_kelas').val(`<?= old('id_kelas', $siswa['id_kelas']) ?>`);
           })
           $("#id_spp").change(async function() {
               const data = await fetch("<?= base_url(); ?>/siswa/data1/" + $('#id_spp').val()).then(res => res.json()).then(res => res)
               $('#nominal').val(data.data[1].nominal)
               console.log(data);
           });
           $("#id_kelas").change(async function() {
               const data = await fetch("<?= base_url(); ?>/siswa/data1/" + $('#id_kelas').val()).then(res => res.json()).then(res => res)
               $('#nama_kelas').val(data.data[2].nama_kelas)
               console.log(data);
           });
       <?php } ?>
       // TABEL
       <?php if ($title == 'Tabel Data Siswa') { ?>

           var base_url = "<?= base_url() ?>";

           $(document).ready(function() {
               var table = $('#tabel-siswa').DataTable({
                   ajax: {
                       url: `${base_url}/siswa/data`,
                       type: 'POST',

                       "dataSrc": function(json) {

                           for (let i in json.data) {
                               json.data[i].AKSI =
                                   `<div class="btn-group"><a class="btn btn-sm btn-primary" href="${base_url}/siswa/edit/${json.data[i].nisn}">
                             <i class="fa fa-pencil-square-o text-default"></i>
                    </a><a class="btn btn-sm btn-danger btn-hapus" data-nisn="${json.data[i].nisn}">
                            <i class="fa fa-trash text-white"></i>
                         </a></div>`;
                               json.data[i].NUMBER = parseInt(i) + 1;

                           }

                           return json.data;
                       },

                   },
                   "columns": [{
                           "data": "NUMBER"
                       },
                       {
                           "data": "nisn"
                       },
                       {
                           "data": "nis"
                       },
                       {
                           "data": "nama"
                       },
                       {
                           "data": "nama_kelas"
                       },
                       {
                           "data": "alamat"
                       },
                       {
                           "data": "no_telp"
                       },
                       {
                           "data": "id_spp"
                       },
                       {
                           "data": "AKSI"
                       }

                   ],
                   scrollX: true,
                   ordering: false,
                   //    autoWidth: true,
                   //    scrollY: "400px",
                   //    scrollCollapse: true,


               });
               $("body").on('click', '.btn-hapus', function() {
                   const id = $(this).data("nisn");
                   console.log(id);
                   Swal.fire({
                       title: "Anda Yakin Ingin?",
                       text: "Anda tidak akan dapat mengembalikan ini",
                       icon: "warning",
                       showCancelButton: true,
                       //    confirmButtonColor: '#3085d6',
                       confirmButtonColor: 'var(--moredark)',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Iya',
                       cancelButtonText: 'Tidak'
                   }).then((result) => {
                       if (result.value) {
                           Swal.fire(
                               'Berhasil!',
                               'Data Berhasil Dihapus.',
                               'success',
                           );
                           fetch(`${base_url}/siswa/hapus/${id}`).then(() => {
                               window.location.reload();
                           });
                       }
                   })
               });
           });

       <?php } ?>
       //    END OF SISWA
   </script>


   <!-- PETUGAS -->
   <script type="text/javascript">
       $(document).ready(() => {
           $('#level').val(`<?= old('level') ?>`);
       })
       //  SHOW HIDE PASSWORD 
       <?php if ($title == 'Tambah Data Petugas' || 'Edit Data Petugas') { ?>
           $(document).ready(function() {
               $("#show_hide_password button").on('click', function(event) {
                   event.preventDefault();
                   if ($('#show_hide_password input').attr("type") == "text") {
                       $('#show_hide_password input').attr('type', 'password');
                       $('#show_hide_password i').addClass("fa-eye");
                       $('#show_hide_password i').removeClass("fa-eye-slash");
                   } else if ($('#show_hide_password input').attr("type") == "password") {
                       $('#show_hide_password input').attr('type', 'text');
                       $('#show_hide_password i').removeClass("fa-eye");
                       $('#show_hide_password i').addClass("fa-eye-slash");
                   }
               });
           });

           function previewJPG() {
               const gambar = document.querySelector('#foto');
               const gambarLabel = document.querySelector('.custom-file-label');
               const gambarPreview = document.querySelector('.img-preview');

               gambarLabel.textContent = gambar.files[0].name;

               const fileJPG = new FileReader();
               fileJPG.readAsDataURL(gambar.files[0]);

               fileJPG.onload = function(e) {
                   gambarPreview.src = e.target.result;
               }

           }
       <?php } ?>
       <?php if ($title == 'Tabel Data Petugas') { ?>
           var base_url = "<?= base_url() ?>";

           $(document).ready(function() {
               var table = $('#tabel-petugas').DataTable({
                   ajax: {
                       url: `${base_url}/petugas/data`,
                       type: 'POST',

                       "dataSrc": function(json) {

                           for (let i in json.data) {
                               json.data[i].AKSI =
                                   `<div class="btn-group"><a class="btn btn-sm btn-primary" href="${base_url}/petugas/edit/${json.data[i].id_petugas}">
                             <i class="fa fa-pencil-square-o text-default"></i>
                    </a><a class="btn btn-sm btn-danger btn-hapus" data-id_petugas="${json.data[i].id_petugas}">
                            <i class="fa fa-trash text-white"></i>
                         </a></div>`;
                               // json.data[i].NUMBER = nomor++;
                               json.data[i].NUMBER = parseInt(i) + 1;

                           }

                           return json.data;
                       },

                   },
                   "columns": [{
                           "data": "NUMBER"
                       },
                       {
                           "data": "id_petugas"
                       },
                       {
                           "data": "username"
                       },
                       {
                           "data": "nama_petugas"
                       },
                       {
                           "data": "level"
                       },
                       {
                           "data": "AKSI"
                       }

                   ],
                   ordering: false
               });
               //     $("body").on('click', '.btn-hapus', function() {
               //         const id = $(this).data("id_petugas");
               //         console.log(id);
               //         Swal.fire({
               //             title: "Anda Yakin Ingin?",
               //             text: "Anda tidak akan dapat mengembalikan ini",
               //             icon: "warning",
               //             showCancelButton: true,
               //             confirmButtonColor: '#3085d6',
               //             cancelButtonColor: '#d33',
               //             confirmButtonText: 'Iya',
               //             cancelButtonText: 'Tidak'
               //         }).then((result) => {
               //             if (result.value) {
               //                 Swal.fire(
               //                     'Berhasil!',
               //                     'Data Berhasil Dihapus.',
               //                     'success',
               //                 );
               //                 fetch(`${base_url}/petugas/hapus/${id}`).then(() => {
               //                     window.location.reload();
               //                 });
               //             }
               //         })
               //     });
               // });
               $("body").on('click', '.btn-hapus', function() {
                   const id = $(this).data("id_petugas");
                   console.log(id);
                   Swal.fire({
                       title: "Anda Yakin Ingin?",
                       text: "Anda tidak akan dapat mengembalikan ini",
                       icon: "warning",
                       showCancelButton: true,
                       //    confirmButtonColor: '#3085d6',
                       confirmButtonColor: 'var(--moredark)',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Iya',
                       cancelButtonText: 'Tidak'
                   }).then((result) => {
                       if (result.value) {
                           Swal.fire(
                               'Berhasil!',
                               'Data Berhasil Dihapus.',
                               'success',
                           );
                           fetch(`${base_url}/petugas/hapus/${id}`).then(() => {
                               window.location.reload();
                           });
                       }
                   })
               });
           });
       <?php } ?>
   </script>
   <?php if ($title == 'Edit Data Petugas') { ?>
       <script>
           $(document).ready(() => {
               $('#level').val(`<?= old('level', $petugas['level']) ?>`);
           });
       </script>
   <?php } ?>
   <!-- END OF PETUGAS -->
   <!-- KELAS -->
   <script>
       $(document).ready(() => {
           $('#kompetensi_keahlian').val(`<?= old('kompetensi_keahlian') ?>`);
       });
       <?php if ($title == 'Tabel Data Kelas') { ?>
           var base_url = "<?= base_url() ?>";

           $(document).ready(function() {
               var table = $('#tabel-kelas').DataTable({
                   ajax: {
                       url: `${base_url}/kelas/data`,
                       type: 'POST',

                       "dataSrc": function(json) {

                           for (let i in json.data) {
                               json.data[i].AKSI =

                                   `<div class="btn-group"><a class="btn btn-sm btn-primary" href="${base_url}/kelas/edit/${json.data[i].id_kelas}">
                             <i class="fa fa-pencil-square-o text-default"></i>
                    </a><a class="btn btn-sm btn-danger btn-hapus" data-id_kelas="${json.data[i].id_kelas}">
                            <i class="fa fa-trash text-white"></i>
                         </a></div> `;
                               // json.data[i].NUMBER = nomor++;
                               json.data[i].NUMBER = parseInt(i) + 1;

                           }

                           return json.data;
                       },

                   },
                   "columns": [{
                           "data": "NUMBER"
                       },
                       {
                           "data": "id_kelas"
                       },
                       {
                           "data": "nama_kelas"
                       },
                       {
                           "data": "kompetensi_keahlian"
                       },
                       {
                           "data": "AKSI"
                       }

                   ],
                   ordering: false,
                   scrollY: "300px",
               });
               $("body").on('click', '.btn-hapus', function() {
                   const id = $(this).data("id_kelas");
                   console.log(id);
                   Swal.fire({
                       title: "Anda Yakin Ingin?",
                       text: "Anda tidak akan dapat mengembalikan ini",
                       icon: "warning",
                       showCancelButton: true,
                       //    confirmButtonColor: '#3085d6',
                       confirmButtonColor: 'var(--moredark)',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Iya',
                       cancelButtonText: 'Tidak'
                   }).then((result) => {
                       if (result.value) {
                           Swal.fire(
                               'Berhasil!',
                               'Data Berhasil Dihapus.',
                               'success',
                           );
                           fetch(`${base_url}/kelas/hapus/${id}`).then(() => {
                               window.location.reload();
                           });
                       }
                   })
               });
           });
       <?php } ?>
   </script>
   <?php if ($title == 'Edit Data Kelas') { ?>
       <script>
           $(document).ready(() => {
               $('#kompetensi_keahlian').val(`<?= old('kompetensi_keahlian', $kelas['kompetensi_keahlian']) ?>`);
           })
       </script>
   <?php } ?>
   <!-- END OF KELAS -->
   <!-- SPP -->
   <script type="text/javascript">
       //    TAMBAH
       <?php if ($title == 'Tambah Data SPP') { ?>
           $(document).ready(() => {
               $('#tahun').val(`<?= old('tahun') ?>`);
           })
       <?php } ?>
       //    EDIT
       <?php if ($title == 'Edit Data SPP') { ?>
           $(document).ready(() => {
               $('#tahun').val(`<?= old('tahun', $spp['tahun']) ?>`);
           })
       <?php } ?>
       //    TABEL
       <?php if ($title == 'Tabel Data SPP') { ?>
           $(function() {
               $("#tabel-spp").DataTable({
                   "responsive": true,
                   "autoWidth": false,
                   "ordering": false
               });
           });
           // $(document).on('click', '.btn-delete', function(e){
           //     //hentikan aksi default
           //     e.preventDefault();
           //     const href = $(this).attr('href');

           //     Swal.fire({
           //         title: "Anda Yakin Ingin?",
           //            text: "Anda tidak akan dapat mengembalikan ini",
           //            icon: "warning",
           //            showCancelButton: true,
           //            confirmButtonColor: '#3085d6',
           //            cancelButtonColor: '#d33',
           //            confirmButtonText: 'Iya',
           //            cancelButtonText: 'Tidak'
           // 	}).then((result) => {
           // 	  if (result.value) {
           // 	    Swal.fire(
           // 	      'Deleted!',
           // 	      'Your file has been deleted.',
           // 	      'success',
           // 	    );
           //         document.location.href = '<?= base_url('spp/index') ?>';
           // 	  }
           // 	})
           // })
           var base_url = "<?= base_url() ?>";
           $("body").on('click', '.btn-delete', function() {
               const id = $(this).data("id_spp");
               console.log(id);
               Swal.fire({
                   title: "Anda Yakin Ingin?",
                   text: "Anda tidak akan dapat mengembalikan ini",
                   icon: "warning",
                   showCancelButton: true,
                   //    confirmButtonColor: '#3085d6',
                   confirmButtonColor: 'var(--moredark)',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Iya',
                   cancelButtonText: 'Tidak'
               }).then((result) => {
                   if (result.value) {
                       Swal.fire(
                           'Berhasil!',
                           'Data Berhasil Dihapus.',
                           'success',
                       );
                       fetch(`${base_url}/spp/hapus/${id}`).then(() => {
                           window.location.reload();
                       });
                   }
               })
           });
       <?php } ?>
   </script>
   <!-- END OF SPP -->
   <!-- PEMBAYARAN -->
   <script>
       //    TAMBAH
       <?php if ($title == 'Tambah Data Pembayaran') { ?>
           var d = new Date();
           var weekday = new Array(7);
           weekday[0] = "Minggu";
           weekday[1] = "Senin";
           weekday[2] = "Selasa";
           weekday[3] = "Rabu";
           weekday[4] = "Kamis";
           weekday[5] = "Jum'at";
           weekday[6] = "Sabtu";

           var n = weekday[d.getDay()];

           var bulan = new Array(12);
           bulan[0] = "Januari";
           bulan[1] = "Februari";
           bulan[2] = "Maret";
           bulan[3] = "April";
           bulan[4] = "Mei";
           bulan[5] = "Juni";
           bulan[6] = "Juli";
           bulan[7] = "Agustus";
           bulan[8] = "September";
           bulan[9] = "Oktober";
           bulan[10] = "November";
           bulan[11] = "Desember";

           var b = bulan[d.getMonth()];
           var t = d.getDate();
           var t2 = d.getUTCFullYear();

           let fe = document.getElementById('tgl_bayar');
           $('#tgl_bayar').val(n + ',' + ' ' + t + ' ' + b + ' ' + t2);

           $("#id_petugas").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#id_petugas').val()).then(res => res.json()).then(res => res)
               $('#nama_petugas').val(data.data[3].nama_petugas)
               console.log(data);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#tahun_dibayar').val(data.data[0][0].tahun)
               console.log(data);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nisn2').val(data.data[0][0].nisn)
               console.log(data);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#idnespp').val(data.data[0][0].id_spp)
               //    console.log(data1);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#jumlahDibayar').val(data.data[0][0].nominal)
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nama').val(data.data[0][0].nama)
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nama_kelas').val(data.data[0][0].nama_kelas)
           });

           $(document).ready(() => {
               $('#id_petugas').val(`<?= old('id_petugas') ?>`);
               $('#nisn').val(`<?= old('nisn') ?>`);
               $('#bulan_dibayar').val(`<?= old('bulan_dibayar') ?>`);
               $('#tahun_dibayar').val(`<?= old('tahun_dibayar') ?>`);
               $('#id_spp').val(`<?= old('id_spp') ?>`);
           })
       <?php } ?>
       //    EDIT
       <?php if ($title == 'Edit Data Pembayaran') { ?>
           $(document).ready(() => {
               $('#id_petugas').val(`<?= old('id_petugas', $pembayaran['id_petugas']) ?>`);
               $('#id_spp').val(`<?= old('id_spp', $pembayaran['id_spp']) ?>`);
               $('#nisn').val(`<?= old('nisn', $pembayaran['nisn']) ?>`);
               $('#bulan_dibayar').val(`<?= old('bulan_dibayar', $pembayaran['bulan_dibayar']) ?>`);
               $('#tahun_dibayar').val(`<?= old('tahun_dibayar', $pembayaran['tahun_dibayar']) ?>`);
               $('#jumlah_bayar').val(`<?= old('jumlah_bayar', $pembayaran['jumlah_bayar']) ?>`);
           })
           $("#id_petugas").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#id_petugas').val()).then(res => res.json()).then(res => res)
               $('#nama_petugas').val(data.data[3].nama_petugas)
            //    console.log(data2);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#tahun_dibayar').val(data.data[0][0].tahun)
               console.log(data);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nisn2').val(data.data[0][0].nisn)
               console.log(data);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#idnespp').val(data.data[0][0].id_spp)
               //    console.log(data1);
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#jumlahDibayar').val(data.data[0][0].nominal)
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nama').val(data.data[0][0].nama)
           });
           $("#nisn").change(async function() {
               const data = await fetch("<?= base_url(); ?>/pembayaran/data/" + $('#nisn').val()).then(res => res.json()).then(res => res)
               $('#nama_kelas').val(data.data[0][0].nama_kelas)
           });
       <?php } ?>
       //    TABEL
       <?php if ($title == 'Tabel Data Pembayaran') { ?>
           $(document).ready(function() {
               // get Edit Product
               $('.btn-bayar').on('click', function() {
                   // get data from button edit
                   const id_pembayaran = $(this).data('id_pembayaran');
                   const id_petugas = $(this).data('id_petugas');
                   const nama_petugas = $(this).data('nama_petugas');
                   const nisn = $(this).data('nisn');
                   const nama = $(this).data('nama');
                   const nama_kelas = $(this).data('nama_kelas');
                   const tgl_bayar = $(this).data('tgl_bayar');
                   const bulan_dibayar = $(this).data('bulan_dibayar');
                   const tahun_dibayar = $(this).data('tahun_dibayar');
                   const id_spp = $(this).data('id_spp');
                   const jumlah_bayar = $(this).data('jumlah_bayar');
                   const sisa = $(this).data('sisa');
                   const nominal = $(this).data('nominal');
                   // Set data to Form Edit
                   $('.id_pembayaran').val(id_pembayaran);
                   $('.id_petugas').val(id_petugas);
                   $('.nama_petugas').val(nama_petugas);
                   $('.nisn').val(nisn);
                   $('.nama').val(nama);
                   $('.nama_kelas').val(nama_kelas);
                   $('.tgl_bayar').val(tgl_bayar);
                   $('.bulan_dibayar').val(bulan_dibayar);
                   $('.tahun_dibayar').val(tahun_dibayar);
                   $('.id_spp').val(id_spp);
                   $('.jumlah_bayar').val(jumlah_bayar);
                   $('.sisa').val(sisa);
                   $('.nominal').val(nominal);
                   // Call Modal Edit
                   $('#editModal').modal('show');
               });

           });
           $(function() {
               $("#tabel-pay").DataTable({
                   "responsive": true,
                   "autoWidth": true,
                   "scrollX": true,
                   "ordering": false
               });
           });
           var base_url = "<?= base_url() ?>";
           $("body").on('click', '.btn-delete', function() {
               const id = $(this).data("id_pembayaran");
               console.log(id);
               Swal.fire({
                   title: "Anda Yakin Ingin?",
                   text: "Anda tidak akan dapat mengembalikan ini",
                   icon: "warning",
                   showCancelButton: true,
                   //    confirmButtonColor: '#3085d6',
                   confirmButtonColor: 'var(--moredark)',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Iya',
                   cancelButtonText: 'Tidak'
               }).then((result) => {
                   if (result.value) {
                       Swal.fire(
                           'Berhasil!',
                           'Data Berhasil Dihapus.',
                           'success',
                       );
                       fetch(`${base_url}/pembayaran/hapus/${id}`).then(() => {
                           window.location.reload();
                       });
                   }
               })
           });
       <?php } ?>
   </script>
   <!-- END OF PEMBAYARAN -->
   <!-- HISTORY -->
   <script>
       $(function() {
           $("#tabel-history").DataTable({
               "responsive": true,
               "autoWidth": true,
               "scrollX": true,
               "ordering": false
           });
       });
   </script>
   <!-- END OF HISTORY -->
   </body>

   </html>