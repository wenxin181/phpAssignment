<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <style>
                body {
                background-color: white;
                * { box-sizing: border-box; }
                }

                .header {
                color: black;
                font-size: 1.5em;
                padding: 1rem;
                text-align: center;
                text-transform: uppercase;
                }

                img {
                border-radius: 50%;
                height: 60px;
                width: 60px;
                }

                .table-users {
                border: rgb(242, 252, 252);
                border-radius: 10px;
                box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
                max-width: calc(100% - 2em);
                margin: 1em auto;
                overflow: hidden;
                width: 800px;
                }

                table {
                text-align: center;
                width: 70%;
                margin-left:15%;
                }

                td, th { 
                color: black;
                padding: 20px; 
                }

                td {
                text-align: center;
                vertical-align: middle;
                font-size:16px;
                }

                th { 
                background-color: rgb(213, 237, 240);
                font-weight: bold;
                font-size:18px;
                }

                tr {     
                background-color: white;
                }

                .h2{
                text-align: center;
                }
            </style>
            <head>
                <title>Order</title>
            </head>
            <header>
                <h1 style="text-align:center">Order</h1>
            </header>
            <body>
                <table class="table-user">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Order Date</th>
                        <th>Order Amount</th>
                        <th>Shipping Details</th>
                    </tr>
                
                    <xsl:for-each select="Order/order">
                        <tr>
                            <td>
                                <xsl:value-of select="@id" />
                            </td>
                            <td>
                                <xsl:value-of select="custId" />
                            </td>
                            <td>
                                <xsl:value-of select="orderDate" />
                            </td>
                            <td>
                                <xsl:value-of select="totalAmount" />
                            </td> 
                            <td>                              
                                Name: <xsl:value-of select="shipName" /> 
                                <br></br>
                                Phone:<xsl:value-of select="shipPhone" />
                                <br></br>
                                Address:<xsl:value-of select="shipAddress" />      
                                <br></br>                      
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
