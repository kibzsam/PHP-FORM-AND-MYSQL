<?php
global $group,$pres3,$pres2,$pres1,$functional,$nonfunctional,$usescase,$workingmodel,$evaluation,$req,$checkpoint2,$checkpoint1,$final,$totalscore;
//The code below will capture data from the user form and store it in the variables $group,$pres1,$functional,$non-functional,$pres2,$usescases,$workingmodel,$pres3,$evaluation
if (isset($_POST['submit'])){
    $group=$_POST['group'];
    $pres1=$_POST['pres1'];
    $functional=$_POST['func'];
    $nonfunctional=$_POST['nonfunc'];

    $pres2=$_POST['pres2'];
    $usescase=$_POST['usescase'];
    $workingmodel=$_POST['wmodel'];

    $pres3=$_POST['pres3'];
    $evaluation=$_POST['evaluation'];
    // The code below is the main code for Evaluating the scores with their weighted percentages

    $req=(0.5*$functional)+(0.5*$nonfunctional);
    $rp=(0.5*$req)+(0.5*$pres1);
    $checkpoint1=(0.3*$rp);
    $puw=(0.5*$pres2)+(0.2*$usescase)+(0.3*$workingmodel);
    $checkpoint2=(0.3*$puw);
    $pe=(0.5*$pres3)+(0.5*$evaluation);
    $final=(0.4*$pe);
    $totalscore= $checkpoint1+$checkpoint2+$final;

    echo '<div class="alert alert-success">';
    echo"<p>";
    echo "Group::>".$group.".."."Score is=>".$totalscore ;
    echo"</p>";
    echo"<p>";
    echo "The Total Score is:".$totalscore ;
    echo"</p>";
    echo"<p>";
    echo "CheckPoint 1, score:".$checkpoint1;
    echo"</p>";
    echo "</div>";

}
else{
    echo '<div class="alert alert-success">';
    echo"<p>";
    echo "Nothing Evaluted,please fill in some scores please" ;
    echo"</p>";
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Web Evaluator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="syle">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h3 class="title">EVALUATE.</h3>
    <div class="row">

        <div class="col-sm-3">
            <form  action="" method="post">
                <label for="Presentation1">Group name</label>
                <input type="text" name="group" class="form-control input-group-sm " placeholder="Enter Group name"value="<?php echo $group;?>" required>
                <div class="form-group">
                    <strong><h4>Check point#1</h4></strong>
                    <label for="Presentation1">Presentation</label>
                    <input type="number" name="pres1" class="form-control input-group-sm " placeholder="Enter score between(1-100)" value="<?php echo $pres1;?>" required>
                    <label for="Requirements">Requirements</label>
                    <input type="number" name="func" class="form-control input-group-sm"placeholder="Functional requirement(1-100)"value="<?php echo $functional;?>" required>
                    <input type="number" name="nonfunc" class="form-control input-group-sm"placeholder="Non-Functional requirement(1-100)"value="<?php echo $nonfunctional;?>"required>
                </div>
                <div class="form-group">
                    <strong><h4>Check point#2</h4></strong>
                    <label for="presentation2">Presentation</label>
                    <input type="number" name="pres2" class="form-control input-group-sm " placeholder="Presentation score between(1-100)" value="<?php echo $pres2;?>" required>
                    <label for="uses cases">Uses cases</label>
                    <input type="number" name="usescase" class="form-control input-group-sm"placeholder="Uses Cases Score between(1-100)" value="<?php echo $usescase;?>"required>
                    <label for="working_model">Working Model</label>
                    <input type="number" name="wmodel" class="form-control input-group-sm"placeholder="working_model score (1-100)"value="<?php echo $workingmodel;?>"required>
                </div>

                        <div id="right" class="form-group">
                            <strong><h4>Final</h4></strong>
                            <label for="presentation3">Presentation</label>
                            <input type="number" name="pres3" class="form-control input-group-sm " placeholder="Presentation score between(1-100)" value="<?php echo $pres3;?>" required>
                            <label for="Evaluation">Evaluation</label>
                            <input type="number" name="evaluation" class="form-control input-group-sm"placeholder="Evaluation Score between(1-100)"value="<?php echo $evaluation;?>" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-info">Evaluate</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
