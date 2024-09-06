<?php $title = 'Scandiweb';?>
<?php include 'includes/header.php'; ?>
<?php include __DIR__ . '/../src/bootstrap.php'; ?>
<?php

$books = $cms->getBook()->getBookProducts();
$dvds = $cms->getDvd()->getDvdProducts();
$furniture = $cms->getFurniture()->getFurnitureProducts();
$products = array_merge($books, $dvds, $furniture);

?>

<body>
<form method="POST" action="admin/delete.php">
<header>
    <p>
        Product List
    </p>
    <div>
        <a  class="btn btn-outline-success btn-lg" href="admin/create.php">
            <span>ADD</span>
        </a>
        <button type="submit" class="btn btn-outline-danger btn-lg mx-3" id="delete-product-btn">MASS DELETE</button>
    </div>
</header>

<hr class="header-hr"/>
<section>
    <div class="product-list">
        <?php foreach($products as $product){ ?>
        <div class="product">
            <div class="form-check checkbox">
                <div class="form-check checkbox">
                    <input class="form-check-input delete-checkbox" type="checkbox" name="selected_products[]" value='<?= json_encode(['id' => $product->getProductId(), 'type' => $product->getType()]) ?>'>
                </div>

            </div>
            <?= $product->print()?>
        </div>
        <?php } ?>
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