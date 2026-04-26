<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <body style="font-family: 'Times New Roman', serif; padding: 20px; color: #000;">
        
        <h1 style="font-size: 32px; margin-bottom: 20px;">Book List</h1>
        
        <table border="1" cellspacing="2" cellpadding="4" style="border-collapse: separate; width: auto; border: 1px solid black;">
          <tr style="text-align: center; font-weight: bold; background-color: #fff;">
            <th style="border: 1px solid black; padding: 2px 10px;">Title</th>
            <th style="border: 1px solid black; padding: 2px 10px;">Author</th>
            <th style="border: 1px solid black; padding: 2px 10px;">Publisher</th>
            <th style="border: 1px solid black; padding: 2px 5px;">Edition</th>
            <th style="border: 1px solid black; padding: 2px 5px;">Price</th>
          </tr>
          
          <xsl:for-each select="root/book_list/book">
            <tr style="white-space: nowrap;">
              <td style="border: 1px solid black; padding: 2px 5px;"><xsl:value-of select="title"/></td>
              <td style="border: 1px solid black; padding: 2px 5px;"><xsl:value-of select="author"/></td>
              <td style="border: 1px solid black; padding: 2px 5px;"><xsl:value-of select="publisher"/></td>
              <td style="border: 1px solid black; padding: 2px 5px; text-align: center;"><xsl:value-of select="edition"/></td>
              <td style="border: 1px solid black; padding: 2px 5px; text-align: center;"><xsl:value-of select="price"/></td>
            </tr>
          </xsl:for-each>
        </table>

        <h1 style="font-size: 28px; margin-top: 20px;">List of class students</h1>
        <ul style="list-style-type: disc; margin-left: 50px;">
          <xsl:for-each select="root/student_list/student">
            <li style="margin-bottom: 10px; font-size: 16px;">
              Name: <xsl:value-of select="name"/>, 
              Address: <xsl:value-of select="address"/> , 
              Roll no: <xsl:value-of select="roll"/> 
              Batch: <xsl:value-of select="batch"/>
            </li>
          </xsl:for-each>
        </ul>
        
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>