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
                <link rel="stylesheet" href="css/styles.css" />
            </head>
            <body>
                <div>
                    <div>
                        <h1>Framed form control flow<br/><small>(no js)</small></h1>
                        <form method="POST" action="{atom:Link[atom:rel = 'self']/atom:href}" target="iframe">
                            <div>
                                <label for="product">Product<sup>*</sup></label>
                                <input type="text" id="product" name="product" value="{model:product}" placeholder="set product" />
                            </div>
                            <div>
                                <label for="input-2">Price<sup>*</sup></label>
                                <input type="text" id="price" name="price" value="{model:price}" placeholder="choose from the list" readonly="readonly"/>
                                <input type="submit" name="part" value="List" />
                            </div>
                            <div><sup>*</sup> mandatory fields</div>
                            <div>
                                <input type="submit" name="full" value="Submit" />
                                &#160;
                                <a href="index.php?reset">Reset</a>
                            </div>
                        </form>
                    </div>
                    <div>
                        <iframe id="iframe" name="iframe" src="help.html" width="100%" height="100%">;</iframe>
                    </div>
                </div>
            </body>
        </html>
	</xsl:template>
	    
</xsl:stylesheet>