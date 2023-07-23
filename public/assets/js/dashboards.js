/**
 * Dashboard CRM
 */

"use strict";

(function () {
    let cardColor,
        headingColor,
        labelColor,
        legendColor,
        shadeColor,
        borderColor,
        heatMap1,
        heatMap2,
        heatMap3,
        heatMap4;

    if (isDarkStyle) {
        cardColor = config.colors_dark.cardColor;
        headingColor = config.colors_dark.headingColor;
        labelColor = config.colors_dark.textMuted;
        legendColor = config.colors_dark.bodyColor;
        borderColor = config.colors_dark.borderColor;
        shadeColor = "dark";
        heatMap1 = "#4f51c0";
        heatMap2 = "#595cd9";
        heatMap3 = "#8789ff";
        heatMap4 = "#c3c4ff";
    } else {
        cardColor = config.colors.white;
        headingColor = config.colors.headingColor;
        labelColor = config.colors.textMuted;
        legendColor = config.colors.bodyColor;
        borderColor = config.colors.borderColor;
        shadeColor = "";
        heatMap1 = "#e1e2ff";
        heatMap2 = "#c3c4ff";
        heatMap3 = "#a5a7ff";
        heatMap4 = "#696cff";
    }

    // Donut Chart Colors
    const chartColors = {
        donut: {
            series1: config.colors.success,
            series2: "rgba(113, 221, 55, 0.6)",
            series3: "rgba(113, 221, 55, 0.4)",
            series4: "rgba(113, 221, 55, 0.2)",
        },
    };

    // Radial bar chart functions
    function radialBarChart(color, value) {
        const radialBarChartOpt = {
            chart: {
                height: 55,
                width: 45,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: "25%",
                    },
                    dataLabels: {
                        show: false,
                    },
                    track: {
                        background: config.colors_label.secondary,
                    },
                },
            },
            colors: [color],
            grid: {
                padding: {
                    top: -15,
                    bottom: -15,
                    left: -5,
                    right: -15,
                },
            },
            series: [value],
            labels: ["Progress"],
        };
        return radialBarChartOpt;
    }

    // Sale Stats - Radial Bar Chart
    // --------------------------------------------------------------------
    var skor = document.querySelector("#salesStats").getAttribute("data-skor");
    var ref_series = skor * 20;
    var ref_labels = skor;
    const salesStatsEl = document.querySelector("#salesStats"),
        salesStatsOptions = {
            chart: {
                height: 280,
                type: "radialBar",
            },
            series: [ref_series],
            labels: [ref_labels],
            plotOptions: {
                radialBar: {
                    startAngle: 0,
                    endAngle: 360,
                    strokeWidth: "70",
                    hollow: {
                        margin: 50,
                        size: "75%",
                        imageWidth: 65,
                        imageHeight: 55,
                        imageOffsetY: -35,
                        imageClipped: false,
                    },
                    track: {
                        strokeWidth: "100%",
                        background: borderColor,
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: 20,
                            show: true,
                            color: headingColor,
                            fontSize: "42px",
                        },
                        value: {
                            formatter: function (val) {
                                return parseInt(val);
                            },
                            offsetY: 20,
                            color: headingColor,
                            fontSize: "32px",
                            show: false,
                        },
                    },
                },
            },
            fill: {
                type: "solid",
                colors: config.colors.success,
            },
            stroke: {
                lineCap: "round",
            },
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
                active: {
                    filter: {
                        type: "none",
                    },
                },
            },
        };
    if (typeof salesStatsEl !== undefined && salesStatsEl !== null) {
        const salesStats = new ApexCharts(salesStatsEl, salesStatsOptions);
        salesStats.render();
    }

    //Ringkasan Skor

    var skord1 = document.querySelector("#skordimensi").getAttribute("skord1");
    var skord2 = document.querySelector("#skordimensi").getAttribute("skord2");
    var skord3 = document.querySelector("#skordimensi").getAttribute("skord3");
    var skord4 = document.querySelector("#skordimensi").getAttribute("skord4");
    var skord5 = document.querySelector("#skordimensi").getAttribute("skord5");

    const totalRevenueChartEl = document.querySelector("#ringkasanskor"),
        totalRevenueChartOptions = {
            series: [
                {
                    name: [],
                    data: [skord1, skord2, skord3, skord4, skord5],
                },
            ],
            chart: {
                height: 350,
                stacked: true,
                type: "bar",
                toolbar: { show: true },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "33%",
                    borderRadius: 12,
                    startingShape: "rounded",
                    endingShape: "rounded",
                },
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 6,
                lineCap: "round",
                colors: [cardColor],
            },
            legend: {
                show: true,
                horizontalAlign: "left",
                position: "top",
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3,
                },
                labels: {
                    colors: legendColor,
                },
                itemMargin: {
                    horizontal: 10,
                },
            },
            grid: {
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20,
                },
            },
            xaxis: {
                categories: [
                    ["Budaya dan", "Kapabilitas Risiko"],
                    ["Organisasi dan", "Tata Kelola Risiko"],
                    ["Kerangka Risiko", "dan Kepatuhan"],
                    ["Proses dan", "Kontrol Risiko"],
                    ["Model, Data dan", "Teknologi Risiko"],
                ],
                labels: {
                    rotate: 0,
                    style: {
                        fontSize: "12px",
                        colors: labelColor,
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                tickAmount: 4,
                min: 1,
                max: 5,
                labels: {
                    style: {
                        fontSize: "13px",
                        colors: labelColor,
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "32%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "35%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "42%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "48%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "40%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1040,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 11,
                                columnWidth: "48%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "30%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 840,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "35%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "28%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 640,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "32%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "37%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "45%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 420,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "52%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 380,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "60%",
                            },
                        },
                    },
                },
            ],
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
                active: {
                    filter: {
                        type: "none",
                    },
                },
            },
        };
    if (
        typeof totalRevenueChartEl !== undefined &&
        totalRevenueChartEl !== null
    ) {
        const totalRevenueChart = new ApexCharts(
            totalRevenueChartEl,
            totalRevenueChartOptions
        );
        totalRevenueChart.render();
    }
})();
