<div class="container">
<div class="card">
    <div class="card-body">

    <!-- Grid row -->
    <div class="row">
        
            <!-- Grid column -->
            <div class="col-md-12 mt-4">
        
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 grey-border" type="text" placeholder="Search" aria-label="Search">
                    <span class="input-group-addon waves-effect grey lighten-3" id="basic-addon1"><a><i class="fa fa-search text-grey" aria-hidden="true"></i></a></span>
                </div>
        
            </div>
            <!-- Grid column -->
        
        </div>
<!--Table-->
<table class="table table-striped ">

    <!--Table head-->
    <thead>
        <tr>
            <th class="text-center"><?= $col1 ?></th>
            <th class="text-center"><?= $col2 ?></th>            
        </tr>
    </thead>
    <!--Table head-->
    <tbody>
    <?= $lista ?>
    </tbody>
    
</table>
<!--Table-->

</div>
</div>
           
</div>