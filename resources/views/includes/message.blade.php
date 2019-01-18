<?php 

$bags = array();
if($errors)  {
    $bags = $errors->all();
}
    
?>


@if(count($bags) > 0 ) 

    <div class="alert alert-danger mt-3">
        <?php echo  implode('<br />', $bags); ?>
    </div>
   
@endif
@if(session('success')) 
    <div class="alert alert-success mt-3">
        {{session('success')}}
    </div>
@endif
@if(session('error')) 
    <div class="alert alert-error mt-3">
        {{session('error')}}
    </div>
@endif