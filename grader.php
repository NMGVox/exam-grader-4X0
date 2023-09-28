<!-- Nijee Greene | Middle-End | grader.php -->
<?php
//ERROR STUFF
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function makefunc($fname, $args, $con, $topic, $pr){
    $string = "\n";
    if($con != "print" && $pr != "print"){
        $string = "print(";
    }
    $string .=$fname."(";
    //IF the topic is string, surround arguments with quotes to avoid errors
    /*
    if($topic == "string"){
    foreach($args as $arg){
    $string .= "\"" . $arg . "\", ";
    }
    }*/
    //Other wise, no quotes
    //else{
    foreach($args as $arg){
        $string .= $arg . ", ";
    }
    //}
    $string = substr_replace($string ,"", -2);
    $string .= ")";
    if($con != "print" && $pr != "print"){
        $string .= ")";
    }
    return $string;
}

function getqdat($str){
    $arr = explode("$$", $str);
    $arr2 = array();
    foreach($arr as $ele){
        $temp = explode(": ", $ele);
        if($temp[1] != ""){
            array_push($arr2, $temp[1]);
        }
        else{
            break;
        }
    }
    return $arr2;
}

function cheatDetect($line){
    if(strstr($line, "\"")){
        return true;
    }
        return false;
}

function printtoret($line){
    $newline = str_replace("print", "return", $line);
    $newline = str_replace("(", " ", $newline);
    $newline = str_replace(")","", $newline);
    return $newline;
}

function ret_to_print($line){
    $newline = str_replace("return", "print", $line);
    $newline = substr_replace($newline, "(", 6, 0);
    $newline .= ")";
    return $newline;
}

function constraintchk(&$s, $c, $str, &$com, &$errs){
    echo $c;
    if($c == "for loop"){
        if(strstr($str, "for")){
            $com .= "Correct: Constraint used., 0~";
        }
        else{
            $com .= "Wrong: For loop not used, -5~";
            $s-=5;
            $errs++;
        }
    }
    else if($c == "while loop"){
        echo "Should see this once.";
        if(strstr($str, "while")){
            $com .= "Correct: Constraint used., 0~";
        }
        else{
            $com .= "Wrong: While loop not used, -5~";
            $s-=5;
            $errs++;
        }
    }
    else if($c == "print"){
        if(strstr($str, "print")){
            $com .= "Correct: Constraint used., 0~";
        }
        else{
            $com .= "Wrong: Problem required a print statement, -5~";
            $s-=5;
            $errs++;
        }
    }
}

//I have to collect some stuff from my redirection script here
//POST dump
$ans = array();
$quesData = array();
$ansComms = array();
$qScores = array();
$qDesc = array();
$flag = "submitExam";
$name = $_POST["name"];
$q1name = $_POST["q1name"];
$q1point = $_POST["q1point"];
$q2name = $_POST["q2name"];
$q2point = $_POST["q2point"];
$q3name = $_POST["q3name"];
$q3point = $_POST["q3point"];
$q4name = $_POST["q4name"];
$q4point = $_POST["q4point"];
$q5name = $_POST["q5name"];
$q5point = $_POST["q5point"];
$q6name = $_POST["q6name"];
$q6point = $_POST["q6point"];
$q7name = $_POST["q7name"];
$q7point = $_POST["q7point"];
$q8name = $_POST["q8name"];
$q8point = $_POST["q8point"];
$total = $_POST["total"];
$uname = $_POST["uname"];
$ans1 = $_POST["ans1"];
$ans2 = $_POST["ans2"];
$ans3 = $_POST["ans3"];
$ans4 = $_POST["ans4"];
$ans5 = $_POST["ans5"];
$ans6 = $_POST["ans6"];
$ans7 = $_POST["ans7"];
$ans8 = $_POST["ans8"];
$questionData1 = $_POST["questionData1"];
$questionData2 = $_POST["questionData2"];
$questionData3 = $_POST["questionData3"];
$questionData4 = $_POST["questionData4"];
$questionData5 = $_POST["questionData5"];
$questionData6 = $_POST["questionData6"];
$questionData7 = $_POST["questionData7"];
$questionData8 = $_POST["questionData8"];
array_push($ans, $ans1, $ans2, $ans3, $ans4, $ans5, $ans6, $ans7, $ans8);

array_push($quesData, $questionData1, $questionData2, $questionData3, $questionData4,
            $questionData5, $questionData6,$questionData7, $questionData8);

array_push($ansComms, $com1 = "", $com2 = "", $com3 = "", $com4 = "", $com5 = "",
            $com6 = "",$com7 = "", $com8 = "");

array_push($qScores, $q1point, $q2point, $q3point, $q4point, $q5point, $q6point, $q7point, $q8point);

array_push($qDesc, "", "","","","","","","");

$i = 0;

foreach($ans as $act_str){
    $str = $act_str;
    $cheat = false;
    //Keep a copy of original code
    $lineno = 0;
    $score = $qScores[$i];
    $qdat = array();

    if($quesData[$i] == ""){
        break;
    }

    $qdat = getqdat($quesData[$i]);
    //Save the description
    $qDesc[$i] = $qdat[3];
    $lines = explode("\r\n", $str);
    $errs = 0;
    //Check if the constraint is used if the constraint exists if one has been set.
    echo $qdat[6];
    if($qdat[6] != "none"){
        constraintchk($score, $qdat[6], $str, $ansComms[$i], $errs);
    }
    //Go through each line and check for different things.
    //Use preg_split for local testing, and $lines as $line for server side
    foreach(preg_split("/((\r?\n)|(\r\n?))/", $str) as $line){
        //foreach($lines as $line){
        if($lineno == 0){
        //Take a look at the function declarations.
        //if Function is missing "def"
        if(!strstr($line, "def")){
                $score -= 3;
                $ansComms[$i] .= "Wrong: Missing def statement, -3~";
                $errs++;
            } else{
                $ansComms[$i] .= "Correct: Def statement found., 0~";
            }
            //Check the function name
            $endfuncname = strpos($line, "(");
            $ans_funcname = substr($line, 4, $endfuncname-4);
            if($ans_funcname != $qdat[0]){
                $score = $score - 5;
                $str = str_replace($ans_funcname, $qdat[0], $str);
                $ansComms[$i] .= "Wrong: Wrong function name. Found
                $ans_funcname expected $qdat[0], -5~";
                $errs++;
            } else{
                $ansComms[$i] .= "Correct: Function name correct., 0~";
            }
            //Check for colon at end of line.
            $colchk = substr($line, -1);
            if(!strstr($colchk, ":")){
                $posit = strpos($line, ")");
                $str = substr_replace($str, ":", $posit+1, 0);
                $score = $score - 3;
                $ansComms[$i] .= "Wrong: No colon at end of function definition, -3~";
                $errs++;
            }
            else{
                $ansComms[$i] .= "Correct: Colon found at end of function declaration.,0~";
            }
        }

        /*else{
        if(strstr($line, "return")){
        if(strstr($qdat[4], "print") == true){
        $score -= 8;
        $newline = ret_to_print($line);
        $str = str_replace($line, $newline, $str);
        $ansComms[$i] .= "\n-Returned instead of print.";
        }
        $cheat = cheatDetect($line);
        }
        else if(strstr($line, "print")){
        if(strstr($qdat[4], "return") == true){
        $score -= 8;
        $newline = printtoret($line);
        $str = str_replace($line, $newline, $str);
        $ansComms[$i] .= "\n-Printed instead of returning.";
        }
        $cheat = cheatDetect($line);
        }
        }*/
        $lineno++;
    }

    $testnum = 1;
    $dec = round($score/((sizeof($qdat)-7)/2));
    $tcfail = 0; //Number of test cases failed
    $tcnum = (sizeof($qdat)-7)/2;
    for( $t = 7; $t < sizeof($qdat); $t+=2){
        //Split test case. This needs to go in a for loop. start at 6. Test multiple test cases.
        $argslist = explode(", ", $qdat[$t]);
        $pyfile = file_put_contents("code.py", $str.PHP_EOL);
        $funccall = makefunc($qdat[0], $argslist, $qdat[6], $qdat[2], $qdat[4]);
        file_put_contents("code.py", $funccall.PHP_EOL, FILE_APPEND | LOCK_EX);
        
        //$python = 'C:/Python27/python.exe';
        $command = escapeshellcmd('HIDDEN FOR CONFIDENTIALITY/public_html/CS490/rc/code.py');
        $output = shell_exec($command);
        
        //Python OR PHP kept putting a space after code output. I have no clue why.
        $output = substr_replace($output ,"", -1);
        
        //Compare output to the test cases
        if(strcmp($output, $qdat[$t+1]) != 0){
            //$dec = floor($score/((sizeof($qdat)-7)/2));
            $expec = $qdat[$t+1];
            $tcfail++;
            if($tcfail == $tcnum){ //If all test cases were failed.
                $dec += $score - $dec;
                $score = 0;
            }
            else{
                $score -= $dec;
            }
            $ansComms[$i] .= "Wrong: Test case $testnum failed. Expected $expec; got
            $output, -$dec~";
            $errs++;
        }
        else{
        $ansComms[$i] .= "Correct: Test case $testnum passed. , 0~";
        }
        $testnum++;
    }/*
    if( $score < 0){
    $score =0;
    }*/
    //unlink("code.py");
    $qScores[$i] = (($score / $qScores[$i]) * 100) * ($qScores[$i] *.01);
    $ansComms[$i] = rtrim($ansComms[$i], "~");
    $i++;
    //End for loop.
}
//Final tally
$grade = 0;

for($s = 0; $s < $i; $s++){
    $grade += $qScores[$s];
}

//Added 3:31 PM -> 11/20/2019
//for($itr = 0; $itr < 8; $itr++){
// $ans[$itr] = str_replace("\"", "\\\"", $ans[$itr]);
//}//End 11/20/2019
$data = array( 
    "flag" => "submitExam",
    "uname" => $uname,
    "examName" => $name,
    "grade" => $grade,
    "comment" => "",
    "q1name" => $q1name,
    "q1desc" => $qDesc[0],
    "q1score" => $qScores[0],
    "q1ans" => $ans[0],
    "q1gradercom" => $ansComms[0],
    "q1com" => "",
    "q2name" => $q2name,
    "q2desc" => $qDesc[1],
    "q2score" => $qScores[1],
    "q2ans" => $ans[1],
    "q2gradercom" => $ansComms[1],
    "q2com" => "",
    "q3name" => $q3name,
    "q3desc" => $qDesc[2],
    "q3score" => $qScores[2],
    "q3ans" => $ans[2],
    "q3gradercom" => $ansComms[2],
    "q3com" => "",
    "q4name" => $q4name,
    "q4desc" => $qDesc[3],
    "q4score" => $qScores[3],
    "q4ans" => $ans[3],
    "q4gradercom" => $ansComms[3],
    "q4com" => "",
    "q5name" => $q5name,
    "q5desc" => $qDesc[4],
    "q5score" => $qScores[4],
    "q5ans" => $ans[4],
    "q5gradercom" => $ansComms[4],
    "q5com" => "",
    "q6name" => $q6name,
    "q6desc" => $qDesc[5],
    "q6score" => $qScores[5],
    "q6ans" => $ans[5],
    "q6gradercom" => $ansComms[5],
    "q6com" => "",
    "q7name" => $q7name,
    "q7desc" => $qDesc[6],
    "q7score" => $qScores[6],
    "q7ans" => $ans[6],
    "q7gradercom" => $ansComms[6],
    "q7com" => "",
    "q8name" => $q8name,
    "q8desc" => $qDesc[7],
    "q8score" => $qScores[7],
    "q8ans" => $ans[7],
    "q8gradercom" => $ansComms[7],
    "q8com" => ""
);

$url = "HIDDEN FOR CONFIDENTIALITY";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, TRUE);
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result = curl_exec($ch);
curl_close($ch);
?>