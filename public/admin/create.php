<?php

declare(strict_types=1);                                 // Use strict types
$dest = '../';
include '../includes/header.php';
include '../../src/bootstrap.php';                       // Include setup file

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product['sku'] = $_POST['sku'];
    $product['name'] = $_POST['name'];
    $product['price'] = $_POST['price'];
    $product['type'] = $_POST['type'];

    $method_name = 'get'.$product['type'];

    $height = $_POST['height']?? '';
    $widht = $_POST['widht'] ?? '';
    $length = $_POST['length'] ?? '';
    $weight = $_POST['weight'] ?? '';

    $cms->getProduct()->create($product);

    $dvd['id'] = $cms->getProduct()->getLastInsertId();
    $dvd['size'] = $_POST['size'] ?? '';

    $cms->$method_name()->createe($dvd);

}
?>

<body>
<form id="product_form" method="POST">
<header>
    <p>
        Product Add
    </p>
    <div>
        <button type="submit" class="btn btn-primary btn-lg">Save</button>

        <a class="btn btn-secondary btn-lg" href="/">
            <span>Cancel</span>
        </a>
    </div>
</header>
<hr class="header-hr"/>
<section>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="sku" class="form-label">SKU</label>
            </div>
            <div class="col-auto">
                <input type="text" id="sku" name="sku" class="form-control" required>
            </div>

            <div class="col-auto">
                <span class="form-text">
                    <?= $data['skuIsEmpty'] ?? ''  ?>
                </span>
                <span class="form-text">
                    <?= $data['skuIsDuplicated'] ?? ''  ?>
                </span>
            </div>

        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="name" class="col-form-label">Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="price" class="col-form-label">Price ($)</label>
            </div>
            <div class="col-auto">
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="productType" class="switcher-label">Type Switcher</label>
            </div>

            <div class="col-auto">
                <select class="form-select" name="type" id="productType" required="required">
                    <option selected value="" disabled="disabled">Type Switcher</option>
                    <option value="DVD">Dvd</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select>
            </div>

        </div>
        <br>
        <div id="product-description">

        </div>

</section>
</form>

<?php include '../includes/footer.php'?>