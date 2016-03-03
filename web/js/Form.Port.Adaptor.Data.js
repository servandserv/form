;(function(h) {
		
	h.Locator( "Form.Port.Adaptor.Data.Form.XML.Atom.Link", function(args) {
		return (function(args){
			var NS="urn:com:servandserv:Form:XML:Atom:Link";
			var ROOT="Link";
			var URI="urn:com:servandserv:Form:XML:Atom:Link:Link";
			var anyComplexType = {
				rel: null,
				href: null,
				type: null,
				method: null
			};
			var Link = h.Port.Adaptor.Data.XML.Schema.AnyComplexType.extend({
		
				getRel: function() { return anyComplexType.rel; },
				getHref: function() { return anyComplexType.href; },
				getType: function() { return anyComplexType.type; },
				getMethod: function() { return anyComplexType.method; },
		
				setRel: function(val) { 
			        if ( val === null ) {
			            anyComplexType.rel = val;
				        this.publish("relValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.rel = val;
				        this.publish("relValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.rel = val;
				        this.publish("relValidationErrorOccured",{});
				        return false;
				    }
		        },
				setHref: function(val) { 
			        if ( val === null ) {
			            anyComplexType.href = val;
				        this.publish("hrefValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.href = val;
				        this.publish("hrefValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.href = val;
				        this.publish("hrefValidationErrorOccured",{});
				        return false;
				    }
		        },
				setType: function(val) { 
			        if ( val === null ) {
			            anyComplexType.type = val;
				        this.publish("typeValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertEnumeration(["text/html"],val,this) &&
	                    h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.type = val;
				        this.publish("typeValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.type = val;
				        this.publish("typeValidationErrorOccured",{});
				        return false;
				    }
		        },
				setMethod: function(val) { 
			        if ( val === null ) {
			            anyComplexType.method = val;
				        this.publish("methodValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertEnumeration(["GET", "POST"],val,this) &&
	                    h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.method = val;
				        this.publish("methodValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.method = val;
				        this.publish("methodValidationErrorOccured",{});
				        return false;
				    }
		        },
				getAll: function() { return anyComplexType; },
				setAll: function(obj) { anyComplexType=obj; },
				URI: URI,
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					
					if(parser.tag.isSelfClosing === true && parent !== null) {
						parent.fromXmlParser(parser,parent.parent,callback);
					}
					parser.onclosetag = function(tag) {
						if(tag == ROOT && parent !== null) {
							parent.fromXmlParser(parser,parent.parent,callback);
						}else if(tag == ROOT && parent === null) {
							callback(self);
						}
					};
					parser.onopentag = function(node) {
						switch(node.name) {
							default:
								break;
						}
					};
					parser.ontext = function(t) {
						switch(parser.tag.name) {
							case "rel":
								self.setRel(t);
								break;
							case "href":
								self.setHref(t);
								break;
							case "type":
								self.setType(t);
								break;
							case "method":
								self.setMethod(t);
								break;
							default:
								break;
						}
					};
				},
				toXmlStr: function() {
					var prop, str;
					str = "<"+ROOT+" xmlns='"+NS+"'>";
					prop = this.getRel();
					if( prop !== null ) {
						str += "<rel>"+h.escapeHTML(this.getRel())+"</rel>";
					}
					prop = this.getHref();
					if( prop !== null ) {
						str += "<href>"+h.escapeHTML(this.getHref())+"</href>";
					}
					prop = this.getType();
					if( prop !== null ) {
						str += "<type>"+h.escapeHTML(this.getType())+"</type>";
					}
					prop = this.getMethod();
					if( prop !== null ) {
						str += "<method>"+h.escapeHTML(this.getMethod())+"</method>";
					}
					str += "</"+ROOT+">";
					return str;
				},
				validate: function(pubsub) {
				    var validator = h.Locator('Form.Port.Adaptor.Data.Form.XML.Atom.LinkValidator');
				    validator.validate(this,pubsub);
				}
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(Link);
		}(args));
	});
	// Validator
	h.Locator( "Form.Port.Adaptor.Data.Form.XML.Atom.LinkValidator", function(args) {
	    return (function(args) {
	        var LinkValidator = h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.extend({
	            validate: function(m,pubsub) {
	                h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.validate(m,pubsub);
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getRel(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getRel(), pubsub)) || 
	                    (m.getRel() !== null && m.setRel(m.getRel()) == false )) {
	                    pubsub.publish("relValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "rel",val:m.getRel()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getHref(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getHref(), pubsub)) || 
	                    (m.getHref() !== null && m.setHref(m.getHref()) == false )) {
	                    pubsub.publish("hrefValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "href",val:m.getHref()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("0",m.getType(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getType(), pubsub)) || 
	                    (m.getType() !== null && m.setType(m.getType()) == false )) {
	                    pubsub.publish("typeValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "type",val:m.getType()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("0",m.getMethod(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getMethod(), pubsub)) || 
	                    (m.getMethod() !== null && m.setMethod(m.getMethod()) == false )) {
	                    pubsub.publish("methodValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "method",val:m.getMethod()});
	                }
	            }
	        });
	        var pubsub = h.Locator("Happymeal.PubSub");
	        return pubsub.extend(LinkValidator);
	    }(args));
	});
    
	h.Locator( "Form.Port.Adaptor.Data.Form.Errors", function(args) {
		return (function(args){
			var NS="urn:com:servandserv:Form:Errors";
			var ROOT="Errors";
			var URI="urn:com:servandserv:Form:Errors:Errors";
			var anyComplexType = {
				Error: [],
				Link: []
			};
			var Errors = h.Port.Adaptor.Data.XML.Schema.AnyComplexType.extend({
		
				getError: function() { return anyComplexType.Error; },
				getLink: function() { return anyComplexType.Link; },
		
				setError: function(val) { if (h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertType("Form:Port:Adaptor:Data:Form:Errors:Error",val,this)) {
				        anyComplexType.Error.push(val);
				        this.publish("ErrorValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.Error.push(val);
				        this.publish("ErrorValidationErrorOccured",{});
				        return false;
				    }
		        },
				setLink: function(val) { if (h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertType("Form:Port:Adaptor:Data:Form:XML:Atom:Link",val,this)) {
				        anyComplexType.Link.push(val);
				        this.publish("LinkValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.Link.push(val);
				        this.publish("LinkValidationErrorOccured",{});
				        return false;
				    }
		        },
				getAll: function() { return anyComplexType; },
				setAll: function(obj) { anyComplexType=obj; },
				URI: URI,
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					
					if(parser.tag.isSelfClosing === true && parent !== null) {
						parent.fromXmlParser(parser,parent.parent,callback);
					}
					parser.onclosetag = function(tag) {
						if(tag == ROOT && parent !== null) {
							parent.fromXmlParser(parser,parent.parent,callback);
						}else if(tag == ROOT && parent === null) {
							callback(self);
						}
					};
					parser.onopentag = function(node) {
						switch(node.name) {
							case "Error":
								var Error = h.Locator("Form.Port.Adaptor.Data.Form.Errors.Error");
								Error.fromXmlParser(parser,self,callback);
								self.setError(Error);
								break;
							case "Link":
								var Link = h.Locator("Form.Port.Adaptor.Data.Form.XML.Atom.Link");
								Link.fromXmlParser(parser,self,callback);
								self.setLink(Link);
								break;
							default:
								break;
						}
					};
					parser.ontext = function(t) {
						switch(parser.tag.name) {
							default:
								break;
						}
					};
				},
				toXmlStr: function() {
					var prop, str;
					str = "<"+ROOT+" xmlns='"+NS+"'>";
					prop = this.getError();
					var len = prop.length;
					for(var i=0;i < len;i++ ) {
						str += prop[i].toXmlStr();
					}
					prop = this.getLink();
					var len = prop.length;
					for(var i=0;i < len;i++ ) {
						str += prop[i].toXmlStr();
					}
					str += "</"+ROOT+">";
					return str;
				},
				validate: function(pubsub) {
				    var validator = h.Locator('Form.Port.Adaptor.Data.Form.ErrorsValidator');
				    validator.validate(this,pubsub);
				}
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(Errors);
		}(args));
	});
	// Validator
	h.Locator( "Form.Port.Adaptor.Data.Form.ErrorsValidator", function(args) {
	    return (function(args) {
	        var ErrorsValidator = h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.extend({
	            validate: function(m,pubsub) {
	                h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.validate(m,pubsub);
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getError(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("unbounded",m.getError(), pubsub))) {
	                    pubsub.publish("ErrorValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "Error",val:m.getError()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getLink(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("unbounded",m.getLink(), pubsub))) {
	                    pubsub.publish("LinkValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "Link",val:m.getLink()});
	                }
	            }
	        });
	        var pubsub = h.Locator("Happymeal.PubSub");
	        return pubsub.extend(ErrorsValidator);
	    }(args));
	});
    
	h.Locator( "Form.Port.Adaptor.Data.Form.Errors.Error", function(args) {
		return (function(args){
			var NS="urn:com:servandserv:Form:Errors";
			var ROOT="Error";
			var URI="urn:com:servandserv:Form:Errors:Error";
			var anyComplexType = {
				code: null,
				ref: null,
				value: null
			};
			var Error = h.Port.Adaptor.Data.XML.Schema.AnyComplexType.extend({
		
				getCode: function() { return anyComplexType.code; },
				getRef: function() { return anyComplexType.ref; },
				getValue: function() { return anyComplexType.value; },
		
				setCode: function(val) { 
			        if ( val === null ) {
			            anyComplexType.code = val;
				        this.publish("codeValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("Integer",val,this)) {
    				    anyComplexType.code = val;
				        this.publish("codeValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.code = val;
				        this.publish("codeValidationErrorOccured",{});
				        return false;
				    }
		        },
				setRef: function(val) { 
			        if ( val === null ) {
			            anyComplexType.ref = val;
				        this.publish("refValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.ref = val;
				        this.publish("refValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.ref = val;
				        this.publish("refValidationErrorOccured",{});
				        return false;
				    }
		        },
				setValue: function(val) { 
			        if ( val === null ) {
			            anyComplexType.value = val;
				        this.publish("valueValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.value = val;
				        this.publish("valueValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.value = val;
				        this.publish("valueValidationErrorOccured",{});
				        return false;
				    }
		        },
				getAll: function() { return anyComplexType; },
				setAll: function(obj) { anyComplexType=obj; },
				URI: URI,
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					
					if(parser.tag.isSelfClosing === true && parent !== null) {
						parent.fromXmlParser(parser,parent.parent,callback);
					}
					parser.onclosetag = function(tag) {
						if(tag == ROOT && parent !== null) {
							parent.fromXmlParser(parser,parent.parent,callback);
						}else if(tag == ROOT && parent === null) {
							callback(self);
						}
					};
					parser.onopentag = function(node) {
						switch(node.name) {
							default:
								break;
						}
					};
					parser.ontext = function(t) {
						switch(parser.tag.name) {
							case "code":
								self.setCode(t);
								break;
							case "ref":
								self.setRef(t);
								break;
							case "value":
								self.setValue(t);
								break;
							default:
								break;
						}
					};
				},
				toXmlStr: function() {
					var prop, str;
					str = "<"+ROOT+" xmlns='"+NS+"'>";
					prop = this.getCode();
					if( prop !== null ) {
						str += "<code>"+h.escapeHTML(this.getCode())+"</code>";
					}
					prop = this.getRef();
					if( prop !== null ) {
						str += "<ref>"+h.escapeHTML(this.getRef())+"</ref>";
					}
					prop = this.getValue();
					if( prop !== null ) {
						str += "<value>"+h.escapeHTML(this.getValue())+"</value>";
					}
					str += "</"+ROOT+">";
					return str;
				},
				validate: function(pubsub) {
				    var validator = h.Locator('Form.Port.Adaptor.Data.Form.Errors.ErrorValidator');
				    validator.validate(this,pubsub);
				}
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(Error);
		}(args));
	});
	// Validator
	h.Locator( "Form.Port.Adaptor.Data.Form.Errors.ErrorValidator", function(args) {
	    return (function(args) {
	        var ErrorValidator = h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.extend({
	            validate: function(m,pubsub) {
	                h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.validate(m,pubsub);
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getCode(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getCode(), pubsub)) || 
	                    (m.getCode() !== null && m.setCode(m.getCode()) == false )) {
	                    pubsub.publish("codeValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "code",val:m.getCode()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getRef(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getRef(), pubsub)) || 
	                    (m.getRef() !== null && m.setRef(m.getRef()) == false )) {
	                    pubsub.publish("refValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "ref",val:m.getRef()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getValue(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getValue(), pubsub)) || 
	                    (m.getValue() !== null && m.setValue(m.getValue()) == false )) {
	                    pubsub.publish("valueValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "value",val:m.getValue()});
	                }
	            }
	        });
	        var pubsub = h.Locator("Happymeal.PubSub");
	        return pubsub.extend(ErrorValidator);
	    }(args));
	});
    
	h.Locator( "Form.Port.Adaptor.Data.Form.Model", function(args) {
		return (function(args){
			var NS="urn:com:servandserv:Form:Model";
			var ROOT="Model";
			var URI="urn:com:servandserv:Form:Model:Model";
			var anyComplexType = {
				ID: null,
				product: null,
				price: null,
				Link: []
			};
			var Model = h.Port.Adaptor.Data.XML.Schema.AnyComplexType.extend({
		
				getID: function() { return anyComplexType.ID; },
				getProduct: function() { return anyComplexType.product; },
				getPrice: function() { return anyComplexType.price; },
				getLink: function() { return anyComplexType.Link; },
		
				setID: function(val) { 
			        if ( val === null ) {
			            anyComplexType.ID = val;
				        this.publish("IDValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.ID = val;
				        this.publish("IDValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.ID = val;
				        this.publish("IDValidationErrorOccured",{});
				        return false;
				    }
		        },
				setProduct: function(val) { 
			        if ( val === null ) {
			            anyComplexType.product = val;
				        this.publish("productValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertPattern("^[a-zA-Z]{1,5}$",val,this) &&
	                    h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("String",val,this)) {
    				    anyComplexType.product = val;
				        this.publish("productValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.product = val;
				        this.publish("productValidationErrorOccured",{});
				        return false;
				    }
		        },
				setPrice: function(val) { 
			        if ( val === null ) {
			            anyComplexType.price = val;
				        this.publish("priceValidationSuccessOccured",{});
				        return true;
			        } else if (h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertEnumeration(["1", "2", "3", "4"],val,this) &&
	                    h.Port.Adaptor.Data.XML.Schema.AnySimpleTypeValidator.assertSimple("Int",val,this)) {
    				    anyComplexType.price = val;
				        this.publish("priceValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.price = val;
				        this.publish("priceValidationErrorOccured",{});
				        return false;
				    }
		        },
				setLink: function(val) { if (h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertType("Form:Port:Adaptor:Data:Form:XML:Atom:Link",val,this)) {
				        anyComplexType.Link.push(val);
				        this.publish("LinkValidationSuccessOccured",{});
				        return true;
				    } else {
				        anyComplexType.Link.push(val);
				        this.publish("LinkValidationErrorOccured",{});
				        return false;
				    }
		        },
				getAll: function() { return anyComplexType; },
				setAll: function(obj) { anyComplexType=obj; },
				URI: URI,
				fromXmlParser: function(parser,parent,callback) {
					this.parent = parent;
					var self = this;
					
					if(parser.tag.isSelfClosing === true && parent !== null) {
						parent.fromXmlParser(parser,parent.parent,callback);
					}
					parser.onclosetag = function(tag) {
						if(tag == ROOT && parent !== null) {
							parent.fromXmlParser(parser,parent.parent,callback);
						}else if(tag == ROOT && parent === null) {
							callback(self);
						}
					};
					parser.onopentag = function(node) {
						switch(node.name) {
							case "Link":
								var Link = h.Locator("Form.Port.Adaptor.Data.Form.XML.Atom.Link");
								Link.fromXmlParser(parser,self,callback);
								self.setLink(Link);
								break;
							default:
								break;
						}
					};
					parser.ontext = function(t) {
						switch(parser.tag.name) {
							case "ID":
								self.setID(t);
								break;
							case "product":
								self.setProduct(t);
								break;
							case "price":
								self.setPrice(t);
								break;
							default:
								break;
						}
					};
				},
				toXmlStr: function() {
					var prop, str;
					str = "<"+ROOT+" xmlns='"+NS+"'>";
					prop = this.getID();
					if( prop !== null ) {
						str += "<ID>"+h.escapeHTML(this.getID())+"</ID>";
					}
					prop = this.getProduct();
					if( prop !== null ) {
						str += "<product>"+h.escapeHTML(this.getProduct())+"</product>";
					}
					prop = this.getPrice();
					if( prop !== null ) {
						str += "<price>"+h.escapeHTML(this.getPrice())+"</price>";
					}
					prop = this.getLink();
					var len = prop.length;
					for(var i=0;i < len;i++ ) {
						str += prop[i].toXmlStr();
					}
					str += "</"+ROOT+">";
					return str;
				},
				validate: function(pubsub) {
				    var validator = h.Locator('Form.Port.Adaptor.Data.Form.ModelValidator');
				    validator.validate(this,pubsub);
				}
			});
			var pubsub = h.Locator("Happymeal.PubSub");
			return pubsub.extend(Model);
		}(args));
	});
	// Validator
	h.Locator( "Form.Port.Adaptor.Data.Form.ModelValidator", function(args) {
	    return (function(args) {
	        var ModelValidator = h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.extend({
	            validate: function(m,pubsub) {
	                h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.validate(m,pubsub);
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("0",m.getID(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getID(), pubsub)) || 
	                    (m.getID() !== null && m.setID(m.getID()) == false )) {
	                    pubsub.publish("IDValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "ID",val:m.getID()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getProduct(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getProduct(), pubsub)) || 
	                    (m.getProduct() !== null && m.setProduct(m.getProduct()) == false )) {
	                    pubsub.publish("productValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "product",val:m.getProduct()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getPrice(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("1",m.getPrice(), pubsub)) || 
	                    (m.getPrice() !== null && m.setPrice(m.getPrice()) == false )) {
	                    pubsub.publish("priceValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "price",val:m.getPrice()});
	                }
	                if((!h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMinOccurs("1",m.getLink(), pubsub) ||
	                    !h.Port.Adaptor.Data.XML.Schema.AnyComplexTypeValidator.assertMaxOccurs("unbounded",m.getLink(), pubsub))) {
	                    pubsub.publish("LinkValidationErrorOccured",{});
	                    pubsub.publish("validationErrorOccured",{prop: "Link",val:m.getLink()});
	                }
	            }
	        });
	        var pubsub = h.Locator("Happymeal.PubSub");
	        return pubsub.extend(ModelValidator);
	    }(args));
	});
    
}(Happymeal));
	