<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>AdventureWorks</title>
</head>
<body>
<div class="header">
    <div id="logo-field">
        <h2>AdventureWorks</h2>
    </div>
    <div id="login-field">
        <div class="buttons">
            <div class="button">PRIJAVA</div>
            <div class="button">REGSTRACIJA</div>
        </div>
    </div>
</div>
<div class="navbar">
    <a class="navbar-item" href='./'>Početna</a>
    <a class="navbar-item" href='?controller=contact&action=index'>Contact</a>
    <a class="navbar-item" href='?controller=address&action=index'>Address</a>
    <a class="navbar-item" href='?controller=department&action=index'>Department</a>
</div>
<div class="row">
    <div class="col-9 col-s-8">
        <div class="main">
            <?php require_once('routes.php'); ?>
        </div>
    </div>
    <div class="col-3 col-s-4">
        <div class="aside">
            <h2>Lorem</h2>
            <p>Integer porta lectus in felis suscipit malesuada. Praesent convallis lectus ac risus cursus sagittis.
                Aliquam ullamcorper nisl quis nulla finibus, at viverra odio sagittis. Cras varius est id odio
                vulputate, non molestie nibh molestie. Fusce ac interdum est. Etiam felis erat, rutrum quis sagittis ut,
                auctor vitae tortor. Integer auctor elit bibendum ex ultricies varius. Nam ut diam bibendum, pharetra
                ipsum eget, ullamcorper risus. Suspendisse ut turpis eget lacus sollicitudin ullamcorper nec sed
                risus.</p>
            <h2>Ipsum</h2>
            <p>Integer porta lectus in felis suscipit malesuada. Praesent convallis lectus ac risus cursus sagittis.
                Aliquam ullamcorper nisl quis nulla finibus, at viverra odio sagittis. Cras varius est id odio
                vulputate, non molestie nibh molestie. Fusce ac interdum est. Etiam felis erat, rutrum quis sagittis ut,
                auctor vitae tortor. Integer auctor elit bibendum ex ultricies varius. Nam ut diam bibendum, pharetra
                ipsum eget, ullamcorper risus. Suspendisse ut turpis eget lacus sollicitudin ullamcorper nec sed
                risus.</p>
        </div>
    </div>
</div>
<div class="footer">
    <h3><a>DEPARTMENT</a> | <a>PRODUCTS</a> | <a>LOCATION</a> | <a>EMPLOYEES</a> | <a>ADRESS</a></h3>
    <h5><a class="mail" href="mailto:anaseser1996@gmail.com" title="anaseser1996@gmail.com">Ana Seser</a> | <a class="mail" href="mailto:petra.kresic96@gmail.com" title="petra.kresic96@gmail.com">Petra Kresic</a></h5>
    <div class="buttons">
        <a class="button" href="https://github.com/pkresic/rnwa" target="_blank">GitHub</a>
    </div>
</div>
</body>
</html>
