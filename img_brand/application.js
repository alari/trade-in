Ajax.Responders.register({onCreate:function(b){var c=$$("meta[name=csrf-token]")[0];if(c){var d="X-CSRF-Token",a=c.readAttribute("content");if(!b.options.requestHeaders){b.options.requestHeaders={}}b.options.requestHeaders[d]=a}}});var EndlessOffset=0;var validate_email=false;Event.observe=Event.observe.wrap(function(d,b,a,c){$A(Object.isArray(a)?a:[a]).each(function(e){d(b,e,c)});return b});Element.addMethods({observe:Event.observe});Object.extend(document,{observe:Element.Methods.observe.methodize()});document.on("click",function(a){if(!a.target.up("#cities")&&!a.target.up("#brands_panel")&&!a.target.up("#brands_panel_for_dealers")){if($("cities_panel").visible()){Effect.toggle("cities_panel","slide",{duration:0.5,scaleContent:false})}if($("brands_panel").visible()){Effect.toggle("brands_panel","slide",{duration:0.5,scaleContent:false});$("show_brands_list").up(0).removeClassName("selected")}if($("brands_panel_for_dealers").visible()){Effect.toggle("brands_panel_for_dealers","slide",{duration:0.5,scaleContent:false});$("show_brands_list_for_dealers").up(0).removeClassName("selected")}if(a.target.tagName!="A"){if($("show_message")){$("show_message").fade({afterFinish:function(){$("show_message").remove()},duration:0.2})}if(!a.target.up("#list_price_zone")){if($("list_price_zone")){$("list_price_zone").hide()}}}}});document.observe("dom:loaded",function(){checkCookie();if($("brands_panel")){$("brands_panel").setStyle("height",$("brands_panel").down(0).offsetHeight)}if($("link_show_price_zone")){$("link_show_price_zone").observe("click",function(){$("list_price_zone").toggle();event.stop()})}$$(".show_brands_list").invoke("observe","click",function(a){Effect.toggle("brands_panel","slide",{duration:0.5,scaleContent:false});if($("brands_panel_for_dealers").visible()){Effect.toggle("brands_panel_for_dealers","slide",{duration:0.5,scaleContent:false});$("show_brands_list_for_dealers").up(0).removeClassName("selected")}if($("cities_panel").visible()){Effect.toggle("cities_panel","slide",{duration:0.5,scaleContent:false})}if(!$("brands_panel").visible()){$("show_brands_list").up(0).addClassName("selected")}else{$("show_brands_list").up(0).removeClassName("selected")}a.stop()});$$(".show_brands_list_for_dealers").invoke("observe","click",function(a){Effect.toggle("brands_panel_for_dealers","slide",{duration:0.5,scaleContent:false});if($("brands_panel").visible()){Effect.toggle("brands_panel","slide",{duration:0.5,scaleContent:false});$("show_brands_list").up(0).removeClassName("selected")}if($("cities_panel").visible()){Effect.toggle("cities_panel","slide",{duration:0.5,scaleContent:false})}if(!$("brands_panel_for_dealers").visible()){$("show_brands_list_for_dealers").up(0).addClassName("selected")}else{$("show_brands_list_for_dealers").up(0).removeClassName("selected")}a.stop()});if($("show_cities_list")){$("show_cities_list").observe("click",function(a){Effect.toggle("cities_panel","slide",{duration:0.5,scaleContent:false});if($("brands_panel").visible()){Effect.toggle("brands_panel","slide",{duration:0.5,scaleContent:false});$("show_brands_list").up(0).removeClassName("selected")}if($("brands_panel_for_dealers").visible()){Effect.toggle("brands_panel_for_dealers","slide",{duration:0.5,scaleContent:false});$("show_brands_list_for_dealers").up(0).removeClassName("selected")}a.stop()})}});function dealers_show_list(a){$("dealers_list").show();$("maps").up(0).hide();$("dealers_button_list").addClassName("selected");$("dealers_button_map").removeClassName("selected");a.stop()}function dealers_show_maps(d,e,b,c,a,f){$("dealers_list").hide();$("maps").up(0).show();map.setCenter([e,b]);map.container.fitToViewport();$("dealers_button_map").addClassName("selected");$("dealers_button_list").removeClassName("selected");d.stop()}function message_keypressed(){var b=600;var c=$("form_message").getValue();var a=c.length;if(a>b){c=c.substr(0,b)}$("form_message").setValue(c);$("counterSymbol").setValue(c.length)}function message_count(){var b=600;var a=$("form_message").getValue().length;if(a>b){return false}}var attach={Uploads:function(d){var b=$("attachmentPole");var c=$("fileList");var a=new Element("li");a.insert(new Element("span").addClassName("pr-10").update(b.files[0].name));a.insert(new Element("a").addClassName("small mt-10 red").writeAttribute({href:"#",onclick:"attach.Delete(this);return false;"}).update("(Убрать)"));a.insert($("attachmentPole").writeAttribute("id",""));c.insert({bottom:a});c.insert({before:'<input class="attach" type="file" name="attach[]" id="attachmentPole" onchange="attach.Uploads(this)">'})},Delete:function(a){a.parentNode.remove()}};function checkEmail(b){var a=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(b.match(a)){return true}else{return false}}function setCookie(b,c,a,e){var d=new Date();d.setDate(d.getDate()+a);document.cookie=b+"="+escape(c)+((a==null)?"":";expires="+d.toGMTString())+((e)?"; path="+e:"")}function linkCookie(c,a,b){setCookie(a,b,365,"/");location.href=c.href}function change_color(e,d,a){var c=e.getElementsByTagName("input")[0];if(c.checked){c.checked=false}else{c.checked=true}var b=e.getElementsByTagName("img")[0];if(c.checked){b.src=a}else{b.src=d}}function show_form_request(a){$$(".highslide-loading").each(function(b){b.setStyle({background:"transparent url(/javascripts/graphics/ajax-loader.gif) no-repeat left top",width:"16px",height:"16px"})});hs.htmlExpand(a,show_form);return false}function crop_avatar(){new Cropper.Img("cropimage",{ratioDim:{x:200,y:200},minWidth:200,minHeight:200,displayOnInit:true,onEndCrop:onEndCrop})}function onEndCrop(b,a){$("manager_x1").value=b.x1;$("manager_y1").value=b.y1;$("manager_width").value=a.width;$("manager_height").value=a.height}var rData;function check_count_callboards(){new Ajax.Request("/callboards/counter/",{asynchronous:true,method:"post",parameters:{datetime:datetimeUpdate,authenticity_token:AUTH_TOKEN},onSuccess:function(a){if(rCount.all!=null&&rCounterAll!=null&&rCount.all!=rData.all){rCounterAll.setValue(rData.all)}if(rCount.month!=null&&rCounterMonth!=null&&rCount.month!=rData.month){rCounterMonth.setValue(rData.month)}if(rCount.day!=null&&rCounterDay!=null&&rCount.day!=rData.day){rCounterDay.setValue(rData.day)}rCount=rData}})}function declOfNum(a,b){cases=[2,0,1,1,1,2];return b[(a%100>4&&a%100<20)?2:cases[(a%10<5)?a%10:5]]}function sleep(a){var c=new Date().getTime();for(var b=0;b<10000000;b++){if((new Date().getTime()-c)>a){break}}}function show_dealers(c){var b={zoom:c.zoom,type:"yandex#map",center:[c.lat,c.lng]};map=new ymaps.Map($("maps"),b);map.controls.add("mapTools").add("zoomControl").add("typeSelector");var e=ymaps.templateLayoutFactory.createClass('<a href="$[properties.url]"><strong>$[properties.name]</strong></a><p class="gray font-10">$[properties.address]<br/>$[properties.phone]</p>');ymaps.layout.storage.add("my#layout",e);var d=new ymaps.GeoObjectCollection({},{balloonContentBodyLayout:"my#layout",balloonCloseButton:true,geoObjectDraggable:false,geoObjectCursor:"point",hideIconOnBalloonOpen:false,balloonMaxWidth:300});var a=add_marker(c);d.add(a);map.geoObjects.add(d)}function add_marker(c){var b="http://assets.a1.ru/images/pins/pin-blue.png";var d={iconImageHref:b,iconImageSize:[32,32],iconImageOffset:[-19,-27]};var a=new ymaps.Placemark([c.lat,c.lng],{hintContent:c.name,url:c.link,name:c.name,address:c.address,phone:c.phone},d);return a}function initialize_map(b,h,e,c,d){var a={zoom:d,type:"yandex#map",center:[e,c]};map=new ymaps.Map($("maps"),a);map.controls.add("mapTools").add("zoomControl").add("typeSelector");var g=ymaps.templateLayoutFactory.createClass('<a href="$[properties.url]"><strong>$[properties.name]</strong></a><p class="gray font-10">$[properties.address]<br/>$[properties.phone]</p>');ymaps.layout.storage.add("my#layout",g);var f=new ymaps.GeoObjectCollection({},{balloonContentBodyLayout:"my#layout",balloonCloseButton:true,geoObjectDraggable:false,geoObjectCursor:"point",hideIconOnBalloonOpen:false,balloonMaxWidth:300});data.each(function(j){if(j.lat!=null&&j.lng!=null){var i=add_marker(j);f.add(i)}});map.geoObjects.add(f)}var Navigate=Class.create();Navigate.prototype={initialize:function(a){this.current_page=1;this.ajax_path=a;this.offset=0},next:function(){this.current_page++;new Ajax.Request(this.ajax_path+"?page="+this.current_page+"&offset="+this.offset,{asynchronous:true,evalScripts:true,method:"get"})}};function show_message(e,d){if($("show_message")){$("show_message").remove()}$(d).insert({after:new Element("div",{"class":"arrow_box font-12",id:"show_message"})});$("show_message").insert({top:new Element("p").update(e)});var f=$(d).positionedOffset();var a=$("show_message").getDimensions();var c=f.left-a.width-20;var b=f.top-a.height/2+10;$("show_message").setStyle({left:c+"px",top:b+"px"});return false};