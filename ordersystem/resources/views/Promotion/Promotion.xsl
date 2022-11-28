<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" />
    <xsl:template match="/">
        <html>
            <head>
                <title>Promotion</title>
            </head>
            <style>
                .title p{
                font-size: 30px;
                font-family: 'Abel', sans-serif;
                color: #6e6b6a;
                margin-bottom: 5px;
                /*font-weight:bold;*/
                }
                .title {
                margin-left: auto;
                margin-right: auto;
                width:140px;
                margin-bottom:50px;
                border-bottom: 1px solid black;
                }
                button {
                outline: none;
                display: block;
                border: 0;
                font-size: 16px;
                line-height: 1;
                padding: 16px 30px;
                border-radius: 10px;
                cursor: pointer;
                background-color: #6569E9;
                color:white;
                font-weight:bold;
                transition: all 0.3s linear;
                margin-right:auto;
                margin-left:auto;
                }
                table{
                border: 1px solid black;
                border-radius: 10px;
                margin-left: auto; 
                margin-right: auto;
                width:1000px;
                }
                tr{
                padding:15px;
                }
                td{
                font-size: 15px;
                font-family: 'Abel', sans-serif;
                color: #fff;
                text-align:center;
                }
                a:link{
                text-decoration: none;
                }
            </style>
            <body>
                <div class="title">
                    <p>Promotion</p>
                </div>
                <hr/>
                <table border ="1">
                    <tr style="height:50px; text-align: center; background-color: #55608f; color: #fff;">
                        <th>ID</th>
                        <th>Promotion ID</th>
                        <th>Promotion Rate</th>
                        <th>Promotion Description</th>
                    </tr>
                
                    <xsl:for-each select="Promotion/promotion">
                        <tr style="background-color:#8390c9; height:70px;">
                            <td>
                                <xsl:value-of select="@id" />
                            </td>
                            <td>
                                <xsl:value-of select="promotionId" />
                            </td>
                            <td>
                                <xsl:value-of select="promotionRate" />
                            </td>
                            <td>
                                <xsl:value-of select="promotionDescription" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
