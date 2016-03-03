<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:model="urn:com:servandserv:Form:Model"
	xmlns:atom="urn:com:servandserv:Form:XML:Atom:Link"
	xmlns:exsl="http://exslt.org/common"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="model atom"
	version="1.0">

	<xsl:output
		media-type="text/xml"
		method="xml"
		encoding="UTF-8"
		indent="no"
		omit-xml-declaration="yes"  />
		
	<xsl:strip-space elements="*"/>
	
	<xsl:template match="model:Model">
	    <html lang="ru">
            <head>
                <meta charset="utf-8" />
                <title>Example</title>
                <link rel="stylesheet" href="css/result.styles.css" />
            </head>
            <body>
                <h1>Ok!</h1>
                <p>You have set 'Product' as '<xsl:value-of select="model:product" />'</p>
                <p>You have set 'Price' as '<xsl:value-of select="model:price" />'</p>
                <p><a href='index.php?reset=1' target='_parent'>go to the new one</a></p>
            </body>
        </html>
	</xsl:template>
	    
</xsl:stylesheet>