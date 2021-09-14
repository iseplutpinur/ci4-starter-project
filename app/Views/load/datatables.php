<!-- Push section css -->
<?= $this->section('css') ?>
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<?= $this->endSection() ?>

<!-- Push section js -->
<?= $this->section('js') ?>
<script src="/assets/plugins/moment/moment-with-locales.min.js"></script>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    moment.locale('<?= config('App')->defaultLocale ?>');
</script>
<script>
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: "/assets/language/datatable/<?= config('Boilerplate')->i18n ?>.json"
        }
    });
</script>
<?= $this->endSection() ?>