//Movable Div Temperature Graph
function InitDivTempGraph(tmedia_data,tmax_data,tmin_data) {
	var tmedia = [];
	var tmax = [];
	var tmin = [];

	for (var i = (tmedia_data.Data.length -30); i < tmedia_data.Data.length; i++){
	  	tmedia.push(parseFloat(tmedia_data.Data[i]));
		tmax.push(parseFloat(tmax_data.Data[i]));
		tmin.push(parseFloat(tmin_data.Data[i]));

	}
	
        Tempchart = new Highcharts.Chart({
			chart: {
					renderTo: 'Temp_Graph',
					plotBorderWidth: 1,
					defaultSeriesType: 'spline',
					inverted: false,
					margin: [15, 10, 50, 90],
					zoomType: 'xy',
					borderWidth: 1
				},
		title: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		subtitle: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function() {
                        return this.value +'°'
                    }
                }

            },
		xAxis: {
                title: {
                    text: 'last 30 days temperatures'
                },
                labels: {
                    enabled: false
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
             series: [{
                name: 'T Media',
                data: tmedia
	         },{
                name: 'T MaX',
                data: tmax
	         },{
                name: 'T MIN',
                data: tmin
	         }
	     		]
        });
   
    }
	
//Movable Div Wind Graph
function InitDivWindGraph(wmedia_data,wmax_data) {
	var wmedia = [];
	var wmax = [];

	for (var i = (wmedia_data.Data.length -30); i < wmedia_data.Data.length; i++){
	  	wmedia.push(parseFloat(wmedia_data.Data[i]));
		wmax.push(parseFloat(wmax_data.Data[i]));	
	}

$('#Wind_Graph').highcharts({
            chart: {
                type: 'spline'
            },
		title: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		subtitle: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		xAxis: {
                title: {
                    text: 'last 30 days wind speed'
                },
                labels: {
                    enabled: false
                }
            },
            yAxis: {
                title: {
                    text: 'Wind speed (km/h)'
                },
                min: 0,
                minorGridLineWidth: 0,
                gridLineWidth: 0,
                alternateGridColor: null,
                plotBands: [{ // Light air
                    from: 0.0,
                    to: 5.5,
                    color: 'rgba(68, 170, 213, 0.1)',
                    label: {
                        text: 'Light air',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Light breeze
                    from: 5.5,
                    to: 12.0,
                    color: 'rgba(0, 0, 0, 0)',
                    label: {
                        text: 'Light breeze',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Gentle breeze
                    from: 12.0,
                    to: 20.0,
                    color: 'rgba(68, 170, 213, 0.1)',
                    label: {
                        text: 'Gentle breeze',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Moderate breeze
                    from: 20.0,
                    to: 30.0,
                    color: 'rgba(0, 0, 0, 0)',
                    label: {
                        text: 'Moderate breeze',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Fresh breeze
                    from: 30.0,
                    to: 40.0,
                    color: 'rgba(68, 170, 213, 0.1)',
                    label: {
                        text: 'Fresh breeze',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // Strong breeze
                    from: 40.0,
                    to: 50.0,
                    color: 'rgba(0, 0, 0, 0)',
                    label: {
                        text: 'Strong breeze',
                        style: {
                            color: '#606060'
                        }
                    }
                }, { // High wind
                    from: 50.0,
                    to: 150.0,
                    color: 'rgba(68, 170, 213, 0.1)',
                    label: {
                        text: 'High wind',
                        style: {
                            color: '#606060'
                        }
                    }
                }]
            },
            plotOptions: {
                spline: {
                    lineWidth: 4,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                    },
                    marker: {
                        enabled: false
                    },
                    pointInterval: 3600000, // one hour
                    pointStart: Date.UTC(2009, 9, 6, 0, 0, 0)
                }
            },
            series: [{
                name: 'Average Speed',
                data: wmedia
    
            }, {
                name: 'Max Speed',
                data: wmax 
            }]
            ,
            navigation: {
                menuItemStyle: {
                    fontSize: '10px'
                }
            }
        });
}

//Movable Div Rain Graph
function InitDivRainGraph(rainday_data) {
	var rainday= [];
	for (var i = (rainday_data.Data.length -30); i < rainday_data.Data.length; i++){
	  	rainday.push(parseFloat(rainday_data.Data[i]));
	}
	$('#Rain_Graph').highcharts({
		chart: {
		    type: 'column'
		},
		title: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		subtitle: {
		    text: '',
		    style: {
			display: 'none'
		    }
		},
		xAxis: {
                title: {
                    text: 'last 30 days rain'
                },
                labels: {
                    enabled: false
                }
	        },
		yAxis: {
		    min: 0,
		    title: {
			text: 'Rain (mm)'
		    }
		},
		legend: {
		    enabled: false
		},
		tooltip: {
		    pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
		},
		series: [{
		    name: 'Population',
		    data: rainday
		}]
    });
}
