<?php

declare(strict_types=1);
$dest = '../';
include '../includes/header.php';
include '../../src/bootstrap.php';
use App\CMS\Validate;

$errors = ['sku' => '', 'name' => '', 'price' => '','size' => '', 'weight' => '', 'width' => '', 'length' => '', 'height' => '','warning' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $class = $cms->{'get' . $_POST['type']}();

    foreach ($_POST as $key => $value) {
        $method = 'set' . $key;
        $class->$method($value);
    }
    $errors['sku'] = Validate::isText($_POST['sku'], 1, 15)
        ? '' : 'sku should be 1 - 15 characters.';
    $errors['name'] = Validate::isText($_POST['name'], 1, 20)
        ? '' : 'sku should be 1 - 25 characters.';
    $errors['price'] = Validate::isNumber($_POST['price'], 1,  1000000)
        ? '' : 'Price should be between 1 and 1,000,000.';
    $errors['size'] = Validate::isNumber($_POST['size'] ?? true, 1,  1000000)
        ? '' : 'Size should be between 1 and 1,000,000.';
    $errors['weight'] = Validate::isNumber($_POST['weight'] ?? true, 1,  1000)
        ? '' : 'Weight should be between 1 and 100.';
    $errors['width'] = Validate::isNumber($_POST['width'] ?? true, 1,  1000)
        ? '' : 'width should be between 1 and 1000.';
    $errors['height'] = Validate::isNumber($_POST['height'] ?? true, 1,  1000)
        ? '' : 'Height should be between 1 and 1000.';
    $errors['length'] = Validate::isNumber($_POST['length'] ?? true, 1,  1000)
        ? '' : 'Length should be between 1 and 1000.';

    $invalid = implode($errors);

    if ($invalid) {
        $errors['warning'] = 'Please correct form errors';
    } else {
        $saved = $class->save($_POST);
        if ($saved === true) {
            header('Location: ../index.php');
            exit();
        }
        if ($saved === false){
            $errors['sku'] = 'sku already in use';

        }
    }
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

        <a class="btn btn-secondary btn-lg" href="../index.php">
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
                <span class="errors"><?= $errors['sku'] ?></span>

            </div>

        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="name" class="col-form-label">Name</label>
            </div>
            <div class="col-auto">
                <input type="text" id="name" name="name" class="form-control" required>
                <span class="errors"><?= $errors['name'] ?></span>

            </div>
        </div>
        <br>
        <div class="row g-3 align-items-center">
            <div class="col-md-1 col-sm-2">
                <label for="price" class="col-form-label">Price ($)</label>
            </div>
            <div class="col-auto">
                <input type="number" id="price" name="price" class="form-control" required>
                <span class="errors"><?= $errors['price'] ?></span>

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
                <div class="errors"><?= $errors['size'] ?></div>
                <div class="errors"><?= $errors['weight'] ?></div>
                <div class="errors"><?= $errors['width'] ?></div>
                <div class="errors"><?= $errors['length'] ?></div>
                <div class="errors"><?= $errors['height'] ?></div>


            </div>

        </div>
        <br>
        <div id="product-description">

        </div>

</section>
</form>

<?php include '../includes/footer.php'?>