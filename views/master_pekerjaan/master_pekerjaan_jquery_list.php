<script type="text/javascript"> 
function deletedata(id, skip, search){ 
    var ask = confirm("Do you want to delete ID " + id + " ?");
    if (ask == true) {
        site = "index.php?model=master_pekerjaan&action=deleteFormJQuery&skip=" + skip + "&search=" + search + "&id=" + id;
        target = "content";
        showMenu(target, site);
    }
}
function searchData() {
     var searchdata = document.getElementById("search").value;
     site =  'index.php?model=master_pekerjaan&action=showAllJQuery&search='+searchdata;
     target = "content";
     showMenu(target, site);
}
$(document).ready(function(){
    $('#search').keypress(function(e) {
            if(e.which == 13) {
                searchData();
            }
    });
});
</script>

<h1>PEKERJAAN</h1>
<div id="header_list">
</div>
<table width="95%" >
    <tr>
        <td align="left">
                    <img alt="Move First"  src="./img/icon/icon_move_first.gif" onclick="showMenu('content', 'index.php?model=master_pekerjaan&action=showAllJQuery&search=<?php echo $search ?>');" >
                    <img alt="Move Previous" src="./img/icon/icon_move_prev.gif" onclick="showMenu('content', 'index.php?model=master_pekerjaan&action=showAllJQuery&skip=<?php echo $previous ?>&search=<?php echo $search ?>');">
                     Page <?php echo $pageactive ?> / <?php echo $pagecount ?> 
                    <img alt="Move Next" src="./img/icon/icon_move_next.gif" onclick="showMenu('content', 'index.php?model=master_pekerjaan&action=showAllJQuery&skip=<?php echo $next ?>&search=<?php echo $search ?>');" >
                    <img alt="Move Last" src="./img/icon/icon_move_last.gif" onclick="showMenu('content', 'index.php?model=master_pekerjaan&action=showAllJQuery&skip=<?php echo $last ?>&search=<?php echo $search ?>');">
                    <a href="index.php?model=master_pekerjaan&action=export&search=<?php echo $search ?>">Export</a>
                    <a href="index.php?model=master_pekerjaan&action=printdata&search=<?php echo $search ?>" target="_"><img src="./images/icon_print.png"/></a>
        </td>
        <td align="right">
       <input type="text" name="search" id="search" value="<?php echo $search ?>" >&nbsp;&nbsp;<input type="button" class="btn btn-info btn-sm" value="find" onclick="searchData()">
<?php if($isadmin || $ispublic || $isentry){ ?>
       <input type="button" class="btn btn-warning btn-sm" value="new" name="new" onclick="showMenu('header_list', 'index.php?model=master_pekerjaan&action=showFormJQuery')"> 
<?php } ?>

        </td>
    </tr>
</table>
<table border="1"  cellpadding="2" style="border-collapse: collapse;" width="95%">
    <tr>
        <th class="textBold">id</th>
        <th class="textBold">pekerjaan</th>
        <th class="textBold">created_date</th>
        <th class="textBold">created_by</th>
<td>&nbsp;</td>
    </tr>
    <?php
    
    $no = 1;
    
    if ($master_pekerjaan_list != "") { 
        foreach($master_pekerjaan_list as $master_pekerjaan){
            $pi = $no + 1;
            $bg = ($pi%2 != 0) ? "#E1EDF4" : "#F0F0F0";
    ?>
            <tr bgcolor="<?php echo $bg;?>">
                <td><a href='#' onclick="showMenu('header_list', 'index.php?model=master_pekerjaan&action=showDetailJQuery&id=<?php echo $master_pekerjaan->getId();?>')"><?php echo $master_pekerjaan->getId();?></a> </td>
            <td><?php echo $master_pekerjaan->getPekerjaan();?></td>
            <td><?php echo $master_pekerjaan->getCreated_date();?></td>
            <td><?php echo $master_pekerjaan->getCreated_by();?></td>

                <td align="center" class="combobox">
  <?php if($isadmin || $ispublic || $isupdate){ ?>
                    <a href='#' onclick="showMenu('header_list', 'index.php?model=master_pekerjaan&action=showFormJQuery&id=<?php echo $master_pekerjaan->getid();?>&skip=<?php echo $skip ?>&search=<?php echo $search ?>')">[Edit]</a> | 
<?php } ?>
<?php if($isadmin || $ispublic || $isdelete){ ?>
                    <a href='#' onclick="deletedata('<?php echo $master_pekerjaan->getId()?>','<?php echo $skip ?>','<?php echo $search ?>')">[Delete]</a>
<?php } ?>

                </td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>
<br>