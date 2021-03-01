(function() {
    /*
    	Home Portal App - Design concent
    	Designed to Raspberry Pi 2

    	Note: you can switch back to home if you slide to right the page

    	For more information follow me on Twitter @Icebobcsi
    	https://twitter.com/Icebobcsi

    	Icons: http://fontawesome.io/
    	Animation: https://greensock.com/gsap
    	Weather icons: http://vclouds.deviantart.com/art/VClouds-Weather-Icons-179152045
    	Home screen inspired by: https://www.behance.net/gallery/20006383/PORTAL-Inspire-Greatness

    */
    var mapLoaded, showMap, showPage;

    mapLoaded = false;

    showPage = function(pageName, cb) {
        var $page, $prevPage, tl;
        $page = $(".page.page-" + pageName);
        $prevPage = $(".page:visible");
        if ($prevPage.attr("class") === $page.attr("class")) {
            return $page;
        }
        // console.log("Show page " + pageName);
        tl = new TimelineLite({
            paused: true,
            onComplete: function() {
                if (!mapLoaded && pageName === "map") {
                    showMap();
                    mapLoaded = true;
                }
                if (cb) {
                    return cb();
                }
            }
        });
        if ($prevPage.length > 0) {
            // Slide out old
            tl.to($prevPage, 0.5, {
                x: 800,
                ease: Power3.easeIn,
                clearProps: "scale",
                onComplete: function() {
                    return $prevPage.hide();
                }
            });
        }
        tl.from($page, 0.5, {
            scale: 0.6,
            delay: 0.2,
            ease: Power3.easeOut,
            onStart: function() {
                return $page.show();
            }
        });

        // Animate home page
        if (pageName === "home") {
            tl.from(".page-home .panel-time", 0.6, {
                x: -400,
                ease: Power3.easeOut
            });
            tl.from(".page-home .panel-weather", 0.6, {
                x: "+=400",
                ease: Power3.easeOut
            }, '-=0.3');
            tl.staggerFrom(".page-home .panel-functions .icon", 1.5, {
                y: 150,
                clearProps: "opacity, scale",
                ease: Elastic.easeOut
            }, 0.2, "-=0.4");
            tl.staggerFrom(".page-home .panel-calendar li", 1.5, {
                x: -400,
                ease: Power3.easeOut
            }, 0.2, "-=2");
            tl.staggerFrom(".page-home .panel-tasks li", 1.5, {
                x: 400,
                ease: Power3.easeOut
            }, 0.2, "-=1.8");
        }

        // Animate weather page
        if (pageName === "weather") {
            tl.from(".page-weather .panel-now", 0.6, {
                x: -500,
                ease: Power3.easeOut
            });
            tl.from(".page-weather .panel-today", 0.6, {
                x: -500,
                ease: Power3.easeOut
            }, '-=0.2');
            tl.from(".page-weather .panel-location", 0.4, {
                x: "+=400",
                ease: Power3.easeOut
            }, '-=0.5');
            tl.staggerFrom(".page-weather .panel-forecast .box", 1.2, {
                y: 150,
                delay: 0.5,
                ease: Elastic.easeOut
            }, 0.1, "-=0.5");
        }

        // Animate calendar page
        if (pageName === "calendar") {
            tl.staggerFrom(".page-calendar .panel-calendar", 1.0, {
                y: -150,
                autoAlpha: 0,
                ease: Power3.easeOut
            }, 0.3);
            tl.staggerFrom(".page-calendar .panel-calendar li", 1.0, {
                y: 150,
                autoAlpha: 0,
                ease: Power3.easeOut
            }, 0.1, "-=0.6");
        }
        // Animate calendar page
        if (pageName === "tasks") {
            tl.staggerFrom(".page-tasks .panel-tasklist", 1.0, {
                y: -150,
                autoAlpha: 0,
                ease: Power3.easeOut
            }, 0.3, "-=0.2");
            tl.staggerFrom(".page-tasks .panel-tasklist li", 1.0, {
                y: 150,
                autoAlpha: 0,
                ease: Power3.easeOut
            }, 0.1, "-=0.8");
        }

        // Play
        tl.play();
        return $page;
    };

    $(function() {
        var bigIndex, smallIndex, stopBigNews, stopSmallNews;
        // $page = showPage "home"

        // Gestures control	
        $('.page').each(function(i, page) {
            var mc, type;
            if ($(page).hasClass("page-home")) {
                return;
            }
            mc = new Hammer(page, {
                preventDefault: true
            });
            type = "pan";
            mc.get(type).set({
                direction: Hammer.DIRECTION_HORIZONTAL,
                threshold: 10
            });
            return mc.on(type + 'right', function(ev) {
                mc.get(type).set({
                    enable: false
                });
                console.log(ev);
                return showPage("home", function() {
                    return mc.get(type).set({
                        enable: true
                    });
                });
            });
        });
        $(".page-home .panel-functions .icon").on("click", function() {
            TweenLite.to($(this), 0.5, {
                scale: 2.0,
                clearProps: "opacity, scale",
                opacity: 0
            });
            return showPage($(this).attr('data-page'));
        });
        $(".page-home .panel-weather").on("click", function() {
            return showPage("weather");
        });
        $(".page-home .panel-tasks").on("click", function() {
            return showPage("tasks");
        });
        $(".page-home .panel-tasks li .check").on("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            return $(this).closest("li").toggleClass("checked");
        });
        $(".page-home .panel-calendar").on("click", function() {
            return showPage("calendar");
        });
        // Task events	
        $(".page-tasks .panel-tasklist li").on("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            return $(this).toggleClass("checked");
        });
        $(".page-tasks .newItem .text").on("click", function(e) {
            var div;
            div = $(e.target).closest(".newItem");
            div.find(".text").hide();
            return div.find("input").val('').show().focus();
        });
        $(".page-tasks .newItem input").on("keypress", function(e) {
            var div, newLI, ul, value;
            if (e.keyCode === 13) {
                value = $(e.target).val();
                div = $(e.target).closest(".newItem");
                div.find(".text").show();
                div.find("input").hide();
                ul = div.parent().find("ul");
                newLI = $("<li/>").append([$("<div/>").addClass("check"), $("<div/>").addClass("title").text(value)]);
                ul.prepend(newLI);
                return TweenMax.from(newLI, 1.2, {
                    y: -50,
                    ease: Elastic.easeOut
                });
            }
        });
        $(".page-tasks .newItem input").on("blur", function(e) {
            var div;
            div = $(e.target).parent();
            div.find(".text").show();
            return div.find("input").hide();
        });

        // News scrolling
        stopBigNews = false;
        $(".page-news .panel-newslist-big").on("mouseenter", function() {
            return stopBigNews = true;
        }).on("mouseleave", function() {
            return stopBigNews = false;
        });
        bigIndex = 1;
        setInterval(function() {
            if (stopBigNews) {
                return;
            }
            TweenLite.to(".page-news .panel-newslist-big ul", 1.5, {
                scrollTo: {
                    x: bigIndex * (370 + 4)
                },
                ease: Power2.easeInOut
            });
            bigIndex++;
            if (bigIndex >= $(".page-news .panel-newslist-big li").length) {
                return bigIndex = 0;
            }
        }, 4000);
        stopSmallNews = false;
        $(".page-news .panel-newslist-small").on("mouseenter", function() {
            return stopSmallNews = true;
        }).on("mouseleave", function() {
            return stopSmallNews = false;
        });
        smallIndex = 1;
        return setInterval(function() {
            var li, top, top0;
            if (stopSmallNews) {
                return;
            }
            li = $(`.page-news .panel-newslist-small li:eq(${smallIndex})`);
            top = li.offset().top;
            top0 = $(".page-news .panel-newslist-small li:eq(0)").offset().top;
            TweenLite.to(".page-news .panel-newslist-small", 1.5, {
                scrollTo: {
                    y: top - top0
                },
                ease: Power2.easeInOut
            });
            smallIndex++;
            if (smallIndex >= $(".page-news .panel-newslist-small	li").length) {
                return smallIndex = 0;
            }
        }, 3000);
    });
	  
	CenterControl = function(controlDiv, map) {
		// Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to recenter the map';
        controlDiv.appendChild(controlUI);
		
		var img = document.createElement('img'); 
		img.src = "../cleaning/dist/search.png";
		controlUI.appendChild(img);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '18px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '20px';
        controlText.innerHTML = 'Detail ATM Map';
        controlUI.appendChild(controlText);
		

        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener('click', function() {
			var content = $('.content_maps').clone().html();
			
			var sitess = [];
			var markerss = [];
			var infoWindow = null;
			
			$.confirm({
				draggable: false,
				title: false,
				theme: 'light',
				content: content,
				columnClass: 'col-md-12',
				buttons: {
					close: function () {
						//close
					},
				},
				onContentReady: function () {
					jc = this;
					
					var prop = {
						center: new google.maps.LatLng(51.508742, -0.120850),
						zoom: 10,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(jc.$content.find('#w3docs-map')[0], prop);
					jc.$content.find('#w3docs-map').show();
					google.maps.event.trigger(map, 'resize');
					
					// var infoWindow = new google.maps.InfoWindow;
					// if (navigator.geolocation) {
						// navigator.geolocation.getCurrentPosition(function(position) {
							// var pos = {
								// lat: position.coords.latitude,
								// lng: position.coords.longitude
							// };

							// infoWindow.setPosition(pos);
							// infoWindow.setContent('Location found.');
							// infoWindow.open(map);
							// map.setCenter(pos);		
						// }, function() {
							// handleLocationError(true, infoWindow, map.getCenter());
						// });
					// } else {
						// // Browser doesn't support Geolocation
						// handleLocationError(false, infoWindow, map.getCenter());
					// }			
					
					infowindow = new google.maps.InfoWindow({
						content: "Loading..."
					});
					// var marker = new google.maps.Marker({
						// map: map,
						// anchorPoint: new google.maps.Point(0, -29)
					// });
					
					$.get("http://localhost/server_pdb/cleaning/dashboard/get_data_atm", function(response){
						$.each(JSON.parse(response), function(key, data) {
							var latlng = JSON.parse(data.latlng);
							var datas = [data.idatm, Number(latlng.lat), Number(latlng.lng), 1, data.idatm];
							
							sitess.push(datas);
						});
						
						setZoom(map, sitess);
						setMarkers(map, sitess);
					});
					
					/*
					This functions sets the markers (array)
					*/
					function setMarkers(map, markers) {
						for (var i = 0; i < markers.length; i++) {
							var site = markers[i];
							var siteLatLng = new google.maps.LatLng(site[1], site[2]);
							
							var icon = { // car icon
								path: 'M29.395,0H17.636c-3.117,0-5.643,3.467-5.643,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759   c3.116,0,5.644-2.527,5.644-5.644V6.584C35.037,3.467,32.511,0,29.395,0z M34.05,14.188v11.665l-2.729,0.351v-4.806L34.05,14.188z    M32.618,10.773c-1.016,3.9-2.219,8.51-2.219,8.51H16.631l-2.222-8.51C14.41,10.773,23.293,7.755,32.618,10.773z M15.741,21.713   v4.492l-2.73-0.349V14.502L15.741,21.713z M13.011,37.938V27.579l2.73,0.343v8.196L13.011,37.938z M14.568,40.882l2.218-3.336 h13.771l2.219,3.336H14.568z M31.321,35.805v-7.872l2.729-0.355v10.048L31.321,35.805',
								scale: 0.4,
								fillColor: "#427af4", //<-- Car Color, you can change it 
								fillOpacity: 1,
								strokeWeight: 1,
								anchor: new google.maps.Point(0, 5),
								// rotation: data.val().angle //<-- Car angle
								rotation: 0 //<-- Car angle
							};

							var marker = new google.maps.Marker({
								icon: "http://localhost/server_pdb/cleaning/seipkon/assets/icon/atm-2.png",
								position: siteLatLng,
								map: map,
								title: site[0],
								zIndex: site[3],
								html: site[4],
								// Markers drop on the map
								animation: google.maps.Animation.DROP
							});
							
							markerss[site[0]] = marker;

							google.maps.event.addListener(marker, "click", function() {
								infowindow.setContent(this.html);
								infowindow.open(map, this);
							});
						}
					}

					/*
					Set the zoom to fit comfortably all the markers in the map
					*/
					function setZoom(map, markers) {
						var boundbox = new google.maps.LatLngBounds();
						for (var i = 0; i < markers.length; i++) {
							boundbox.extend(new google.maps.LatLng(markers[i][1], markers[i][2]));
						}
						map.setCenter(boundbox.getCenter());
						map.fitBounds(boundbox);
					}
				}
			});
        });
	};


    // Show traffic map
    showMap = function() {
        var map, mapOptions, trafficLayer;
        mapOptions = {
            center: {
                lat: -6.915699, 
                lng: 107.617054
            },
			draggable: false,
			zoomControl:false,
			fullscreenControl: false,
			scrollwheel: false, 
			panControl:false, // Set to false to disable
			mapTypeControl:false, // Disable Map/Satellite switch
			scaleControl:false, // Set to false to hide scale
			streetViewControl:false, // Set to disable to hide street view
			overviewMapControl:false, // Set to false to remove overview control
			rotateControl:false, // Set to false to disable rotate control
			gestureHandling: "none", keyboardShortcuts: false,
            zoom: 12,
            // Cobalt Theme
            styles: [{
                    featureType: 'all',
                    elementType: 'all',
                    stylers: [{
                            'invert_lightness': false
                        },
                        {
                            'saturation': 20
                        },
                        {
                            'lightness': 10
                        },
                        {
                            'gamma': 0.5
                        },
                        {
                            'hue': '#90C2DC'
                        }
                    ]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels',
                    stylers: [{
                        'visibility': 'off'
                    }]
                }
            ]
        };
        // map = new google.maps.Map($(".page-map .map").get(0), mapOptions);
        map = new google.maps.Map($(".page-map").get(0), mapOptions);
		
		var centerControlDiv = document.createElement('div');
        var centerControl = new CenterControl(centerControlDiv, map);

        centerControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(centerControlDiv);
		
        trafficLayer = new google.maps.TrafficLayer();
        return trafficLayer.setMap(map);
    };

}).call(this);