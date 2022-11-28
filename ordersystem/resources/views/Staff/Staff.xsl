<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Staff List</title>
            </head>
            <style>
                #staff {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                }

                #staff td, #staff th {
                border: 1px solid #ddd;
                padding: 8px;
                }

                #staff tr:nth-child(even){background-color: #f2f2f2;}

                #staff th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #FCAE1E;
                color: white;
                }
            </style>
            <body>
                <div class="text-center mt-3 pt-3 mb-5 ">
                    <h2>MuMu Staff List</h2>
                </div>
        
                <table border="1" id="staff">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                    </tr>
          
                    <xsl:for-each select="Staff/staff">
                        <tr>
                            <td>
                                <xsl:value-of select="@id" />
                            </td>
                            <td>
                                <xsl:value-of select="staffName" />
                            </td>
                            <td>
                                <xsl:value-of select="staffEmail" />
                            </td>
                            <td>
                                <xsl:value-of select="staffPosition" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>       
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
