<?php
/**
 * @author wai Hau Guan
 */
?>
<html>
    <head>
        <title>Product XML</title>
    </head>
    <body>
        <?php
        require_once('../resources/views/Product/ProductXSLTTransdormation.php');
        $products = new ProductXSLTTransdormation("../resources/views/Product/Product.xml", "../resources/views/Product/Product.xsl");
        ?>
    </body>
</html>
