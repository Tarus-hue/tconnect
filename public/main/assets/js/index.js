$(document).ready(function(){

        /* Vector Map */
    $('#world').vectorMap({
        zoomOnScroll: false,
        map: 'world_mill',
        markers: [
            {latLng: [0.5167, 35.2833], name: 'Eldoret'},
            {latLng: [-1.2864, 36.8172], name: 'Nairobi'}, 
            {latLng: [0.2000, 35.1000], name: 'Kapsabet'},
            {latLng: [-0.2833, 36.0667], name: 'Nakuru'}, 
            {latLng: [-0.3692, 35.2839], name: 'Kericho'},
            {latLng: [1.0167, 35.0000], name: 'Kitale'},
            {latLng: [0.6703, 35.5081], name: 'Iten'},
            {latLng: [0.4919, 35.7430], name: 'Kabarnet'},
            {latLng: [0.5666, 34.5666], name: 'Bungoma'},
            {latLng: [-1.0396, 37.0900], name: 'Thika'},
            {latLng: [0.0167, 37.0667], name: 'Nanyuki'},
            {latLng: [-0.6796, 35.1200], name: 'Sotik'},
        ],
        normalizeFunction: 'polynomial',
        backgroundColor: 'transparent',
        regionsSelectable: true,
        markersSelectable: true,
        regionStyle: {
            initial: {
                fill: 'rgba(0,0,0,0.15)'
            },
            hover: {
                fill: 'rgba(0,0,0,0.15)',
            stroke: '#fff'
            },
        },
        markerStyle: {
            initial: {
                fill: '#43b968',
                stroke: '#fff'
            },
            hover: {
                fill: '#3e70c9',
                stroke: '#fff'
            }
        },
        series: {
            markers: [{
                attribute: 'fill',
                scale: ['#43b968','#a567e2', '#f44236'],
                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
            },{
                attribute: 'r',
                scale: [5, 15],
                values: [200, 300, 600, 1000, 150, 250, 450, 500, 800, 900, 750, 650]
            }]
        }
    });
    
    /* Sparkline Chart */
    $('#sparkline1').sparkline([0, 16, 30, 70, 30, 40, 67, 23, 44], {
        type: 'line',
        width: '60',
        height: '20',
        chartRangeMax: 50,
        lineColor: '#999',
        spotRadius: 2,
        fillColor: 'transparent',
        highlightLineColor: 'rgba(0,0,0,0.1)',
        highlightSpotColor: 'rgba(0,0,0,0.1)'
    });

    /* Main Chart */
    var data1 = [[1, 10], [2, 20], [3, 12], [4, 28], [5, 15], [6, 30], [7, 20], [8, 35], [9, 25], [10, 35]];
    var data2 = [[1, 8], [2, 15], [3, 10], [4, 18], [5, 8], [6, 25], [7, 15], [8, 28], [9, 17], [10, 30]];
    var data3 = [[1, 3], [2, 8], [3, 4], [4, 9], [5, 5], [6, 10], [7, 7], [8, 16], [9, 9], [10, 20]];

    var labels = ["Visits", "Page views", "Sales"];
    var colors = [
        '#20b9ae',
        tinycolor('#20b9ae').darken(4).toString(),
        tinycolor('#20b9ae').darken(8).toString()
    ];

    $.plot($("#main-chart"), [{
        data : data1,
        label : labels[0],
        color : colors[0]
    }, {
        data : data2,
        label : labels[1],
        color : colors[1]
    }, {
        data : data3,
        label : labels[2],
        color : colors[2]
    }], {
        series : {
            lines : {
                show : true,
                fill : true,
                lineWidth : 3,
                fillColor : {
                    colors : [{
                        opacity : 1
                    }, {
                        opacity : 1
                    }]
                }
            },
            points : {
                show : true,
                radius: 0
            },
            shadowSize : 0,
            curvedLines: {
                apply: true,
                active: true,
                monotonicFit: true
            }
        },
        grid : {
            labelMargin: 10,
            color: "#aaa",
            hoverable : true,
            borderWidth : 0,
            backgroundColor : "#fff",
        },
        legend : {
            position : "ne",
            margin : [0, -40],
            noColumns : 0,
            labelBoxBorderColor : null,
            labelFormatter : function(label, series) {
                // adding space to labes
                return '' + label + '&nbsp;&nbsp;';
            }
        },
        tooltip : true,
        tooltipOpts : {
            content : '%s: %y',
            shifts : {
                x : -60,
                y : 25
            },
            defaultTheme : false
        }
    });

    /* Morris Chart */
    Morris.Donut({
        element: 'donut',
        data: [{
            label: "Development",
            value: 34,

        }, {
            label: "SEO",
            value: 67
        }, {
            label: "Mobile apps",
            value: 45
        }],
        resize: true,
        colors:['#43b968', '#f59345', '#f44236']
    });



});