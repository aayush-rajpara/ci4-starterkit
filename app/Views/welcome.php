<?php $this->extend('../../themes/default/header');  ?>

<?php $this->section('content') ?>

<div class="container">
    <br>
    <div class="jumbotron">
        <h1>Welcome to ci4-starterkit</h1>
        <p class="lead">Your powerful web application kick-start based on CodeIgniter <?= \CodeIgniter\CodeIgniter::CI_VERSION ?></p>
        <h4>Third-Party Packages added in application</h4>
        <p>
        <li> <a href='https://github.com/lonnieezell/myth-auth'>Myth\Auth</a>=>APPPATH .'ThirdParty/myth-auth/src',</li>
        <li> <a href='https://github.com/lonnieezell/myth-auth'>Firebase\JWT</a>=> APPPATH .'ThirdParty/php-jwt/src',</li>
        <li><a href='https://github.com/lonnieezell/myth-auth'>WpOrg\Requests</a>=> APPPATH .'ThirdParty/requests/src',</li>
        <li> <a href='https://github.com/lonnieezell/myth-auth'>PHPSQLParser</a>=> APPPATH .'ThirdParty/php-sql-parser/src/PHPSQLParser', </li>
        <li> <a href='https://github.com/lonnieezell/myth-auth'>Hermawan\DataTables</a>=> APPPATH .'ThirdParty/codeigniter4-datatables/src',</li>
        <li> <a href='https://github.com/lonnieezell/myth-auth'>Fluent\Cors</a>=> APPPATH .'ThirdParty/codeigniter4-cors/src',  </li>
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