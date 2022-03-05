<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
  
  <html>
    <head>
      <title>dama</title>
      <link rel="stylesheet" href="curses.css"/>
      
    </head>
  <body>
    <header>
      <h1 class="curses">Curses Disponibles</h1>
      
      <ul class="navegador">
                <li><a href="../php/contingut.php">Torna al cataleg</a></li>
      </ul>
    </header>
    <div id="carrera">
      <xsl:for-each select="curses/cursa">
      <xsl:sort select="nom"></xsl:sort>
      <div class="cursa">
        <h4><span><xsl:value-of select="nom"></xsl:value-of></span></h4>
        <h4>Tipus:<span><xsl:value-of select="tipus"></xsl:value-of></span></h4>
        <h4>Lloc:<span><xsl:value-of select="lloc"></xsl:value-of></span></h4>
        <h4>Dia:<span><xsl:value-of select="dia"></xsl:value-of></span></h4>
        <img src="IMG/{foto}" alt="carrera"/>
        <input type="button" value="Inscriu-te" id="boto"/>
      </div>
        </xsl:for-each>
  </div>
      <script src="cursa.js"></script>
      </body>
  </html>
  </xsl:template>
</xsl:stylesheet>
