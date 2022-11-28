
/*!

=========================================================
* Argon Dashboard - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/



'use strict';

var Layout = (function() {

    function pinSidenav() {
		document.getElementById('sidenav-main').style.display = "block";
        $('.sidenav-toggler').addClass('active');
        $('.sidenav-toggler').data('action', 'sidenav-unpin');
        $('body').removeClass('g-sidenav-hidden').addClass('g-sidenav-show g-sidenav-pinned');
        $('body').append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target='+$('#sidenav-main').data('target')+' />');

        // Store the sidenav state in a cookie session
        Cookies.set('sidenav-state', 'pinned');
		//document.getElementById('sidenav-main').style.display = "none";
    }

    function unpinSidenav() {
		
        $('.sidenav-toggler').removeClass('active');
        $('.sidenav-toggler').data('action', 'sidenav-pin');
        $('body').removeClass('g-sidenav-pinned').addClass('g-sidenav-hidden');
        $('body').find('.backdrop').remove();

        // Store the sidenav state in a cookie session
        Cookies.set('sidenav-state', 'unpinned');
    }

    // Set sidenav state from cookie

    var $sidenavState = Cookies.get('sidenav-state') ? Cookies.get('sidenav-state') : 'pinned';

    if($(window).width() > 1200) {
        if($sidenavState == 'pinned') {
            pinSidenav()
        }

        if(Cookies.get('sidenav-state') == 'unpinned') {
            unpinSidenav()
        }

        $(window).resize(function() {
            if( $('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
                $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
            }
        })
    }

    if($(window).width() < 1200){
      $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
      $('body').removeClass('g-sidenav-show');
      $(window).resize(function() {
          if( $('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
              $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
          }
      })
    }



    $("body").on("click", "[data-action]", function(e) {

        e.preventDefault();

        var $this = $(this);
        var action = $this.data('action');
        var target = $this.data('target');


        // Manage actions

        switch (action) {
            case 'sidenav-pin':
                pinSidenav();
            break;

            case 'sidenav-unpin':
                unpinSidenav();
            break;

            case 'search-show':
                target = $this.data('target');
                $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-showing');

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-showing').addClass('g-navbar-search-show');
                }, 150);

                setTimeout(function() {
                    $('body').addClass('g-navbar-search-shown');
                }, 300)
            break;

            case 'search-close':
                target = $this.data('target');
                $('body').removeClass('g-navbar-search-shown');

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-hiding');
                }, 150);

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-hiding').addClass('g-navbar-search-hidden');
                }, 300);

                setTimeout(function() {
                    $('body').removeClass('g-navbar-search-hidden');
                }, 500);
            break;
        }
    })


    // Add sidenav modifier classes on mouse events

    $('.sidenav').on('mouseenter', function() {
        if(! $('body').hasClass('g-sidenav-pinned')) {
            $('body').removeClass('g-sidenav-hide').removeClass('g-sidenav-hidden').addClass('g-sidenav-show');
        }
    })

    $('.sidenav').on('mouseleave', function() {
        if(! $('body').hasClass('g-sidenav-pinned')) {
            $('body').removeClass('g-sidenav-show').addClass('g-sidenav-hide');

            setTimeout(function() {
                $('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
            }, 300);
        }
    })


    // Make the body full screen size if it has not enough content inside
    $(window).on('load resize', function() {
        if($('body').height() < 800) {
            $('body').css('min-height', '100vh');
            $('#footer-main').addClass('footer-auto-bottom')
        }
    })

})();

//
// Charts
//

'use strict';

var Charts = (function() {

	// Variable

	var $toggle = $('[data-toggle="chart"]');
	var mode = 'light';//(themeMode) ? themeMode : 'light';
	var fonts = {
		base: 'Open Sans'
	}

	// Colors
	var colors = {
		gray: {
			100: '#f6f9fc',
			200: '#e9ecef',
			300: '#dee2e6',
			400: '#ced4da',
			500: '#adb5bd',
			600: '#8898aa',
			700: '#525f7f',
			800: '#32325d',
			900: '#212529'
		},
		theme: {
			'default': '#27a75d',
			'primary': '#5e72e4',
			'secondary': '#f4f5f7',
			'info': '#11cdef',
			'success': '#2dce89',
			'danger': '#f5365c',
			'warning': '#fb6340'
		},
		black: '#12263F',
		white: '#FFFFFF',
		transparent: 'transparent',
	};


	// Methods

	// Chart.js global options
	function chartOptions() {

		// Options
		var options = {
			defaults: {
				global: {
					responsive: true,
					maintainAspectRatio: false,
					defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontFamily: fonts.base,
					defaultFontSize: 13,
					layout: {
						padding: 0
					},
					legend: {
						display: false,
						position: 'bottom',
						labels: {
							usePointStyle: true,
							padding: 16
						}
					},
					elements: {
						point: {
							radius: 0,
							backgroundColor: colors.theme['primary']
						},
						line: {
							tension: .4,
							borderWidth: 4,
							borderColor: colors.theme['primary'],
							backgroundColor: colors.transparent,
							borderCapStyle: 'rounded'
						},
						rectangle: {
							backgroundColor: colors.theme['warning']
						},
						arc: {
							backgroundColor: colors.theme['primary'],
							borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
							borderWidth: 4
						}
					},
					tooltips: {
						enabled: true,
						mode: 'index',
						intersect: false,
					}
				},
				doughnut: {
					cutoutPercentage: 83,
					legendCallback: function(chart) {
						var data = chart.data;
						var content = '';

						data.labels.forEach(function(label, index) {
							var bgColor = data.datasets[0].backgroundColor[index];

							content += '<span class="chart-legend-item">';
							content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
							content += label;
							content += '</span>';
						});

						return content;
					}
				}
			}
		}

		// yAxes
		Chart.scaleService.updateScaleDefaults('linear', {
			gridLines: {
				borderDash: [2],
				borderDashOffset: [2],
				color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
				drawBorder: false,
				drawTicks: false,
				drawOnChartArea: true,
				zeroLineWidth: 0,
				zeroLineColor: 'rgba(0,0,0,0)',
				zeroLineBorderDash: [2],
				zeroLineBorderDashOffset: [2]
			},
			ticks: {
				beginAtZero: true,
				padding: 10,
				callback: function(value) {
					if (!(value % 10)) {
						return value
					}
				}
			}
		});

		// xAxes
		Chart.scaleService.updateScaleDefaults('category', {
			gridLines: {
				drawBorder: false,
				drawOnChartArea: false,
				drawTicks: false
			},
			ticks: {
				padding: 20
			},
			maxBarThickness: 10
		});

		return options;

	}

	// Parse global options
	function parseOptions(parent, options) {
		for (var item in options) {
			if (typeof options[item] !== 'object') {
				parent[item] = options[item];
			} else {
				parseOptions(parent[item], options[item]);
			}
		}
	}

	// Push options
	function pushOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].push(data);
				});
			} else {
				pushOptions(parent[item], options[item]);
			}
		}
	}

	// Pop options
	function popOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function(data) {
					parent[item].pop();
				});
			} else {
				popOptions(parent[item], options[item]);
			}
		}
	}

	// Toggle options
	function toggleOptions(elem) {
		var options = elem.data('add');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		if (elem.is(':checked')) {

			// Add options
			pushOptions($chart, options);

			// Update chart
			$chart.update();
		} else {

			// Remove options
			popOptions($chart, options);

			// Update chart
			$chart.update();
		}
	}

	// Update options
	function updateOptions(elem) {
		var options = elem.data('update');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		// Parse options
		parseOptions($chart, options);

		// Toggle ticks
		toggleTicks(elem, $chart);

		// Update chart
		$chart.update();
	}

	// Toggle ticks
	function toggleTicks(elem, $chart) {

		if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
			var prefix = elem.data('prefix') ? elem.data('prefix') : '';
			var suffix = elem.data('suffix') ? elem.data('suffix') : '';

			// Update ticks
			$chart.options.scales.yAxes[0].ticks.callback = function(value) {
				if (!(value % 10)) {
					return prefix + value + suffix;
				}
			}

			// Update tooltips
			$chart.options.tooltips.callbacks.label = function(item, data) {
				var label = data.datasets[item.datasetIndex].label || '';
				var yLabel = item.yLabel;
				var content = '';

				if (data.datasets.length > 1) {
					content += '<span class="popover-body-label mr-auto">' + label + '</span>';
				}

				content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
				return content;
			}

		}
	}


	// Events

	// Parse global options
	if (window.Chart) {
		parseOptions(Chart, chartOptions());
	}

	// Toggle options
	$toggle.on({
		'change': function() {
			var $this = $(this);

			if ($this.is('[data-add]')) {
				toggleOptions($this);
			}
		},
		'click': function() {
			var $this = $(this);

			if ($this.is('[data-update]')) {
				updateOptions($this);
			}
		}
	});


	// Return

	return {
		colors: colors,
		fonts: fonts,
		mode: mode
	};

})();

//
// Icon code copy/paste
//

'use strict';

var CopyIcon = (function() {

	// Variables

	var $element = '.btn-icon-clipboard',
		$btn = $($element);


	// Methods

	function init($this) {
		$this.tooltip().on('mouseleave', function() {
			// Explicitly hide tooltip, since after clicking it remains
			// focused (as it's a button), so tooltip would otherwise
			// remain visible until focus is moved away
			$this.tooltip('hide');
		});

		var clipboard = new ClipboardJS($element);

		clipboard.on('success', function(e) {
			$(e.trigger)
				.attr('title', 'Copied!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')

			e.clearSelection()
		});
	}


	// Events
	if ($btn.length) {
		init($btn);
	}

})();

//
// Navbar
//

'use strict';

var Navbar = (function() {

	// Variables

	var $nav = $('.navbar-nav, .navbar-nav .nav');
	var $collapse = $('.navbar .collapse');
	var $dropdown = $('.navbar .dropdown');

	// Methods

	function accordion($this) {
		$this.closest($nav).find($collapse).not($this).collapse('hide');
	}

    function closeDropdown($this) {
        var $dropdownMenu = $this.find('.dropdown-menu');

        $dropdownMenu.addClass('close');

    	setTimeout(function() {
    		$dropdownMenu.removeClass('close');
    	}, 200);
	}


	// Events

	$collapse.on({
		'show.bs.collapse': function() {
			accordion($(this));
		}
	})

	$dropdown.on({
		'hide.bs.dropdown': function() {
			closeDropdown($(this));
		}
	})

})();


//
// Navbar collapse
//


var NavbarCollapse = (function() {

	// Variables

	var $nav = $('.navbar-nav'),
		$collapse = $('.navbar .navbar-custom-collapse');


	// Methods

	function hideNavbarCollapse($this) {
		$this.addClass('collapsing-out');
	}

	function hiddenNavbarCollapse($this) {
		$this.removeClass('collapsing-out');
	}


	// Events

	if ($collapse.length) {
		$collapse.on({
			'hide.bs.collapse': function() {
				hideNavbarCollapse($collapse);
			}
		})

		$collapse.on({
			'hidden.bs.collapse': function() {
				hiddenNavbarCollapse($collapse);
			}
		})
	}

	var navbar_menu_visible = 0;

	$( ".sidenav-toggler" ).click(function() {
		if(navbar_menu_visible == 1){
		  $('body').removeClass('nav-open');
			navbar_menu_visible = 0;
			$('.bodyClick').remove();

		} else {

		var div = '<div class="bodyClick"></div>';
		$(div).appendTo('body').click(function() {
				 $('body').removeClass('nav-open');
					navbar_menu_visible = 0;
					$('.bodyClick').remove();
					
			 });

		 $('body').addClass('nav-open');
			navbar_menu_visible = 1;

		}

	});

})();

//
// Popover
//

'use strict';

var Popover = (function() {

	// Variables

	var $popover = $('[data-toggle="popover"]'),
		$popoverClass = '';


	// Methods

	function init($this) {
		if ($this.data('color')) {
			$popoverClass = 'popover-' + $this.data('color');
		}

		var options = {
			trigger: 'focus',
			template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		};

		$this.popover(options);
	}


	// Events

	if ($popover.length) {
		$popover.each(function() {
			init($(this));
		});
	}

})();

//
// Scroll to (anchor links)
//

'use strict';

var ScrollTo = (function() {

	//
	// Variables
	//

	var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a');


	//
	// Methods
	//

	function scrollTo($this) {
		var $el = $this.attr('href');
        var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
		var options = {
			scrollTop: $($el).offset().top - offset
		};

        // Animate scroll to the selected section
        $('html, body').stop(true, true).animate(options, 600);

        event.preventDefault();
	}


	//
	// Events
	//

	if ($scrollTo.length) {
		$scrollTo.on('click', function(event) {
			scrollTo($(this));
		});
	}

})();

//
// Tooltip
//

'use strict';

var Tooltip = (function() {

	// Variables

	var $tooltip = $('[data-toggle="tooltip"]');


	// Methods

	function init() {
		$tooltip.tooltip();
	}


	// Events

	if ($tooltip.length) {
		init();
	}

})();

//
// Form control
//

'use strict';

var FormControl = (function() {

	// Variables

	var $input = $('.form-control');


	// Methods

	function init($this) {
		$this.on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus'));
    }).trigger('blur');
	}


	// Events

	if ($input.length) {
		init($input);
	}

})();

//
// Google maps
//

var $map = $('#map-default'),
    map,
    lat,
    lng,
    color = "#5e72e4";

function initMap() {

    map = document.getElementById('map-default');
    lat = map.getAttribute('data-lat');
    lng = map.getAttribute('data-lng');

    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 12,
        scrollwheel: false,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
    }

    map = new google.maps.Map(map, mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'Hello World!'
    });

    var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
        '<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
    });
}

if($map.length) {
    google.maps.event.addDomListener(window, 'load', initMap);
}
//
// Doughnut Dashboard chart (1)
//
if(document.getElementById('pageName').value == 'mainPage'){
var DoughnutChart = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-doughnut-dashboard');
	var projects1 = document.getElementById('projects1').value;
	var projects2 = document.getElementById('projects2').value;
	var projects3 = document.getElementById('projects3').value;
	var projects4 = document.getElementById('projects4').value;
	var projects5 = document.getElementById('projects5').value;
	var projects6 = document.getElementById('projects6').value;
	var projects7 = document.getElementById('projects7').value;
	var projects8 = document.getElementById('projects8').value;

	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'doughnut',
			data: {
				labels: ['طلب جديد','استلام الطلب' ,'معماري الدور الارضي', 'معماري الدور الأول', 'معماري السطح','واجهات خارجية', 'الانشائي','كهرباء وسباكة'],
				datasets: [{
					label: 'طلبات المخططات',
					data: [projects1, projects2, projects3, projects4, projects5,projects6, projects7,projects8],
					backgroundColor: [
						'#def4fa',
						'#b36536',
						'#f1fd2b',
						'#055ba3',
						'#fec501',
						'#47af75',
						'#2c2c2c',
						'#47af75',
					  ],
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
//************************************************************* */

'use strict';



//
// Layout
//
var DoughnutChart2 = (function() {
	
	//
	// Variables
	//

	var $chart = $('#chart-licensesStatusMain-dashboard');
	var l_status_completed = document.getElementById('l_status_completed').value;
	var l_status_underproccess = document.getElementById('l_status_underproccess').value;
	var l_status_stopped = document.getElementById('l_status_stopped').value;
	//alert(p_stopped);
	//
	// Methods
	//

	// Init chart
	function initChart($chart) {
		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'horizontalBar',
			data: {
				labels: ['مكتملة', 'تحت الاجراء', 'متوقفة'],
				datasets: [{
					label: 'حالة المخططات',
					data: [l_status_completed,l_status_underproccess,l_status_stopped],
					backgroundColor: [
						'#2dce89',
						'#ffd600',
						'#f5365c',
					  ],
				}]
			}
			
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();


'use strict';

//******************************************************************* */
//
	for (let i = 1; i <= document.getElementById('stages').value; i++){
		var DoughnutChart2 = (function() {

			//
			// Variables
			//
		
			var $chart = $('#chart-doughnut-dashboard'+i);
			var projects = document.getElementById('projects').value;
			var project = document.getElementById('projects'+i).value;
			var stage_name = document.getElementById('projects'+i).getAttribute('data-name');
			var stage_color = document.getElementById('projects'+i).getAttribute('data-color');
			//alert(p_stopped);
			//
			// Methods
			//
		
			// Init chart
			function initChart($chart) {
				// Create chart
				var doughnutChart = new Chart($chart, {
					type: 'doughnut',
					data: {
						labels: ['اخرى',stage_name],
						datasets: [{
							label: stage_name,
							data: [projects-project,project],
							backgroundColor: [
								'#dfe0e0',
								stage_color,
							  ],
						}]
					}
					
				});
		
				// Save to jQuery object
				$chart.data('chart', doughnutChart);
			}
		
		
			// Init chart
			if ($chart.length) {
				initChart($chart);
			}
		
		})();
		'use strict';
	}
// Dounught Dashboard chart (2)
//

//
// Dounught Dashboard chart (2)
//
var DoughnutChart2 = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-doughnut2-dashboard');
	var p_completed = document.getElementById('p_completed').value;
	var p_underproccess = document.getElementById('p_underproccess').value;
	var p_stopped = document.getElementById('p_stopped').value;
	//alert(p_stopped);
	//
	// Methods
	//

	// Init chart
	function initChart($chart) {
		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'doughnut',
			data: {
				labels: ['مكتملة', 'تحت الاجراء', 'متوقفة'],
				datasets: [{
					label: 'حالة المخططات',
					data: [p_completed,p_underproccess,p_stopped],
					backgroundColor: [
						'#52c86e',
						'#ffd600',
						'#e04c56',
					  ],
				}]
			}
			
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
'use strict';

for (let x = 1; x <= document.getElementById('ltypes').value; x++){
var BarsChart = (function() {

	//
	// Variables
	//
	
	var $chart = $('#chart-bars-dashboard'+x);
	const licenses = [];
	const labels = [];
	const colors = [];
	for (let i = 1; i <= document.getElementById('license_stages'+x).value; i++){
	licenses[i-1]= document.getElementById('licenses'+x+i).value;
	labels[i-1] = document.getElementById('licenses'+x+i).getAttribute('data-name');
	colors[i-1] = document.getElementById('licenses'+x+i).getAttribute('data-color');
	}

	
	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'horizontalBar',
			data: {
				labels: labels,
				datasets: [{
					label: 'طلبات الرخص',
					data: licenses,
					backgroundColor: colors,
					position: 'right'
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', ordersChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
}
}
'use strict';

//
// Sales chart
//

var SalesChart = (function() {

  // Variables

  var $chart = $('#chart-sales-dark');


  // Methods

  function init($chart) {

    var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return '$' + value + 'k';
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += '<span class="popover-body-label mr-auto">' + label + '</span>';
              }

              content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
              return content;
            }
          }
        }
      },
      data: {
        labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Performance',
          data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
        }]
      }
    });

    // Save to jQuery object

    $chart.data('chart', salesChart);

  };


  // Events

  if ($chart.length) {
    init($chart);
  }

})();

//
// Bootstrap Datepicker
//

'use strict';

var Datepicker = (function() {

	// Variables

	var $datepicker = $('.datepicker');


	// Methods

	function init($this) {
		var options = {
			disableTouchKeyboard: true,
			autoclose: false
		};

		$this.datepicker(options);
	}


	// Events

	if ($datepicker.length) {
		$datepicker.each(function() {
			init($(this));
		});
	}

})();

//
// Form control
//

'use strict';

var noUiSlider = (function() {

	// Variables

	// var $sliderContainer = $('.input-slider-container'),
	// 		$slider = $('.input-slider'),
	// 		$sliderId = $slider.attr('id'),
	// 		$sliderMinValue = $slider.data('range-value-min');
	// 		$sliderMaxValue = $slider.data('range-value-max');;


	// // Methods
	//
	// function init($this) {
	// 	$this.on('focus blur', function(e) {
  //       $this.parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
  //   }).trigger('blur');
	// }
	//
	//
	// // Events
	//
	// if ($input.length) {
	// 	init($input);
	// }



	if ($(".input-slider-container")[0]) {
			$('.input-slider-container').each(function() {

					var slider = $(this).find('.input-slider');
					var sliderId = slider.attr('id');
					var minValue = slider.data('range-value-min');
					var maxValue = slider.data('range-value-max');

					var sliderValue = $(this).find('.range-slider-value');
					var sliderValueId = sliderValue.attr('id');
					var startValue = sliderValue.data('range-value-low');

					var c = document.getElementById(sliderId),
							d = document.getElementById(sliderValueId);

					noUiSlider.create(c, {
							start: [parseInt(startValue)],
							connect: [true, false],
							//step: 1000,
							range: {
									'min': [parseInt(minValue)],
									'max': [parseInt(maxValue)]
							}
					});

					c.noUiSlider.on('update', function(a, b) {
							d.textContent = a[b];
					});
			})
	}

	if ($("#input-slider-range")[0]) {
			var c = document.getElementById("input-slider-range"),
					d = document.getElementById("input-slider-range-value-low"),
					e = document.getElementById("input-slider-range-value-high"),
					f = [d, e];

			noUiSlider.create(c, {
					start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
					connect: !0,
					range: {
							min: parseInt(c.getAttribute('data-range-value-min')),
							max: parseInt(c.getAttribute('data-range-value-max'))
					}
			}), c.noUiSlider.on("update", function(a, b) {
					f[b].textContent = a[b]
			})
	}

})();

//
// Scrollbar
//

'use strict';

var Scrollbar = (function() {

	// Variables

	var $scrollbar = $('.scrollbar-inner');


	// Methods

	function init() {
		$scrollbar.scrollbar().scrollLock()
	}


	// Events

	if ($scrollbar.length) {
		init();
	}

})();
//******************************************************** */
//******************************************************** */
//********************** Projects Report ***************** */
/********************************************************* */
/********************************************************* */
// Doughnut Dashboard chart (1)
//
if(document.getElementById('pageName').value == 'projectsPage'){
var DoughnutChart = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-projects-users-dashboard');
	const projects = [];
	const labels = [];
	const colors = [];
	for (let i = 1; i <= document.getElementById('stages').value; i++){
	projects[i-1]= document.getElementById('projectsStage'+i).value;
	labels[i-1] = document.getElementById('projectsStage'+i).getAttribute('data-name');
	colors[i-1] = document.getElementById('projectsStage'+i).getAttribute('data-color');
	}

	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'horizontalBar',
			data: {
				labels: labels,
				datasets: [{
					label: 'طلبات المخططات',
					data: projects,
					backgroundColor: colors,
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
//************************************************************* */
var DoughnutChart = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-projects-dashboard');
	const projects = [];
	const labels = [];
	const colors = [];
	for (let i = 1; i <= document.getElementById('stages').value; i++){
	projects[i-1]= document.getElementById('projectsStage'+i).value;
	labels[i-1] = document.getElementById('projectsStage'+i).getAttribute('data-name');
	colors[i-1] = document.getElementById('projectsStage'+i).getAttribute('data-color');
	}

	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [{
					label: 'طلبات المخططات',
					data: projects,
					backgroundColor: colors,
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();
//************************************************************* */
//
// Dounught Dashboard chart (2)
//
var DoughnutChart2 = (function() {

	//
	// Variables
	//

	var $chart = $('#chart-projectsStatus-dashboard');
	var p_status_completed = document.getElementById('p_status_completed').value;
	var p_status_underproccess = document.getElementById('p_status_underproccess').value;
	var p_status_stopped = document.getElementById('p_status_stopped').value;
	//alert(p_stopped);
	//
	// Methods
	//

	// Init chart
	function initChart($chart) {
		// Create chart
		var doughnutChart = new Chart($chart, {
			type: 'doughnut',
			data: {
				labels: ['مكتملة', 'تحت الاجراء', 'متوقفة'],
				datasets: [{
					label: 'حالة المخططات',
					data: [p_status_completed,p_status_underproccess,p_status_stopped],
					backgroundColor: [
						'#2dce89',
						'#ffd600',
						'#f5365c',
					  ],
				}]
			}
			
		});

		// Save to jQuery object
		$chart.data('chart', doughnutChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();


'use strict';
}
//******************************************************** */
//******************************************************** */
//********************** Licenses Report ***************** */
/********************************************************* */
/********************************************************* */
// Doughnut Dashboard chart (1)
//
if(document.getElementById('pageName').value == 'licensesPage'){
	for (let x = 1; x <= document.getElementById('ltypes').value; x++){
	var DoughnutChart = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-licenses-dashboard'+x);
		const licenses = [];
		const labels = [];
		const colors = [];
		for (let i = 1; i <= document.getElementById('license_stages'+x).value; i++){
		licenses[i-1]= document.getElementById('licenses'+x+i).value;
		labels[i-1] = document.getElementById('licenses'+x+i).getAttribute('data-name');
		colors[i-1] = document.getElementById('licenses'+x+i).getAttribute('data-color');
		}
	
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
	
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: 'طلبات الرخص',
						data: licenses,
						backgroundColor: colors,
					}]
				}
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
}
	//************************************************************* */
	
	//
	// Dounught Dashboard chart (2)
	//
	var DoughnutChart2 = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-licensesStatus-dashboard');
		var l_status_completed = document.getElementById('l_status_completed').value;
		var l_status_underproccess = document.getElementById('l_status_underproccess').value;
		var l_status_stopped = document.getElementById('l_status_stopped').value;
		//alert(p_stopped);
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'doughnut',
				data: {
					labels: ['مكتملة', 'تحت الاجراء', 'متوقفة'],
					datasets: [{
						label: 'حالة المخططات',
						data: [l_status_completed,l_status_underproccess,l_status_stopped],
						backgroundColor: [
							'#2dce89',
							'#ffd600',
							'#f5365c',
						  ],
					}]
				}
				
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
	
	
	'use strict';
	}






	//******************************************************** */
//******************************************************** */
//********************** Projects Report ***************** */
/********************************************************* */
/********************************************************* */
// Doughnut Dashboard chart (1)
//
if(document.getElementById('pageName').value == 'changesPage'){
	var DoughnutChart = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-changes-dashboard');
		const projects = [];
		const labels = [];
		const colors = [];
		for (let i = 1; i <= document.getElementById('stages').value; i++){
		projects[i-1]= document.getElementById('changesStage'+i).value;
		labels[i-1] = document.getElementById('changesStage'+i).getAttribute('data-name');
		colors[i-1] = document.getElementById('changesStage'+i).getAttribute('data-color');
		}
		
	
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
	
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: 'تعديلات المخططات',
						data: projects,
						backgroundColor: colors,
					}]
				}
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
	//************************************************************* */
	
	//
	// Dounught Dashboard chart (2)
	//
	var DoughnutChart2 = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-changesStatus-dashboard');
		var p_status_completed = document.getElementById('p_status_completed').value;
		var p_status_underproccess = document.getElementById('p_status_underproccess').value;
		//alert(p_stopped);
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'doughnut',
				data: {
					labels: ['مكتملة', 'تحت الاجراء'],
					datasets: [{
						label: 'حالة التعديلات',
						data: [p_status_completed,p_status_underproccess],
						backgroundColor: [
							'#2dce89',
							'#ffd600',
						  ],
					}]
				}
				
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
	
	
	'use strict';
	}

//******************************************************** */
//******************************************************** */
//********************** Visits Report ***************** */
/********************************************************* */
/********************************************************* */
// Doughnut Dashboard chart (1)
//
if(document.getElementById('pageName').value == 'visitsPage'){
	var DoughnutChart = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-visits-dashboard');
		if(document.getElementById('visitsCustomer1')){
			var visitsCustomer1 = document.getElementById('visitsCustomer1').value;
			var visitsCustomerName1 = document.getElementById('visitsCustomerName1').value;
		}
		
		if(document.getElementById('visitsCustomer2')){
			var visitsCustomer2 = document.getElementById('visitsCustomer2').value;
			var visitsCustomerName2 = document.getElementById('visitsCustomerName2').value;
		}
		
		if(document.getElementById('visitsCustomer3')){
			var visitsCustomer3 = document.getElementById('visitsCustomer3').value;
			var visitsCustomerName3 = document.getElementById('visitsCustomerName3').value;
		}
		
		if(document.getElementById('visitsCustomer4')){
			var visitsCustomer4 = document.getElementById('visitsCustomer4').value;
			var visitsCustomerName4 = document.getElementById('visitsCustomerName4').value;
		}
		
		if(document.getElementById('visitsCustomer5')){
			var visitsCustomer5 = document.getElementById('visitsCustomer5').value;
			var visitsCustomerName5 = document.getElementById('visitsCustomerName5').value;
		}
		
	
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
	
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'bar',
				data: {
					labels: [visitsCustomerName1,visitsCustomerName2,visitsCustomerName3,visitsCustomerName4,visitsCustomerName5],
					datasets: [{
						label: 'زيارات العملاء',
						data: [visitsCustomer1, visitsCustomer2, visitsCustomer3, visitsCustomer4, visitsCustomer5],
						backgroundColor: [
							'#e5f8fc',
							'#b36536',
							'#fdee00',
							'#0966a8',
							'#fb920a',
						  ],
					}]
				}
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
	//************************************************************* */
	var DoughnutChart2 = (function() {
	
		//
		// Variables
		//
	
		var $chart = $('#chart-visitsTime-dashboard');
		if(document.getElementById('t_visitsCustomer1')){
			var t_visitsCustomer1 = document.getElementById('t_visitsCustomer1').value;
			var t_visitsCustomerName1 = document.getElementById('t_visitsCustomerName1').value;
		}
		
		if(document.getElementById('t_visitsCustomer2')){
			var t_visitsCustomer2 = document.getElementById('t_visitsCustomer2').value;
			var t_visitsCustomerName2 = document.getElementById('t_visitsCustomerName2').value;
		}
		
		if(document.getElementById('t_visitsCustomer3')){
			var t_visitsCustomer3 = document.getElementById('t_visitsCustomer3').value;
			var t_visitsCustomerName3 = document.getElementById('t_visitsCustomerName3').value;
		}
		
		if(document.getElementById('t_visitsCustomer4')){
			var t_visitsCustomer4 = document.getElementById('t_visitsCustomer4').value;
			var t_visitsCustomerName4 = document.getElementById('t_visitsCustomerName4').value;
		}
		
		if(document.getElementById('t_visitsCustomer5')){
			var t_visitsCustomer5 = document.getElementById('t_visitsCustomer5').value;
			var t_visitsCustomerName5 = document.getElementById('t_visitsCustomerName5').value;
		}
		
	
		//
		// Methods
		//
	
		// Init chart
		function initChart($chart) {
	
			// Create chart
			var doughnutChart = new Chart($chart, {
				type: 'bar',
				data: {
					labels: [t_visitsCustomerName1,t_visitsCustomerName2,t_visitsCustomerName3,t_visitsCustomerName4,t_visitsCustomerName5],
					datasets: [{
						label: 'مدة الزيارات',
						data: [t_visitsCustomer1, t_visitsCustomer2, t_visitsCustomer3, t_visitsCustomer4, t_visitsCustomer5],
						backgroundColor: [
							'#0966a8',
							'#0966a8',
							'#0966a8',
							'#0966a8',
							'#0966a8',
						  ],
					}]
				}
			});
	
			// Save to jQuery object
			$chart.data('chart', doughnutChart);
		}
	
	
		// Init chart
		if ($chart.length) {
			initChart($chart);
		}
	
	})();
	}