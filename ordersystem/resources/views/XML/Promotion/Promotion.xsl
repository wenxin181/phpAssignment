<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" />
    <xsl:template match="/">
        <html>
            <head>
                <title>Promotion</title>
            </head>
            <body>
                <h1>Promotion</h1>
                <hr/>
                <table border ="1">
                    <tr>
                        <th>ID</th>
                        <th>Promotion ID</th>
                        <th>Promotion Rate</th>
                        <th>Promotion Description</th>
                    </tr>
                
                    <xsl:for-each select="Promotion/promotion">
                        <tr>
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
