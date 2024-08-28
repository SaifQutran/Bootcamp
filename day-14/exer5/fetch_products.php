<?php
$apiUrl = 'https://fakestoreapi.com/products';
$productsPerPage = 12; // 12 products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $productsPerPage;

// Fetch products for the current page
$response = file_get_contents("$apiUrl?limit=$productsPerPage&offset=$start");
$products = json_decode($response, true);

// Fetch total products count
$totalResponse = file_get_contents($apiUrl);
$totalProducts = count(json_decode($totalResponse, true));
$totalPages = ceil($totalProducts / $productsPerPage);

foreach ($products as $product) {
    echo '
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="' . $product['image'] . '" class="card-img-top" alt="' . $product['title'] . '">
            <div class="card-body">
                <h5 class="card-title">' . $product['title'] . '</h5>
                <p class="card-text">' . substr($product['description'], 0, 100) . '...</p>
                <p class="card-text"><strong>$' . $product['price'] . '</strong></p>
            </div>
        </div>
    </div>';
}
