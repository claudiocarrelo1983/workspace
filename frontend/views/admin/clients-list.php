<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\base\Event;


?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Data Tables</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Buttons example</h4>
                <p class="card-title-desc">The Buttons extension for DataTables
                    provides a common set of options, API methods and styling to display
                    buttons on a page that will interact with a DataTable. The core library
                    provides the based framework upon which plug-ins can built.
                </p>

                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">      <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>PDF</span></button> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="datatable-buttons" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div> </div></div><div class="col-sm-12 col-md-6"><div id="datatable-buttons_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable-buttons"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info" style="width: 1182px;">
                    <thead>
                    <tr role="row"><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 261px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 436px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 356px;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                    </thead>


                    <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <tr class="odd">
                        
                        
                        
                        <td>27</td>
                        
                        <td style="">2011/05/07</td><td>$145,000</td>
                    </tr><tr class="even">
                        
                        
                        
                        <td>22</td>
                        
                        <td style="">2008/10/26</td><td>$235,500</td>
                    </tr><tr class="odd">
                        
                        
                        
                        <td>59</td>
                        
                        <td style="">2009/04/10</td><td>$237,500</td>
                    </tr><tr class="even">
                        
                        
                        
                        <td>21</td>
                        
                        <td style="">2009/02/27</td><td>$103,500</td>
                    </tr><tr class="odd">
                        
                        
                        
                        <td>61</td>
                        
                        <td style="">2011/04/25</td><td>$320,800</td>
                    </tr><tr class="even">
                        
                        
                        
                        <td>22</td>
                        
                        <td style="">2013/03/03</td><td>$342,000</td>
                    </tr><tr class="odd">
                        
                        
                        
                        <td>47</td>
                        
                        <td style="">2009/07/07</td><td>$87,500</td>
                    </tr><tr class="even">
                        
                        
                        
                        <td>64</td>
                        
                        <td style="">2011/02/03</td><td>$234,500</td>
                    </tr><tr class="odd">
                        
                        
                        
                        <td>37</td>
                        
                        <td style="">2009/08/19</td><td>$139,575</td>
                    </tr><tr class="even">
                        
                        
                        
                        <td>41</td>
                        
                        <td style="">2012/10/13</td><td>$132,000</td>
                    </tr></tbody>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable-buttons_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable-buttons_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable-buttons_previous"><a href="#" aria-controls="datatable-buttons" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable-buttons" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable-buttons" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable-buttons_next"><a href="#" aria-controls="datatable-buttons" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

