<?php
    class Catalog 
    {
        private $product_catalog;
        function __construct()
        {
            // get Products array
            require_once __DIR__ . './controller.php';
            $this->product_catalog = new Products();
        }
        // Get Products by $productPriceSorter
        public function getProducts($productPriceSorter)
        {
            // products
            $products = $this->product_catalog->Products();
            // new sorted Product arrray
            $new_products = array();
            $sortable_products = array();
            // Check if product array is empty
            if (count($products) > 0) {

                foreach ($products as $k => $v) {
                    // Check if Product array is an array
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            // making product price array key
                            if ($k2 == "price") {
                                $sortable_products[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_products[$k] = $v;
                    }
                }
                // check order of Array sort by($_POST['q'] in index.php page)
                // I sorted it by order of product's price in Descending order
                switch ($productPriceSorter) {
                    // sort products by Ascending order
                    case "SORT_ASC":
                    asort($sortable_products);
                    break;
                    // sort products by Descending order
                    case "SORT_DESC":
                    arsort($sortable_products);
                    break;
                }
                foreach ($sortable_products as $k => $v) {
                    array_push($new_products, $products[$k]);
                }
            }
            // return sorted Product Array
            return $new_products;
        }
    }
