<?php

require_once 'web_page.php';
require_once 'tools.php';
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = 0;
}
switch ($op) {
    case 0:homePage(); break;
    case 100: Product_Display(); break;
    case 110:Products_List(); break;
    case 111:Products_Catalogue(); break;
    default: http_response_code(400);
}
function Product_Display()
{
    $product = ['id' => 0, 'name' => 'black dress', 'Description' => 'Little Black Evening dress', 'price' => '$99.99'];
    $page = new web_page();
    $page->title = 'Product'.$product['name'];
    $page->content = array_HTML_table($product);
    $page->render();
}
function homePage()
{
    $home_page = new web_page();
    $home_page->title = 'ElectronicScooter.com Home- Welcome';
    $home_page->content = '<h1>Welcome to home page</h1>';
    $home_page->render();
}

function Products_List()
{
    $products = [
        [
            'id' => 0,
            'name' => 'Red Jersey',
            'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
            'price' => 59.99,
            'pic' => 'red_jersey.jpg',
            'qty_in_stock' => 200,
        ],
        [
            'id' => 1,
            'name' => 'White Jersey',
            'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
            'price' => 49.99,
            'pic' => 'white_jersey.jpg',
            'qty_in_stock' => 133,
        ],
        [
            'id' => 2,
            'name' => 'Black Jersey',
            'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
            'price' => 54.99,
            'pic' => 'black_jersey.jpg',
            'qty_in_stock' => 544,
        ],
        [
            'id' => 3,
            'name' => 'Blue Jacket',
            'description' => 'Blue Jacket for cold and raniy weather',
            'price' => 129.99,
            'pic' => 'blue_jacket.jpg',
            'qty_in_stock' => 14,
        ],
        [
            'id' => 4,
            'name' => 'Snapback Cap',
            'description' => 'Manchester United New Era Snapback Cap- Adult',
            'price' => 24.99,
            'pic' => 'cap.jpg',
            'qty_in_stock' => 655,
        ],
        [
            'id' => 5,
            'name' => 'Champion Flag',
            'description' => 'Manchester United Champions League Flag',
            'price' => 24.99,
            'pic' => 'champion_league_flag.jpg',
            'qty_in_stock' => 321,
        ],
    ];

    $pageProducts = new web_page();
    $pageProducts->title = 'Products List';
    $pageProducts->content = array_HTML_Products($products);
    $pageProducts->render();
}

function Products_Catalogue()
{
    $products = [
        [
            'id' => 0,
            'name' => 'Red Jersey',
            'description' => 'Manchester United Home Jersey, red, sponsored by Chevrolet',
            'price' => 59.99,
            'pic' => 'red_jersey.jpg',
            'qty_in_stock' => 200,
        ],
        [
            'id' => 1,
            'name' => 'White Jersey',
            'description' => 'Manchester United Away Jersey, white, sponsored by Chevrolet',
            'price' => 49.99,
            'pic' => 'white_jersey.jpg',
            'qty_in_stock' => 133,
        ],
        [
            'id' => 2,
            'name' => 'Black Jersey',
            'description' => 'Manchester United Extra Jersey, black, sponsored by Chevrolet',
            'price' => 54.99,
            'pic' => 'black_jersey.jpg',
            'qty_in_stock' => 544,
        ],
        [
            'id' => 3,
            'name' => 'Blue Jacket',
            'description' => 'Blue Jacket for cold and raniy weather',
            'price' => 129.99,
            'pic' => 'blue_jacket.jpg',
            'qty_in_stock' => 14,
        ],
        [
            'id' => 4,
            'name' => 'Snapback Cap',
            'description' => 'Manchester United New Era Snapback Cap- Adult',
            'price' => 24.99,
            'pic' => 'cap.jpg',
            'qty_in_stock' => 655,
        ],
        [
            'id' => 5,
            'name' => 'Champion Flag',
            'description' => 'Manchester United Champions League Flag',
            'price' => 24.99,
            'pic' => 'champion_league_flag.jpg',
            'qty_in_stock' => 321,
        ],
    ];

    function productCatalogue($arrayName)
    {
        $r = '';
        foreach ($arrayName as $key => $value) {
            if ($value['qty_in_stock'] > 0) {
                $r .= '<div class="product">';
                $r .= '<img src=products_images/'.$value['pic'].'>';
                $r .= '<p class="name">'.$value['name'].'</p>';
                $r .= '<p class="description">'.$value['description'].'</p>';
                $r .= '<p class="price">'.$value['price'].'</p>';
                $r .= '</div>';
            }
        }

        return $r;
    }

    $productCataloguePage = new web_page();
    $productCataloguePage->title = 'Products Catalogue';
    $productCataloguePage->content = productCatalogue($products);
    $productCataloguePage->render();
}
