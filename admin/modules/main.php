<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action'])){
            $temp = $_GET['action'];
        }
        else {
            $temp = '';
        }

        if($temp=='quanlydanhmucsanpham'){
            include('modules/managentproduct/add.php');
        }
        else {
            include('modules/dashboard.php');
        }
    
    ?>
</div>