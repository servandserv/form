<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
    xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:model="urn:com:servandserv:Form:Model"
	xmlns:atom="urn:com:servandserv:Form:XML:Atom:Link"
	xmlns:exsl="http://exslt.org/common"
	extension-element-prefixes="exsl"
	exclude-result-prefixes="model atom xsd"
	version="1.0">

	<xsl:output
		media-type="text/xml"
		method="html"
		encoding="UTF-8"
		indent="no"
		omit-xml-declaration="yes"  />
		
	<xsl:strip-space elements="*"/>
	
	<xsl:template match="xsd:schema">
	    <html lang="ru">
            <head>
                <meta charset="utf-8" />
                <title>Example</title>
                <link rel="stylesheet" href="../../css/list.styles.css" />
            </head>
            <body>
            
                <h1>Values</h1>
                <form method="GET" action="../../index.php" target="_parent">
                    <ul>
                        <xsl:for-each select="xsd:simpleType[@name='priceType']/xsd:restriction/xsd:enumeration">
                            <li>
                                <p>
                                    <input type="radio" name="price" value="{@value}" />
                                    <label><xsl:value-of select="@value" /></label>
                                </p>
                            </li>
                        </xsl:for-each>
                    </ul>
                    <input type="submit" value="Select" />
                </form>
            </body>
        </html>
	</xsl:template>
	    
</xsl:stylesheet>