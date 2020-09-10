<?php

if (!isset($index_loaded)) {
    die('Direct Access to file is forbidden');
}
class products
{
    public function Product_Display()
    {
        $product = ['id' => 0, 'name' => 'black dress', 'Description' => 'Little Black Evening dress', 'price' => '$99.99'];
        $page = new web_page();
        $page->title = 'Product'.$product['name'];
        $page->content = array_HTML_table($product);
        $page->render();
    }

    public function Products_List()
    {
        $DB = new db_pdo();
        $products = $DB->table('products'); //goto pdo_db page
        $table_html = tableDisplay($products);
        $pageProducts = new web_page();
        $pageProducts->title = 'Products List';
        $pageProducts->content = tableDisplay($products);
        $pageProducts->render();
    }

    public function Products_Catalogue()
    {
        $DB = new db_pdo();
        $products = $DB->table('products'); //goto pdo_db page

        $r = '';
        $r = '<form action="index.php?op=111" method="POST" >';
        $r .= '<input class="form-control" type="text" name="search" requried maxlength="8" style="width:300px;"  placeholder="Search" "><br>';
        $r .= ' <input class="btn btn-primary" type="submit" value="Continue" >';
        $r .= '</form>';

        foreach ($products as $key => $value) {
            if ($value['qty_in_stock'] > 0) {
                $r .= '<div class="product">';
                $r .= '<img src="products_images/'.$value['pic'].'" alt="'.$value['description'].'">';
                $r .= '<p class="name">'.$value['name'].'</p>';
                $r .= '<p class="description">'.$value['description'].'</p>';
                $r .= '<p class="price">'.$value['price'].'</p>';
                $r .= '</div>';
            }
        }
        $productCataloguePage = new web_page();
        $productCataloguePage->title = 'Products Catalogue';
        $productCataloguePage->content = $r;
        $productCataloguePage->render();
    }

    public function searchDisplay($array)
    {
        $r = '';
        foreach ($array as $key => $value) {
            $r .= '<div class="product">';
            $r .= '<img src="products_images/'.$value['pic'].'" alt="'.$value['description'].'">';
            $r .= '<p class="name">'.$value['name'].'</p>';
            $r .= '<p class="description">'.$value['description'].'</p>';
            $r .= '<p class="price">'.$value['price'].'</p>';
            $r .= '</div>';
        }
        $productCataloguePage = new web_page();
        $productCataloguePage->title = 'Products Catalogue Search';
        $productCataloguePage->content = $r;
        $productCataloguePage->render();
    }
}
