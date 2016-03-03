<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:model="urn:com:servandserv:Form:Model"
	xmlns:atom="urn:com:servandserv:Form:XML:Atom:Link"
	xmlns:err="urn:com:servandserv:Form:Errors"
	xmlns:exsl="http://exslt.org/common"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="model atom err"
	version="1.0">

	<xsl:output
		media-type="text/xml"
		method="xml"
		encoding="UTF-8"
		indent="no"
		omit-xml-declaration="yes"  />
		
	<xsl:strip-space elements="*"/>
	
	<xsl:template match="err:Errors">
	    <html lang="ru">
            <head>
                <meta charset="utf-8" />
                <title>Example</title>
                <link rel="stylesheet" href="css/error.styles.css" />
            </head>
            <body>
                <h1>Errors</h1>
                <xsl:for-each select="err:Error">
                    <p><xsl:value-of select="err:value" /></p>
                </xsl:for-each>
                <p><a href='help.html'>Read the help carefully!</a></p>
            </body>
        </html>
	</xsl:template>
	    
</xsl:stylesheet>