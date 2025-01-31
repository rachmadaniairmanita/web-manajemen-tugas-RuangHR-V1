<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('leader/sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('leader/header', array('nama' => $nama)) ?>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="font-weight:700">Notulensi</h1>
                        <a href="<?php echo base_url().'index.php/leaderCtl/tambahNotulensi'?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sticky-note"></i> Tambah Notulensi</a>
                    </div>
                </div>
                <div class="container-fluid mb-3">
                    <div>
                        <br> 
                        <div class="row card" style="color: #0E3854; font-weight: 700; background:white !important">
                            <div class="table-responsive" style="padding: 20px 0">
                                <table id="example" class="table" style="width:100%; color: #0E3854;background:white">
                                    <thead style="background : rgba(255,165,2,0.5); font-weight: 900;">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Subject</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- sementara data nya manual dulu nanti di ambil dari database -->
                                    <?php 
                                        $i=0;
                                        foreach($notul as $task){
                                            $i++; ?>
                                            <tr>
                                                <td><?php echo htmlentities($task['nama_user']) ?></td>
                                                <td><?php echo htmlentities($task['subject']) ?></td>
                                                <td><?php echo htmlentities($task['tanggal']) ?></td>
                                                <td><a href="<?php echo base_url().'index.php/leaderCtl/detailNotulensi?kode='.$task['kode'];?>"><button class="btn" style="background:#D5EAF8;color:#0E3854">Detail</button></a></td>
                                            </tr>

                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('leader/footer') ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('leader/modal') ?>
    <script src="<?php echo base_url(); ?>assets/bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({     
                "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
            });
        });
        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
                }
            }
        }
    </script>
</body>

</html>