<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/personData">
        <html>
            <head>
                <title>XSLT Tutorial</title>
            </head>
            <body>
                <table border="1" cellpadding="6" cellspacing="0">
                    <thead bgcolor="#F2F2F2">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="user">
                            <xsl:sort select="@id" order="descending" />
                            <xsl:if test="price &lt;=400">
                                <tr>
                                    <td><xsl:value-of select="@id" /></td>
                                    <td><xsl:value-of select="fname" /></td>
                                    <td><xsl:value-of select="lname" /></td>
                                    <td><xsl:value-of select="email" /></td>
                                </tr>
                            </xsl:if>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
