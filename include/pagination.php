<ul class="pagination">
<?php 
// Previous Button
if($page > 1){ ?>
        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page-1 ?>">Previous</a></li>
        <?php 
        }else{ ?> 
        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
    <?php 
}

$total_post_row = mysqli_num_rows($get_allposts); // Data come form index.php
$total_page = ceil($total_post_row / $per_page);
// Pagelink Button
for($i = 1; $i <= $total_page; $i++){
    ?>
        <li class="page-item <?php echo $page == $i ? 'active':''; ?>"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php 
} 

// NExt Button 
if(($i > $page) && ($page < $total_page)){ ?>
    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page+1 ?>">Next</a></li>
    <?php 
    }else{ ?> 
    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
    <?php 
}

?>

</ul>