
<?php
    include("database.php");
    extract($_POST);
    session_start();
    if(isset($submit))
    {   if($action=='update'){
        $querry="UPDATE `task` SET `isDone`=1 WHERE `taskID`=".$task;
        $rs=mysqli_query($conn,$querry);
    }elseif ($action=='delete')
    $querry="DELETE FROM `task` WHERE  `taskID`=".$task;
    $rs=mysqli_query($conn,$querry);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
    <script src="https://use.fontawesome.com/abf6d68cdb.js"></script>
    <link rel="stylesheet" href="styles/main.css">
    
</head>
<body>
<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    
                            <i class="fa fa-tasks"></i>&nbsp;Task Lists
                            
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <?php 
                            if(isset($_SESSION["id"]))
		                    {
                                echo '<a href="logout.php">';
                                echo '<i class="fa fa-sign-in" ></i>&nbsp;logout';
                                echo '</a>';
                            }else
                            {
                                echo '<a href="login.php">';
                                echo '<i class="fa fa-sign-in" ></i>&nbsp;login';
                                echo '</a>';
                            }
                            ?>
                        
               </div>
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">



                            <?php
                            include("database.php");

                            $rs=mysqli_query($conn,"SELECT taskID,TItle,isDone,Name  from task,project where project.ID=task.projectID ORDER BY task.CreationDate DESC;");
                            if(mysqli_num_rows($rs)<1)
                              {

                                //   add a costum row to tell them that there is nothing to see
                                echo '<li>fd up</li>';
                              }
                              else
                              {
                                $row =[];
                                foreach($rs as $row) {
                                echo '<li class="list-group-item"><div class="todo-indicator bg-warning"></div><div class="widget-content p-0"><div class="widget-content-wrapper"><div class="widget-content-left mr-2">';
                                
                                if ($row['isDone']==0)
                                    {echo  '<form method="POST"><input type="hidden" name="action" value="update"><input type="hidden" name="task" value="'.$row["taskID"].'"><button type="submit" name="submit" class="border-0 btn-transition btn btn-outline-success"><i class="fa fa-check"></i></button></form>';}
                                echo  '</div><div class="widget-content-left"><div class="widget-heading" ';
                                if ($row['isDone']==1)
                                   {echo 'style="text-decoration:line-through;"';}
                                
                                echo   '>'.$row['TItle'];
                                echo    '</div><div class="widget-subheading"><i>By ';
                                echo    ''.$row['Name'];
                                echo  '</i></div></div>';
                                if (isset($_SESSION["id"]))
                                {echo '<div class="widget-content-right"><form method="POST"><input type="hidden" name="action" value="delete"><input type="hidden" name="task" value="'.$row["taskID"].'"><button type="submit" name="submit" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button></form> </div>';}
                                echo '</div></div></li>';
                                }
                            }
                          
                            
                            
                            
                            ?>
                             </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <!-- <button class="mr-2 btn btn-link btn-sm">Cancel</button> -->
            <?php
		  if(isset($_SESSION["id"]))
		  {
		  	echo '<div class="d-block text-right card-footer">';
            echo '<button class="btn btn-primary addbtn">Add Task</button>';
            echo '<button class="btn btn-primary addbtn" >Add Project</button></div>';
        }
		  ?> 
                
                
            
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>