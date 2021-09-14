<!-- Push section css -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="/template/plugins/sweetalert2/sweetalert2.min.css">
<?= $this->endSection() ?>

<!-- Push section js -->
<?= $this->section('js') ?>
<script src="/template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
<?= $this->endSection() ?>