<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <body style="font-family: 'Times New Roman', serif; margin: 50px; color: #000;">
        
        <div style="border-left: 2px solid #ccd9ff; border-bottom: 2px solid #ccd9ff; width: 350px; padding-bottom: 10px; position: relative;">
          
          <div style="border-top: 2px solid #ccd9ff; margin-top: 20px;">
            <div style="background-color: #ccd9ff; width: 220px; padding: 5px 15px; margin-top: -25px; margin-left: 10px; margin-bottom: 20px;">
              <h1 style="margin: 0; font-size: 28px; font-weight: bold;">Oceans</h1>
            </div>
          </div>
          
          <div style="padding-left: 20px;">
            <xsl:for-each select="ocean_data/ocean">
              <div style="margin-bottom: 20px;">
                <h2 style="margin: 0 0 3px 0; font-size: 20px;"><xsl:value-of select="name"/></h2>
                <p style="margin: 0; font-size: 14px;">Area: <xsl:value-of select="area"/></p>
                <p style="margin: 0; font-size: 14px;">Mean depth: <xsl:value-of select="depth"/></p>
              </div>
            </xsl:for-each>
          </div>
          
        </div>
        
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>