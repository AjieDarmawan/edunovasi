<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="custom.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/custom.css')?>" />


    <title>Dashboard Eduschool</title>
</head>

<body>
    <style>
    body {
        min-height: 100 vh;
        /* min-height: -webkit-fill-available; */
        /* min-height: -moz-available; */
        min-height: fill-available;
    }

    html {
        /* height: -webkit-fill-available; */
        /* height: -moz-available; */
        height: fill-available;
    }

    #sec-dashboard {
        display: flex;
        flex-wrap: nowrap;
        height: 100vh;
        /* height: -webkit-fill-available; */
        /* height: -moz-available; */
        height: fill-available;
        max-height: 100vh;
        overflow-x: auto;
        overflow-y: hidden;
        background-color: #003049;
    }

    #sec-dashboard a {
        color: #003049 !important;
    }

    .list-unstyled li {
        background: #eaeaea 0% 0% no-repeat padding-box;
        border-radius: 24px 0px 0px 24px;
    }

    .btn-toggle {
        display: inline-flex;
        align-items: center;
        padding: 0.7rem;
        /* color: rgba(0, 0, 0, .65); */
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 0.65px;
        color: #2c2731;
        background-color: transparent;
        border: 0;
    }

    /* .btn-toggle:hover,
      .btn-toggle:focus {
         color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
      } */

    .btn-toggle::before {
        width: 1.55em;
        /* line-height: 1.1; */
        content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
        transition: transform 0.35s ease;
        transform-origin: 0.5em 50%;
    }

    .btn-toggle[aria-expanded="true"] {
        color: rgba(0, 0, 0, 0.85);
    }

    .btn-toggle[aria-expanded="true"]::before {
        transform: rotate(90deg);
    }

    .btn-toggle-nav a {
        display: inline-flex;
        padding: 0.1875rem 0.5rem;
        margin-top: 0.125rem;
        margin-left: 1.25rem;
        text-decoration: none;
    }

    .btn-toggle-nav a:hover,
    .btn-toggle-nav a:focus {
        background-color: #d2f4ea;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #fff !important;
        border-bottom: 4px solid #003049;
        font: normal normal bold 18px/24px Open Sans !important;
        letter-spacing: 0px;
        color: #0d0d0d !important;
    }

    .nav-link {
        font: normal normal bold 18px/24px Open Sans;
        letter-spacing: 0px;
        color: #003049;
    }

    .card {
        background: #ffffff 0% 0% no-repeat padding-box;
        box-shadow: 0px 3px 6px #00000029;
        border-radius: 8px;
    }

    .card-header {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .click {
        cursor: pointer;
    }

    @media only screen and (min-width: 800px) {
        .divpilihmenu {
            max-height: 65vh;
            overflow-y: scroll;
        }

        .divpembahasan {
            max-height: 65vh;
            overflow-y: scroll;
        }
    }

    @media only screen and (max-width: 799px) {
        .divpilihmenu {
            max-height: 18vh;
            overflow-y: scroll;
            border: 1px solid #eee;
            border-radius: 12px;
        }

        .divpembahasan {
            max-height: 55vh;
            overflow-y: scroll;
            border: 1px solid #eee;
            border-radius: 12px;
        }

        #sec-dashboard {
            left: 0px;
            top: 50px;
        }
    }

    .bg-nilai {
        background-color: #eae2b7 !important;
    }
    </style>