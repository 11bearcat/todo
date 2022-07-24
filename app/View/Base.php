<?php

namespace App\View;

class Base
{
    public function render()
    {
        ?>
            <!DOCTYPE html>
            <html class="no-focus" lang="en">
                <head>
                    <?php $this->header(); ?>
                </head>
                <body>

                    <?php $this->content(); ?>

                    <?php $this->footer(); ?>

                </body>
            </html>
        <?php
    }

    public function header() 
    {
        ?>
            <meta charset="utf-8">

            <title>Tasks</title>

            <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
            <meta name="author" content="pixelcave">
            <meta name="robots" content="noindex, nofollow">
            <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

            <!-- Icons -->
            <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
            <link rel="shortcut icon" href="/assets/img/favicons/favicon.png">

            <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-16x16.png" sizes="16x16">
            <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-32x32.png" sizes="32x32">
            <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-96x96.png" sizes="96x96">
            <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-160x160.png" sizes="160x160">
            <link rel="icon" type="image/png" href="/assets/img/favicons/favicon-192x192.png" sizes="192x192">

            <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/favicons/apple-touch-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/favicons/apple-touch-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/favicons/apple-touch-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicons/apple-touch-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/favicons/apple-touch-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/favicons/apple-touch-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/favicons/apple-touch-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/favicons/apple-touch-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicons/apple-touch-icon-180x180.png">
            <!-- END Icons -->

            <!-- Stylesheets -->
            <!-- Web fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
            

            <!-- Bootstrap and OneUI CSS framework -->
            <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
            <link rel="stylesheet" id="css-main" href="/assets/css/oneui.css">
            <link rel="stylesheet" href="/assets/js/plugins/datatables/jquery.dataTables.min.css"></link>

            <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
            <!-- <link rel="stylesheet" id="css-theme" href="/assets/css/themes/flat.min.css"> -->
            <!-- END Stylesheets -->
        <?php
    }

    public function footer()
    {
        ?>
            <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
            <script src="/assets/js/core/jquery.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/core/jquery.slimscroll.min.js"></script>
            <script src="/assets/js/core/jquery.scrollLock.min.js"></script>
            <script src="/assets/js/core/jquery.appear.min.js"></script>
            <script src="/assets/js/core/jquery.countTo.min.js"></script>
            <script src="/assets/js/core/jquery.placeholder.min.js"></script>
            <script src="/assets/js/core/js.cookie.min.js"></script>
            <script src="/assets/js/app.js"></script>

            <!-- Page JS Plugins -->
            <script src="/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
            <script src="/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

            <!-- Page JS Code -->
            <script src="/assets/js/pages/base_pages_login.js"></script>

            <script>
                $(document).ready( function () {
                    let orderData = [
	                    [0, '<?= $_GET['sortColumn'] === 'id' ? $_GET['sortBy'] : '' ?>'],
	                    [1, '<?= $_GET['sortColumn'] === 'title' ? $_GET['sortBy'] : '' ?>'],
	                    [2, '<?= $_GET['sortColumn'] === 'email' ? $_GET['sortBy'] : '' ?>'],
	                    [3, '<?= $_GET['sortColumn'] === 'status' ? $_GET['sortBy'] : '' ?>'],
                    ]
                    $('#myTable').DataTable({
                        "paging":   false,
                        "info":     false,
	                    "order": orderData
                    });

	                $('#id').on('click', (e) => {
		                e.preventDefault()
		                setSortParams('id', '<?= $_GET['sortBy'] === 'asc' ? 'desc' : 'asc' ?>')
	                })

                    $('#title').on('click', (e) => {
	                    e.preventDefault()
	                    setSortParams('title', '<?= $_GET['sortBy'] === 'asc' ? 'desc' : 'asc' ?>')
                    })

	                $('#email').on('click', (e) => {
                        e.preventDefault()
                        setSortParams('email', '<?= $_GET['sortBy'] === 'asc' ? 'desc' : 'asc' ?>')
	                })

	                $('#status').on('click', (e) => {
                        e.preventDefault()
                        setSortParams('status', '<?= $_GET['sortBy'] === 'asc' ? 'desc' : 'asc' ?>')
	                })
                } );

                function setSortParams(sortColumn, sortBy)
                {
	                let url = new URL(window.location);
	                url.searchParams.set('sortColumn', sortColumn)
	                url.searchParams.set('sortBy', sortBy)
	                window.location.href = url.href
                }

                function pagePaginate(e, page = '1', disabled = 0) {
                	e.preventDefault()
	                let url = new URL(window.location);

                    if (!disabled) {
	                    url.searchParams.set('page', page)
	                    window.location.href = url.href
                    }

                }
            </script>
        <?php
    }

}