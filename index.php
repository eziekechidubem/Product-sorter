<?php 
require_once __DIR__ . '/controller/controller.php';
$productlist = new Products();
$products = $productlist->Products();
    if(isset($_POST['q']) && $_POST['q']=="SORT_DESC")
    {
        require_once __DIR__ . '/controller/price-sorter.php';
        $catalog = new Catalog($products);
        $productPriceSorter = $_POST['q'];
        $productsSortedByPrice = $catalog->getProducts($productPriceSorter); 
    } 
    if(isset($_POST['sort']) && $_POST['sort']=="sort-with-ratio")
    {
        require_once __DIR__ . '/controller/sales-per-view-sorter.php';
        $catalog = new Catalog($products);
        $productSalesPerViewSorter = $_POST['sort'];
        $productSortedBySalesPerView = $catalog->getProducts($productSalesPerViewSorter); 
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>PHP Backend Engineer Assessment</title>
</head>
<body>
    <div class="text-center">
        <h4 class="title">Product Sorter by Product Price & the ratio of sales per view</h4>
    </div>
    <div class="header">
        <div class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="README.md">Read me</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="DOCUMENTATION.md">DOCUMENTATION</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="price.php">Sort by Only Price</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="sales-per-view.php">Sort by Ratio of sales per view</a>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-head">
                <h6 class="title">Product Catalog</h6>
            </div>
            <?php 
                if(!empty($productsSortedByPrice))
                {?>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Sales Count</th>
                        <th>View Count</th>
                        <p class="text-success">Products Sorted by Price in Descending Order</p>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (is_array($productsSortedByPrice)) {
                                foreach ($productsSortedByPrice as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $productsSortedByPrice[$key]["id"]; ?></td>
                            <td><?php echo $productsSortedByPrice[$key]["name"]; ?></td>
                            <td><?php echo $productsSortedByPrice[$key]["price"]; ?></td>
                            <td><?php echo $productsSortedByPrice[$key]["created"]; ?></td>
                            <td><?php echo $productsSortedByPrice[$key]["sales_count"]; ?></td>
                            <td><?php echo $productsSortedByPrice[$key]["views_count"]; ?></td>
                        </tr>
                        <?php
                            $i ++;
                            }
                            }else{
                                print"array not found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p > Click any of the button below to perform Product Sort</p>
                <form method="post">
                    <input hidden name="q" value="SORT_DESC">
                    <button type="submit">Sort by Price</button>
                </form>
                <form method="post">
                    <input hidden name="sort" value="sort-with-ratio">
                    <button type="submit">Sort by Ratio of  Sales Per View</button>
                </form>
            </div>
            <?php 
                }elseif(!empty($productSortedBySalesPerView)){
            ?>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Sales Count</th>
                        <th>View Count</th>
                        <p class="text-success">Products Sorted by the ratio of sales per view(sales_count divided by view_count).</p>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (is_array($productSortedBySalesPerView)) {
                                foreach ($productSortedBySalesPerView as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $productSortedBySalesPerView[$key]["id"]; ?></td>
                            <td><?php echo $productSortedBySalesPerView[$key]["name"]; ?></td>
                            <td><?php echo $productSortedBySalesPerView[$key]["price"]; ?></td>
                            <td><?php echo $productSortedBySalesPerView[$key]["created"]; ?></td>
                            <td><?php echo $productSortedBySalesPerView[$key]["sales_count"]; ?></td>
                            <td><?php echo $productSortedBySalesPerView[$key]["views_count"]; ?></td>
                        </tr>
                        <?php
                            $i ++;
                            }
                            }else{
                                print"array not found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p > Click any of the button below to perform Product Sort</p>
                <form method="post">
                    <input hidden name="q" value="SORT_DESC">
                    <button type="submit">Sort by Price</button>
                </form>
                <form method="post">
                    <input hidden name="sort" value="sort-with-ratio">
                    <button type="submit">Sort by Ratio of  Sales Per View</button>
                </form>
            </div>
            <?php 
                }else{
            ?>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date Created</th>
                        <th>Sales Count</th>
                        <th>View Count</th>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                            if (is_array($products)) {
                                foreach ($products as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $products[$key]["id"]; ?></td>
                            <td><?php echo $products[$key]["name"]; ?></td>
                            <td><?php echo $products[$key]["price"]; ?></td>
                            <td><?php echo $products[$key]["created"]; ?></td>
                            <td><?php echo $products[$key]["sales_count"]; ?></td>
                            <td><?php echo $products[$key]["views_count"]; ?></td>
                        </tr>
                        <?php
                            $i ++;
                            }
                            }else{
                                print"array not found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p > Click any of the button below to perform Product Sort</p>
                <form method="post">
                    <input hidden name="q" value="SORT_DESC">
                    <button type="submit">Sort by Price</button>
                </form>
                <form method="post">
                    <input hidden name="sort" value="sort-with-ratio">
                    <button type="submit">Sort by Ratio of  Sales Per View</button>
                </form>
            </div>
            <?php };?>
        </div>
    </div><br><br>
    <footer class="footer">
        <p >By Ezieke Chidubem Victor</p>
    </footer>
</body>
</html>