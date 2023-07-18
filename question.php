<?php
    require_once __DIR__ . '/controller/controller.php';
    $products = [
        [
            'id' =>1,
            'name' =>'Alabaster Table',
            'price' => 12.99,
            'created' => '2019-01-04',
            'sales_count' => 32,
            'views_count' => 730,
        ],
        [
            'id' => 2,
            'name' => 'Zebra Table',
            'price' => 44.49,
            'created' => '2012-01-04',
            'sales_count' => 301,
            'views_count' => 3279,
        ],
        [
            'id' => 3,
            'name' => 'Coffee Table',
            'price' => 10.00,
            'created' => '2014-05-28',
            'sales_count' => 1048,
            'views_count' => 20123,
        ]
    ];
    $productPriceSorter = SORT_ASC;
    // $productSalesPerViewSorter ?

    $catalog = new Catalog($products);
    $productsSortedByPrice = $catalog->getProducts($productPriceSorter);
    // $productSortedBySalesPerView = $catalog->getProducts($productSalesPerViewSorter);

    // story: Our product manager wants to AB test different product sorting to see which one 
    // makes the most sales.It is possible that on different parts of your website different sortings
    // turns out to be most efficient.

    // Task: you get an unsorted array of products and you are required to sort it.Please the code 
    // should allow the given products to be returned in sorted order either by price, the ratio of 
    // sales per view (sales_count divided by views_count) depending on the context. It should be 
    // EXTENSIBLE so that in theory different teams could add their own sorters easily, ie. different
    // teams are able to create and add new sorters seperate from the rest - without touching existing code.