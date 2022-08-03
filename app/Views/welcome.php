<?php $this->extend('../../themes/default/header');  ?>

<?php $this->section('content') ?>

<div class="container">
    <br>
    <div class="jumbotron">
        <h1>Welcome to ci4-starterkit</h1>
        <p class="lead">Your powerful web application kick-start based on CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?></p>
        <h4>Third-Party Packages added in application</h4>
        <p>
        <li> <a href='https://github.com/firtadokei/codeigniter-vitejs'>Codeigniter + viteJs</a></li>
        <li> <a href='https://github.com/firebase/php-jwt'>Firebase\JWT</a></li>
        <li><a href='https://github.com/WordPress/Requests'>WpOrg\Requests</a></li>
        <li> <a href='https://github.com/greenlion/PHP-SQL-Parser'>PHPSQLParser</a></li>
        <li> <a href='https://github.com/hermawanramadhan/CodeIgniter4-DataTables'>Hermawan\DataTables</a></li>
        <li> <a href='https://github.com/agungsugiarto/codeigniter4-cors'>agungsugiarto/codeigniter4-cors</a></li>
    </p>
    </div>
</div>

<div class="foot">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?>
            </div>
            <div class="col text-center">
                Environment: <?= ENVIRONMENT ?>
            </div>
            <div class="col text-right">
                Rendered in {elapsed_time} secs
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>