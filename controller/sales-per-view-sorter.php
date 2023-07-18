<?php
    class Catalog 
    {
        private $product_catalog;
        function __construct()
        {
            //Get products array
            require_once __DIR__ . './controller.php';
            $this->product_catalog = new Products();
        }
        // Get Products by $productSalesPerViewSorter
        public function getProducts($productSalesPerViewSorter)
        {
            $products = $this->product_catalog->Products();
            // Sort by  ratio of sales per view (sales_count divided by views_count)
            function sortByRatio($a, $b)
            {
                // calculate the ratio for each array with  'sales_count'  and 'views_count' values
                $ratioA = $a['sales_count'] / $a['views_count'];
                $ratioB = $b['sales_count'] / $b['views_count'];

                // compare the ratios of the product arrays and return the result
                if($ratioA == $ratioB){
                    return 0;
                }else if($ratioA < $ratioB){
                    return -1;
                }else{
                    return 1;
                }
            }
            // Sort the product array using the comparison function
            usort($products,'sortByRatio');

            // Return the sorted product array
            return $products;
        }
    }
