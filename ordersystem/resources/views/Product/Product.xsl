<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" />
    <xsl:template match="/">
        <html>
            <head>
                <title>Product XML</title>
                <style>
                    #colour tr:nth-child(even){
                    background-color: #f2f2f2;
                    }
                    #colour th {
                    background-color: #171469;
                    color: white;
                    }
                </style>
            </head>
            <body>
                <h1>Products</h1>
                <hr/>
                <table border ="1" id="colour">
                    <tr>
                        <th>Product ID</th>
                        <th>ProductName</th>
                        <th>Product Price</th>
                        <th>Product Detail</th>
                        <th>Quantity</th>
                        <th>Date Publish</th>
                        <th>Colour</th>
                        <th>Category Name</th>
                    </tr>
                
                    <xsl:for-each select="Products/product">
                        <tr>
                            <td>
                                <xsl:value-of select="@id" />
                            </td>
                            <td>
                                <xsl:value-of select="productName" />
                            </td>
                            <td>
                                <xsl:value-of select="productPrice" />
                            </td>
                            <td>
                                <xsl:value-of select="productDetail" />
                            </td>
                            <td>
                                <xsl:value-of select="quantity" />
                            </td>
                            <td>
                                <xsl:value-of select="datePublish" />
                            </td>
                            <td>
                                <xsl:value-of select="colour" />
                            </td>
                            <td>
                                <xsl:value-of select="categoryName" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>

