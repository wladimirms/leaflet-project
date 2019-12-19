<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link href="http://www.tsnigri.ru/templates/housebuild/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" type="text/css" href="../Bootstrap-4-4.1.1/css/bootstrap.css"/>
    <link href="../fontawesome/css/all.css" rel="stylesheet">

    <style type="text/css">
        body {
            line-height: 1.2em;
            font-size: 100%;
            //font-family: "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, SansSerif;
            margin: 5px;
            padding: 5px;
            color: #333;
            background-color: #fff;
        }
        div.nodata {
            color: rgba(211, 168, 98, 0.9);
        }
        table.card-table {
            width: 100%;
        }
        table.card-table tr th, td {
            padding: 3px;
            border-collapse: collapse;
        }

        .card-columns {
        padding: 3px;
        }

        @media (min-width: 576px) {
            .card-columns {
                column-count: 2;
            }
        }

        @media (min-width: 768px) {
            .card-columns {
                column-count: 3;
            }
        }

        @media (min-width: 992px) {
            .card-columns {
                column-count: 4;
            }
        }

        @media (min-width: 1200px) {
            .card-columns {
                column-count: 5;
            }
        }
        .card-header {
            padding: 0.25rem;
        }
        .card-body {
            padding: 0.25rem;
        }

    </style>

    <script type="text/javascript" src="../jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../Bootstrap-4-4.1.1/js/bootstrap.js"></script>
    <script defer src="../fontawesome/js/all.js"></script>

    <title>Карточка объекта учета</title>
</head>
<body>
<div align="center" class="container-fluid bg-dark text-white rounded" style="margin-left:align-content:center; width:98%; max-width: 1600px; padding-bottom: 10px;">
    <h3 style="text-align:center;">Подробная информация по объекту учета</h3>
