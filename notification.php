<?php
session_start();
$uid=$_SESSION['id'];
date_default_timezone_set("Asia/Kolkata");
include("db_connection.php");
$noofnewnotification=0;
$totalrows=0;
                        for($i=0;$i<2;$i++){//using for fetching only new notification for first time and displaying it first
                            if($i==0){
                                $query="select * from notification where uid=$uid and status=0 order by nid desc ";
                                $res=mysqli_query($connection,$query);
                        if(mysqli_num_rows($res)!=0){
                            $totalrows+=mysqli_num_rows($res);
                        }
                            }
                            else{
                                $query="select * from notification where uid=$uid and status=1 order by nid desc ";
                                $res=mysqli_query($connection,$query);
                                if(mysqli_num_rows($res)!=0){
                                    $totalrows+=mysqli_num_rows($res);
                                }
                            }
                        
                        
                        while($row=mysqli_fetch_assoc($res)){
                            // print_r($row); 
                            $pollid=$row['pid'];
                            $pnameresult=mysqli_query($connection,"select * from poll_details where pid=$pollid");
                            $pnamearr=mysqli_fetch_assoc($pnameresult);
                            
                            $deadline=strtotime($pnamearr['deadline']." ".$pnamearr['timeadded']);
                            if(time()-$deadline>0 && $row['status']==0){
                                $noofnewnotification++;
                            }
                        ?>
                                <a value="<?php echo $pollid;?>" href="pollresult.php?pollid=<?php echo $pollid;?>"><li class="notificationtab" style="<?php if(time()-$deadline<0){echo 'display:none;';}?>"><label style="font-size:16"><?php echo $pnamearr['heading'] ?> </label>
                                <span class="fas fa-eye" style="<?php if($row['status']==0)echo "display:none;";?>font-size:12;float:right;color:rgba(255,255,255,.6)"></span><br>
                                <?php echo $row['message']?></li></a>
                                <?php
                                }
                            }
                            if($totalrows==0){
                            ?>
                            <li>no notification</li>
                            <?php
                            }
                                echo "|$noofnewnotification";
                                ?>