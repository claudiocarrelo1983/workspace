<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\Event;


?>


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Task List</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                    <li class="breadcrumb-item active">Task List</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Upcoming</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td style="width: 40px;">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="upcomingtaskCheck01">
                                        <label class="form-check-label" for="upcomingtaskCheck01"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a Skote Dashboard UI</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-11">Waiting</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="upcomingtaskCheck02" checked="">
                                        <label class="form-check-label" for="upcomingtaskCheck02"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a New Landing UI</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-primary font-size-11">Approved</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="upcomingtaskCheck03">
                                        <label class="form-check-label" for="upcomingtaskCheck03"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a Skote Logo</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-warning text-white font-size-16">
                                                        R
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-secondary font-size-11">Waiting</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">In Progress</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td style="width: 40px;">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="inprogresstaskCheck01" checked="">
                                        <label class="form-check-label" for="inprogresstaskCheck01"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Complete</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="inprogresstaskCheck02">
                                        <label class="form-check-label" for="inprogresstaskCheck02"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a Blog Template UI</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                        A
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-11">Pending</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Completed</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td style="width: 40px;">
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="completedtaskCheck01">
                                        <label class="form-check-label" for="completedtaskCheck01"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                        K
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Complete</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="completedtaskCheck02" checked="">
                                        <label class="form-check-label" for="completedtaskCheck02"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Multipurpose Landing</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Complete</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check font-size-16">
                                        <input class="form-check-input" type="checkbox" id="completedtaskCheck03">
                                        <label class="form-check-label" for="completedtaskCheck03"></label>
                                    </div>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a Blog Template UI</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                        D
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-success font-size-11">Complete</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body" style="position: relative;">
                <h4 class="card-title mb-3">Tasks</h4>

                <div id="task-chart" class="apex-charts" dir="ltr" style="min-height: 295px;"><div id="apexcharts8rcdhw6e" class="apexcharts-canvas apexcharts8rcdhw6e apexcharts-theme-light" style="width: 479px; height: 280px;"><svg id="SvgjsSvg1001" width="479" height="280" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="479" height="280"><div class="apexcharts-legend apexcharts-align-center position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 140px;"><div class="apexcharts-legend-series" rel="1" seriesname="CompletexTasks" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(85, 110, 230) !important; color: rgb(85, 110, 230); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Complete%20Tasks" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Complete Tasks</span></div><div class="apexcharts-legend-series" rel="2" seriesname="AllxTasks" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(52, 195, 143) !important; color: rgb(52, 195, 143); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="All%20Tasks" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">All Tasks</span></div></div><style type="text/css">	

.apexcharts-legend {	
display: flex;	
overflow: auto;	
padding: 0 10px;	
}	
.apexcharts-legend.position-bottom, .apexcharts-legend.position-top {	
flex-wrap: wrap	
}	
.apexcharts-legend.position-right, .apexcharts-legend.position-left {	
flex-direction: column;	
bottom: 0;	
}	
.apexcharts-legend.position-bottom.apexcharts-align-left, .apexcharts-legend.position-top.apexcharts-align-left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {	
justify-content: flex-start;	
}	
.apexcharts-legend.position-bottom.apexcharts-align-center, .apexcharts-legend.position-top.apexcharts-align-center {	
justify-content: center;  	
}	
.apexcharts-legend.position-bottom.apexcharts-align-right, .apexcharts-legend.position-top.apexcharts-align-right {	
justify-content: flex-end;	
}	
.apexcharts-legend-series {	
cursor: pointer;	
line-height: normal;	
}	
.apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series{	
display: flex;	
align-items: center;	
}	
.apexcharts-legend-text {	
position: relative;	
font-size: 14px;	
}	
.apexcharts-legend-text *, .apexcharts-legend-marker * {	
pointer-events: none;	
}	
.apexcharts-legend-marker {	
position: relative;	
display: inline-block;	
cursor: pointer;	
margin-right: 3px;	
border-style: solid;
}	

.apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{	
display: inline-block;	
}	
.apexcharts-legend-series.apexcharts-no-click {	
cursor: auto;	
}	
.apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {	
display: none !important;	
}	
.apexcharts-inactive-legend {	
opacity: 0.45;	
}</style></foreignObject><g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(53.817734375, 30)"><defs id="SvgjsDefs1002"><clipPath id="gridRectMask8rcdhw6e"><rect id="SvgjsRect1009" width="427.444609375" height="198.348" x="-16.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask8rcdhw6e"><rect id="SvgjsRect1010" width="400.444609375" height="197.348" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><line id="SvgjsLine1008" x1="0" y1="0" x2="0" y2="193.348" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="193.348" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1030" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1031" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1033" font-family="Helvetica, Arial, sans-serif" x="0" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1034">Jan</tspan><title>Jan</title></text><text id="SvgjsText1036" font-family="Helvetica, Arial, sans-serif" x="39.6444609375" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1037">Feb</tspan><title>Feb</title></text><text id="SvgjsText1039" font-family="Helvetica, Arial, sans-serif" x="79.288921875" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1040">Mar</tspan><title>Mar</title></text><text id="SvgjsText1042" font-family="Helvetica, Arial, sans-serif" x="118.93338281250001" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1043">Apr</tspan><title>Apr</title></text><text id="SvgjsText1045" font-family="Helvetica, Arial, sans-serif" x="158.57784375000003" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1046">May</tspan><title>May</title></text><text id="SvgjsText1048" font-family="Helvetica, Arial, sans-serif" x="198.22230468750004" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1049">Jun</tspan><title>Jun</title></text><text id="SvgjsText1051" font-family="Helvetica, Arial, sans-serif" x="237.86676562500006" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1052">Jul</tspan><title>Jul</title></text><text id="SvgjsText1054" font-family="Helvetica, Arial, sans-serif" x="277.5112265625001" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1055">Aug</tspan><title>Aug</title></text><text id="SvgjsText1057" font-family="Helvetica, Arial, sans-serif" x="317.1556875000001" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1058">Sep</tspan><title>Sep</title></text><text id="SvgjsText1060" font-family="Helvetica, Arial, sans-serif" x="356.8001484375001" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1061">Oct</tspan><title>Oct</title></text><text id="SvgjsText1063" font-family="Helvetica, Arial, sans-serif" x="396.44460937500014" y="222.348" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1064">Nov</tspan><title>Nov</title></text></g><line id="SvgjsLine1065" x1="-10.567734375" y1="194.348" x2="407.01234375" y2="194.348" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1"></line></g><g id="SvgjsG1090" class="apexcharts-grid"><g id="SvgjsG1091" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1104" x1="-10.567734375" y1="0" x2="407.01234375" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1105" x1="-10.567734375" y1="19.3348" x2="407.01234375" y2="19.3348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1106" x1="-10.567734375" y1="38.6696" x2="407.01234375" y2="38.6696" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1107" x1="-10.567734375" y1="58.004400000000004" x2="407.01234375" y2="58.004400000000004" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1108" x1="-10.567734375" y1="77.3392" x2="407.01234375" y2="77.3392" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1109" x1="-10.567734375" y1="96.674" x2="407.01234375" y2="96.674" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1110" x1="-10.567734375" y1="116.00880000000001" x2="407.01234375" y2="116.00880000000001" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1111" x1="-10.567734375" y1="135.3436" x2="407.01234375" y2="135.3436" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1112" x1="-10.567734375" y1="154.6784" x2="407.01234375" y2="154.6784" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1113" x1="-10.567734375" y1="174.0132" x2="407.01234375" y2="174.0132" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1114" x1="-10.567734375" y1="193.348" x2="407.01234375" y2="193.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1092" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1093" x1="0" y1="194.348" x2="0" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1094" x1="39.6444609375" y1="194.348" x2="39.6444609375" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1095" x1="79.288921875" y1="194.348" x2="79.288921875" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1096" x1="118.9333828125" y1="194.348" x2="118.9333828125" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1097" x1="158.57784375" y1="194.348" x2="158.57784375" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1098" x1="198.2223046875" y1="194.348" x2="198.2223046875" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1099" x1="237.86676562500003" y1="194.348" x2="237.86676562500003" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1100" x1="277.51122656250004" y1="194.348" x2="277.51122656250004" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1101" x1="317.15568750000006" y1="194.348" x2="317.15568750000006" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1102" x1="356.80014843750007" y1="194.348" x2="356.80014843750007" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1103" x1="396.4446093750001" y1="194.348" x2="396.4446093750001" y2="200.348" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1116" x1="0" y1="193.348" x2="396.444609375" y2="193.348" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1115" x1="0" y1="1" x2="0" y2="193.348" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1011" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1012" class="apexcharts-series" rel="1" seriesName="CompletexTasks" data:realIndex="0"><path id="SvgjsPath1014" d="M-3.9644460937500003 193.348L-3.9644460937500003 126.43782955345905C-1.3214820312500004 123.79486549095904 1.3214820312500004 123.79486549095904 3.9644460937500003 126.43782955345905L3.9644460937500003 126.43782955345905L3.9644460937500003 193.348L3.9644460937500003 193.348C3.9644460937500003 193.348 -3.9644460937500003 193.348 -3.9644460937500003 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M -3.9644460937500003 193.348L -3.9644460937500003 126.43782955345905Q 0 122.47338345970905 3.9644460937500003 126.43782955345905L 3.9644460937500003 126.43782955345905L 3.9644460937500003 193.348L 3.9644460937500003 193.348z" pathFrom="M -3.9644460937500003 193.348L -3.9644460937500003 193.348L 3.9644460937500003 193.348L 3.9644460937500003 193.348L 3.9644460937500003 193.348L -3.9644460937500003 193.348" cy="124.45560650658405" cx="3.9644460937500003" j="0" val="23" barHeight="68.89239349341597" barWidth="7.928892187500001"></path><path id="SvgjsPath1015" d="M35.68001484375 193.348L35.68001484375 162.38168702828477C38.32297890625 159.73872296578477 40.96594296875 159.73872296578477 43.60890703125 162.38168702828477L43.60890703125 162.38168702828477L43.60890703125 193.348L43.60890703125 193.348C43.60890703125 193.348 35.68001484375 193.348 35.68001484375 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 35.68001484375 193.348L 35.68001484375 162.38168702828477Q 39.6444609375 158.41724093453476 43.60890703125 162.38168702828477L 43.60890703125 162.38168702828477L 43.60890703125 193.348L 43.60890703125 193.348z" pathFrom="M 35.68001484375 193.348L 35.68001484375 193.348L 43.60890703125 193.348L 43.60890703125 193.348L 43.60890703125 193.348L 35.68001484375 193.348" cy="160.39946398140978" cx="43.60890703125" j="1" val="11" barHeight="32.94853601859025" barWidth="7.928892187500001"></path><path id="SvgjsPath1016" d="M75.32447578125 193.348L75.32447578125 129.4331510096945C77.96743984375 126.79018694719451 80.61040390625 126.79018694719451 83.25336796875 129.4331510096945L83.25336796875 129.4331510096945L83.25336796875 193.348L83.25336796875 193.348C83.25336796875 193.348 75.32447578125 193.348 75.32447578125 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 75.32447578125 193.348L 75.32447578125 129.4331510096945Q 79.288921875 125.46870491594451 83.25336796875 129.4331510096945L 83.25336796875 129.4331510096945L 83.25336796875 193.348L 83.25336796875 193.348z" pathFrom="M 75.32447578125 193.348L 75.32447578125 193.348L 83.25336796875 193.348L 83.25336796875 193.348L 83.25336796875 193.348L 75.32447578125 193.348" cy="127.45092796281952" cx="83.25336796875" j="2" val="22" barHeight="65.8970720371805" barWidth="7.928892187500001"></path><path id="SvgjsPath1017" d="M114.96893671875 193.348L114.96893671875 114.45654372851715C117.61190078125 111.81357966601715 120.25486484375 111.81357966601715 122.89782890625 114.45654372851715L122.89782890625 114.45654372851715L122.89782890625 193.348L122.89782890625 193.348C122.89782890625 193.348 114.96893671875 193.348 114.96893671875 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 114.96893671875 193.348L 114.96893671875 114.45654372851715Q 118.9333828125 110.49209763476715 122.89782890625 114.45654372851715L 122.89782890625 114.45654372851715L 122.89782890625 193.348L 122.89782890625 193.348z" pathFrom="M 114.96893671875 193.348L 114.96893671875 193.348L 122.89782890625 193.348L 122.89782890625 193.348L 122.89782890625 193.348L 114.96893671875 193.348" cy="112.47432068164214" cx="122.89782890625" j="3" val="27" barHeight="80.87367931835787" barWidth="7.928892187500001"></path><path id="SvgjsPath1018" d="M154.61339765625 193.348L154.61339765625 156.3910441158138C157.25636171875 153.7480800533138 159.89932578125 153.7480800533138 162.54228984374998 156.3910441158138L162.54228984374998 156.3910441158138L162.54228984374998 193.348L162.54228984374998 193.348C162.54228984374998 193.348 154.61339765625 193.348 154.61339765625 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 154.61339765625 193.348L 154.61339765625 156.3910441158138Q 158.57784375 152.42659802206379 162.54228984374998 156.3910441158138L 162.54228984374998 156.3910441158138L 162.54228984374998 193.348L 162.54228984374998 193.348z" pathFrom="M 154.61339765625 193.348L 154.61339765625 193.348L 162.54228984374998 193.348L 162.54228984374998 193.348L 162.54228984374998 193.348L 154.61339765625 193.348" cy="154.4088210689388" cx="162.54228984374998" j="4" val="13" barHeight="38.9391789310612" barWidth="7.928892187500001"></path><path id="SvgjsPath1019" d="M194.25785859375 193.348L194.25785859375 129.4331510096945C196.90082265625 126.79018694719451 199.54378671875003 126.79018694719451 202.18675078125 129.4331510096945L202.18675078125 129.4331510096945L202.18675078125 193.348L202.18675078125 193.348C202.18675078125 193.348 194.25785859375 193.348 194.25785859375 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 194.25785859375 193.348L 194.25785859375 129.4331510096945Q 198.2223046875 125.46870491594451 202.18675078125 129.4331510096945L 202.18675078125 129.4331510096945L 202.18675078125 193.348L 202.18675078125 193.348z" pathFrom="M 194.25785859375 193.348L 194.25785859375 193.348L 202.18675078125 193.348L 202.18675078125 193.348L 202.18675078125 193.348L 194.25785859375 193.348" cy="127.45092796281952" cx="202.18675078125" j="5" val="22" barHeight="65.8970720371805" barWidth="7.928892187500001"></path><path id="SvgjsPath1020" d="M233.90231953125 193.348L233.90231953125 39.573507322630206C236.54528359375 36.93054326013021 239.18824765624998 36.93054326013021 241.83121171874998 39.573507322630206L241.83121171874998 39.573507322630206L241.83121171874998 193.348L241.83121171874998 193.348C241.83121171874998 193.348 233.90231953125 193.348 233.90231953125 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 233.90231953125 193.348L 233.90231953125 39.57350732263021Q 237.866765625 35.609061228880215 241.83121171874998 39.57350732263021L 241.83121171874998 39.57350732263021L 241.83121171874998 193.348L 241.83121171874998 193.348z" pathFrom="M 233.90231953125 193.348L 233.90231953125 193.348L 241.83121171874998 193.348L 241.83121171874998 193.348L 241.83121171874998 193.348L 233.90231953125 193.348" cy="37.591284275755214" cx="241.83121171874998" j="6" val="52" barHeight="155.7567157242448" barWidth="7.928892187500001"></path><path id="SvgjsPath1021" d="M273.54678046875 193.348L273.54678046875 132.42847246592999C276.18974453124997 129.78550840342996 278.83270859375 129.78550840342996 281.47567265625 132.42847246592999L281.47567265625 132.42847246592999L281.47567265625 193.348L281.47567265625 193.348C281.47567265625 193.348 273.54678046875 193.348 273.54678046875 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 273.54678046875 193.348L 273.54678046875 132.42847246592999Q 277.5112265625 128.46402637217997 281.47567265625 132.42847246592999L 281.47567265625 132.42847246592999L 281.47567265625 193.348L 281.47567265625 193.348z" pathFrom="M 273.54678046875 193.348L 273.54678046875 193.348L 281.47567265625 193.348L 281.47567265625 193.348L 281.47567265625 193.348L 273.54678046875 193.348" cy="130.446249419055" cx="281.47567265625" j="7" val="21" barHeight="62.90175058094501" barWidth="7.928892187500001"></path><path id="SvgjsPath1022" d="M313.19124140625 193.348L313.19124140625 63.53607897251402C315.83420546875004 60.89311491001402 318.47716953125 60.89311491001402 321.12013359375004 63.53607897251402L321.12013359375004 63.53607897251402L321.12013359375004 193.348L321.12013359375004 193.348C321.12013359375004 193.348 313.19124140625 193.348 313.19124140625 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 313.19124140625 193.348L 313.19124140625 63.53607897251403Q 317.1556875 59.57163287876403 321.12013359375004 63.53607897251403L 321.12013359375004 63.53607897251403L 321.12013359375004 193.348L 321.12013359375004 193.348z" pathFrom="M 313.19124140625 193.348L 313.19124140625 193.348L 321.12013359375004 193.348L 321.12013359375004 193.348L 321.12013359375004 193.348L 313.19124140625 193.348" cy="61.55385592563903" cx="321.12013359375004" j="8" val="44" barHeight="131.794144074361" barWidth="7.928892187500001"></path><path id="SvgjsPath1023" d="M352.83570234375003 193.348L352.83570234375003 129.4331510096945C355.47866640625 126.79018694719451 358.12163046875 126.79018694719451 360.76459453125005 129.4331510096945L360.76459453125005 129.4331510096945L360.76459453125005 193.348L360.76459453125005 193.348C360.76459453125005 193.348 352.83570234375003 193.348 352.83570234375003 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 352.83570234375003 193.348L 352.83570234375003 129.4331510096945Q 356.8001484375 125.46870491594451 360.76459453125005 129.4331510096945L 360.76459453125005 129.4331510096945L 360.76459453125005 193.348L 360.76459453125005 193.348z" pathFrom="M 352.83570234375003 193.348L 352.83570234375003 193.348L 360.76459453125005 193.348L 360.76459453125005 193.348L 360.76459453125005 193.348L 352.83570234375003 193.348" cy="127.45092796281952" cx="360.76459453125005" j="9" val="22" barHeight="65.8970720371805" barWidth="7.928892187500001"></path><path id="SvgjsPath1024" d="M392.48016328125004 193.348L392.48016328125004 105.47057935981071C395.12312734375007 102.8276152973107 397.76609140625004 102.8276152973107 400.40905546875007 105.47057935981071L400.40905546875007 105.47057935981071L400.40905546875007 193.348L400.40905546875007 193.348C400.40905546875007 193.348 392.48016328125004 193.348 392.48016328125004 193.348 " fill="rgba(85,110,230,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 392.48016328125004 193.348L 392.48016328125004 105.47057935981071Q 396.444609375 101.50613326606071 400.40905546875007 105.47057935981071L 400.40905546875007 105.47057935981071L 400.40905546875007 193.348L 400.40905546875007 193.348z" pathFrom="M 392.48016328125004 193.348L 392.48016328125004 193.348L 400.40905546875007 193.348L 400.40905546875007 193.348L 400.40905546875007 193.348L 392.48016328125004 193.348" cy="103.48835631293571" cx="400.40905546875007" j="10" val="30" barHeight="89.8596436870643" barWidth="7.928892187500001"></path></g></g><g id="SvgjsG1025" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG1026" class="apexcharts-series" seriesName="AllxTasks" data:longestSeries="true" rel="1" data:realIndex="1"><path id="SvgjsPath1029" d="M0 124.45560650658405C13.875561328124999 124.45560650658405 25.768899609375 160.39946398140978 39.6444609375 160.39946398140978C53.520022265625 160.39946398140978 65.413360546875 91.5070704879938 79.288921875 91.5070704879938C93.164483203125 91.5070704879938 105.057821484375 112.47432068164214 118.9333828125 112.47432068164214C132.808944140625 112.47432068164214 144.702282421875 142.4275352439969 158.57784375 142.4275352439969C172.453405078125 142.4275352439969 184.346743359375 127.45092796281952 198.2223046875 127.45092796281952C212.09786601562502 127.45092796281952 223.991204296875 7.638069713400455 237.866765625 7.638069713400455C251.742326953125 7.638069713400455 263.635665234375 97.49771340046476 277.5112265625 97.49771340046476C291.386787890625 97.49771340046476 303.280126171875 61.55385592563903 317.1556875 61.55385592563903C331.031248828125 61.55385592563903 342.924587109375 127.45092796281952 356.8001484375 127.45092796281952C370.675709765625 127.45092796281952 382.569048046875 76.53046320681642 396.444609375 76.53046320681642C396.444609375 76.53046320681642 396.444609375 76.53046320681642 396.444609375 76.53046320681642 " fill="none" fill-opacity="1" stroke="rgba(52,195,143,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-line" index="1" clip-path="url(#gridRectMask8rcdhw6e)" pathTo="M 0 124.45560650658405C 13.875561328124999 124.45560650658405 25.768899609375 160.39946398140978 39.6444609375 160.39946398140978C 53.520022265625 160.39946398140978 65.413360546875 91.5070704879938 79.288921875 91.5070704879938C 93.164483203125 91.5070704879938 105.057821484375 112.47432068164214 118.9333828125 112.47432068164214C 132.808944140625 112.47432068164214 144.702282421875 142.4275352439969 158.57784375 142.4275352439969C 172.453405078125 142.4275352439969 184.346743359375 127.45092796281952 198.2223046875 127.45092796281952C 212.09786601562502 127.45092796281952 223.991204296875 7.638069713400455 237.866765625 7.638069713400455C 251.742326953125 7.638069713400455 263.635665234375 97.49771340046476 277.5112265625 97.49771340046476C 291.386787890625 97.49771340046476 303.280126171875 61.55385592563903 317.1556875 61.55385592563903C 331.031248828125 61.55385592563903 342.924587109375 127.45092796281952 356.8001484375 127.45092796281952C 370.675709765625 127.45092796281952 382.569048046875 76.53046320681642 396.444609375 76.53046320681642" pathFrom="M -1 193.348L -1 193.348L 39.6444609375 193.348L 79.288921875 193.348L 118.9333828125 193.348L 158.57784375 193.348L 198.2223046875 193.348L 237.866765625 193.348L 277.5112265625 193.348L 317.1556875 193.348L 356.8001484375 193.348L 396.444609375 193.348"></path><g id="SvgjsG1027" class="apexcharts-series-markers-wrap" data:realIndex="1"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1122" r="0" cx="0" cy="0" class="apexcharts-marker w2se4jr6f" stroke="#ffffff" fill="#34c38f" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1013" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1028" class="apexcharts-datalabels" data:realIndex="1"></g></g><line id="SvgjsLine1117" x1="-10.567734375" y1="0" x2="407.01234375" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1118" x1="-10.567734375" y1="0" x2="407.01234375" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1119" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1120" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1121" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1123" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1124" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1007" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1066" class="apexcharts-yaxis" rel="0" transform="translate(9.25, 0)"><g id="SvgjsG1067" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1068" font-family="Helvetica, Arial, sans-serif" x="20" y="32" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1069">65</tspan></text><text id="SvgjsText1070" font-family="Helvetica, Arial, sans-serif" x="20" y="51.3348" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1071">58</tspan></text><text id="SvgjsText1072" font-family="Helvetica, Arial, sans-serif" x="20" y="70.6696" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1073">52</tspan></text><text id="SvgjsText1074" font-family="Helvetica, Arial, sans-serif" x="20" y="90.0044" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1075">45</tspan></text><text id="SvgjsText1076" font-family="Helvetica, Arial, sans-serif" x="20" y="109.3392" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1077">39</tspan></text><text id="SvgjsText1078" font-family="Helvetica, Arial, sans-serif" x="20" y="128.674" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1079">32</tspan></text><text id="SvgjsText1080" font-family="Helvetica, Arial, sans-serif" x="20" y="148.0088" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1081">26</tspan></text><text id="SvgjsText1082" font-family="Helvetica, Arial, sans-serif" x="20" y="167.3436" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1083">19</tspan></text><text id="SvgjsText1084" font-family="Helvetica, Arial, sans-serif" x="20" y="186.6784" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1085">13</tspan></text><text id="SvgjsText1086" font-family="Helvetica, Arial, sans-serif" x="20" y="206.0132" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1087">6</tspan></text><text id="SvgjsText1088" font-family="Helvetica, Arial, sans-serif" x="20" y="225.348" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1089">0</tspan></text></g></g><g id="SvgjsG1004" class="apexcharts-annotations"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(85, 110, 230);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(52, 195, 143);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 520px; height: 355px;"></div></div><div class="contract-trigger"></div></div></div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Recent Tasks</h4>

                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Brand logo design</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Create a Blog Template UI</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-info text-white font-size-16">
                                                        D
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Redesign - Landing page</a></h5>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <img src="assets/images/users/avatar-7.jpg" alt="" class="rounded-circle avatar-xs">
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                        P
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table responsive -->
            </div>
        </div>
        
    </div>
</div>
<!-- end row -->
