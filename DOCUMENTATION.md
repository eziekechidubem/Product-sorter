# PHP BACKEND ENGINEER ASSESSMENT

## Overview
This Project is developed for product sorting, you can either sot products by its price or by the ratio of sales per view(sales_count divided by view_count).
I made it easy so that you canjust click the buttons on the table footer to perform the sorting.

-Sort by Price:
this button performs a post method where it posts the sorting order which i made to be 'SORT_DESC'.
After the post request then a function which is 'getProducts($productPriceSorter)' is triggered which then sort the product array in the sort order which i mentioned earlier with 'price' as the product array key.

- Sort by Ratio of  Sales Per View:
this button performs a post method where it triggers a function called 'getProducts($productSalesPerViewSorter)'.
The 'getProducts($productSalesPerViewSorter)' sorts the Products by ratio of sales per view (sales_count divided by views_count).
The function then compare the ratios of the product arrays and return the result, After which it sorts the products with the usort() function and then returns the Sorted Product array.


## FUNCTIONS
Controller (folder);
-controller.php (product array);
-price-sorter.php(function to sort Products by Price difference);
-sales-per-view-sorter.php{function to sort products by the ratio of sales per view(sales_count divided by view_count).}.

## PAGES
index.php {Home page where you can sort Products by their price difference or by the ratio of sales per view(sales_count divided by view_count).}
price.php{ Sort Products by Price only}.
sales-per-view.php{Sprt Products bythe ratio of sales per view(sales_count divided by view_count) only.}.