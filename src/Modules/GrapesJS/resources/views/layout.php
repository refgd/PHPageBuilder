<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PageBuilder</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.9, maximum-scale=0.9, user-scalable=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/grapesjs@0.19.5/dist/css/grapes.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css" integrity="sha256-l3FykDBm9+58ZcJJtzcFvWjBZNJO40HmvebhpHXEhC0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= phpb_asset('pagebuilder/app.css') ?>">
    <?= $pageBuilder->customStyle(); ?>

    <script src="https://cdn.jsdelivr.net/npm/grapesjs@0.19.5/dist/grapes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js" integrity="sha256-+o/X+QCcfTkES5MroTdNL5zrLNGb3i4dYdWPWuq6whY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.10.2/beautify-html.min.js"></script>
    <?= $pageBuilder->customScripts('head'); ?>

    <style type="text/css">
        .icons-flex {
          background-size: auto 90% !important;
          opacity: 0.9;
        }
        .icon-dir-row {
          background: url("<?php echo phpb_asset('pagebuilder/images/flex-dir-row.png') ?>") no-repeat center;
        }
        .icon-dir-row-rev {
          background: url("<?php echo phpb_asset('pagebuilder/images/flex-dir-row-rev.png') ?>") no-repeat center;
        }
        .icon-dir-col {
          background: url("<?php echo phpb_asset('pagebuilder/images/flex-dir-col.png') ?>") no-repeat center;
        }
        .icon-dir-col-rev {
          background: url("<?php echo phpb_asset('pagebuilder/images/flex-dir-col-rev.png') ?>") no-repeat center;
        }
        .icon-just-start{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-just-start.png') ?>") no-repeat center;
        }
        .icon-just-end{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-just-end.png') ?>") no-repeat center;
        }
        .icon-just-sp-bet{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-just-sp-bet.png') ?>") no-repeat center;
        }
        .icon-just-sp-ar{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-just-sp-ar.png') ?>") no-repeat center;
        }
        .icon-just-sp-cent{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-just-sp-cent.png') ?>") no-repeat center;
        }
        .icon-al-start{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-al-start.png') ?>") no-repeat center;
        }
        .icon-al-end{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-al-end.png') ?>") no-repeat center;
        }
        .icon-al-str{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-al-str.png') ?>") no-repeat center;
        }
        .icon-al-center{
         background: url("<?php echo phpb_asset('pagebuilder/images/flex-al-center.png') ?>") no-repeat center;
        }
    </style>
</head>

<body>

<?php
require __DIR__ . '/pagebuilder.php';
?>

<script src="<?= phpb_asset('pagebuilder/app.js') ?>"></script>
<?= $pageBuilder->customScripts('body'); ?>
</body>
</html>
