<!DOCTYPE html>
<html lang="">
<head>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-Z/def5z5u2aR89OuzYcxmDJ0Bnd5V1cKqBEbvLOiUNWdg9PQeXVvXLI90SE4QOHGlfLqUnDNVAYyZi8UwUTmWQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Scandiweb</title>

</head>

<body>
<form method="POST" action="/product/delete">
<header>
    <p>
        Product List
    </p>
    <div>
        <a  class="btn btn-outline-success btn-lg" href="admin/create.view.php">
            <span>ADD</span>
        </a>
        <button type="submit" class="btn btn-outline-danger btn-lg mx-3" id="delete-product-btn">MASS DELETE</button>
    </div>
</header>

<hr class="header-hr"/>
<section>
    <div class="product-list">
        <div class="product">
            <div class="form-check checkbox">
                <input class="form-check-input delete-checkbox" type="checkbox" name="">
            </div>
            <div class="product-data">
                <p>JVC200123</p>
                <p>Acme DISC</p>
                <p>1.00 $</p>
                <p>Size: 700 MB</p>
            </div>
        </div>
    </div>
</section>
</form>
<footer class="footer">
    <hr/>
    <div>
        <p>Scandiweb Test assignment</p>
    </div>
</footer>
</body>

</html>