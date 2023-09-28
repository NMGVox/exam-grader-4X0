Nijee Greene | Middle-End | m.php
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //$url = "HIDDEN FOR CONFIDENTIALITY";
    //echo "HellooooooooooooooooooooooOOOooOOOOOo?";
    $url = "HIDDEN FOR CONFIDENTIALITY";
    //echo $flag;
    $flag = $_POST["flag"];
    if ($flag == "login"){
        $uname = $_POST["uname"];
        $pword = $_POST["pword"];
        $info = ["flag" => $flag, "uname" => $uname, "pword" => $pword];
    }
    else if($flag == "getBank"){
        $info = ["flag" => $flag];
    }
    else if($flag == "getExam"){
        $name = $_POST['name'];
        $info = ["flag" => $flag, "name" => $name];
    }
    else if($flag == "getAllExams"){
        $info = ["flag" => $flag];
    }
    else if($flag == "getAllGrades"){
        //echo "Yeeeeet";
        $info = ["flag" => $flag];
    }
    else if($flag == "getAllGradesStudent"){
        $uname = $_POST["uname"];
        $info = ["flag" => $flag, "uname" => $uname];
    }
    else if($flag == "getAllQuestions"){
        $name = $_POST["name"];
        $info = ["flag" => $flag, "name" => $name];
    }
    else if($flag == "getExamGrade"){
        $examName = $_POST["examName"];
        $uname = $_POST["uname"];
        $info = ["flag" => $flag, "uname" => $uname, "examName" => $examName];
    }
    else if ($flag == "editExam"){
        $uname = $_POST["uname"];
        $examName = $_POST["examName"];
        $grade = $_POST["grade"];
        $q1score = $_POST["q1score"];
        $q2score = $_POST["q2score"];
        $q3score = $_POST["q3score"];
        $q4score = $_POST["q4score"];
        $q5score = $_POST["q5score"];
        $q6score = $_POST["q6score"];
        $q7score = $_POST["q7score"];
        $q8score = $_POST["q8score"];
        $q1com = $_POST["q1com"];
        $q2com = $_POST["q2com"];
        $q3com = $_POST["q3com"];
        $q4com = $_POST["q4com"];
        $q5com = $_POST["q5com"];
        $q6com = $_POST["q6com"];
        $q7com = $_POST["q7com"];
        $q8com = $_POST["q8com"];
        $q1gradercom = $_POST["q1gradercom"];
        $q2gradercom = $_POST["q2gradercom"];
        $q3gradercom = $_POST["q3gradercom"];
        $q4gradercom = $_POST["q4gradercom"];
        $q5gradercom = $_POST["q5gradercom"];
        $q6gradercom = $_POST["q6gradercom"];
        $q7gradercom = $_POST["q7gradercom"];
        $q8gradercom = $_POST["q8gradercom"];
        $comment = $_POST["comment"];
        $isGraded = "yes";
        $info = ["flag" => $flag,
        "q1score" => $q1score,
        "q2score" => $q2score,
        "q3score" => $q3score,
        "q4score" => $q4score,
        "q5score" => $q5score,
        "q6score" => $q6score,
        "q7score" => $q7score,
        "q8score" => $q8score,
        "q1com" => $q1com,
        "q2com" => $q2com,
        "q3com" => $q3com,
        "q4com" => $q4com,
        "q5com" => $q5com,
        "q6com" => $q6com,
        "q7com" => $q7com,
        "q8com" => $q8com,
        "q1gradercom" => $q1gradercom,
        "q2gradercom" => $q2gradercom,
        "q3gradercom" => $q3gradercom,
        "q4gradercom" => $q4gradercom,
        "q5gradercom" => $q5gradercom,
        "q6gradercom" => $q6gradercom,
        "q7gradercom" => $q7gradercom,
        "q8gradercom" => $q8gradercom,
        "comment" => $comment,
        "uname" => $uname,
        "examName" => $examName,
        "isGraded" => $isGraded,
        "grade" => $grade];
    }

    else if ($flag == "createQuestion"){
        $name = $_POST["name"];
        $topic = $_POST["topic"];
        $description = $_POST["description"];
        $diff = $_POST["diff"];
        $pr = $_POST["pr"];
        $args = $_POST["args"];
        $con = $_POST["con"];
        $testin1 = $_POST["testin1"];
        //$testin1 = str_replace("\"", "\\\"", $testin1);
        $testout1 = $_POST["testout1"];
        $testin2 = $_POST["testin2"];
        //$testin2 = str_replace("\"", "\\\"", $testin2);
        $testout2 = $_POST["testout2"];
        $testin3 = $_POST["testin3"];
        //$testin3 = str_replace("\"", "\\\"", $testin3);
        $testout3 = $_POST["testout3"];
        $testin4 = $_POST["testout4"];
        //$testin4 = str_replace("\"", "\\\"", $testin4);
        $testout4 = $_POST["testout4"];
        $testin5 = $_POST["testin5"];
        //$testin5 = str_replace("\"", "\\\"", $testin5);
        $testout5 = $_POST["testout5"];
        $testin6 = $_POST["testout6"];
        //$testin6 = str_replace("\"", "\\\"", $testin6);
        $testout6 = $_POST["testout6"];
        $info = ["flag" => $flag, "name" => $name, "topic" => $topic, "description" => $description,
        "diff" => $diff, "pr" => $pr, "args" => $args, "testin1" => $testin1, "testout1" => $testout1,
        "testin2" => $testin2, "testout2" => $testout2, "testin3" => $testin3, "testout3" => $testout3,
        "testin4" => $testin4, "testout4" => $testout4, "testin5" => $testin5, "testout5" => $testout5,
        "testin6" => $testin6, "testout6" => $testout6, "con" => $con];
    }
    else if ($flag == "createExam"){
        $name = $_POST["name"];
        $q1name = $_POST["q1name"];
        $q1point = $_POST["q1point"];
        $q2name = $_POST["q2name"];
        $q2point = $_POST["q2point"];
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
        $constraint = $_POST["constraint"];
        $info = [
            "flag" => $flag,
            "name" => $name,
            "q1name" => $q1name,
            "q1point" => $q1point,
            "q2name" => $q2name,
            "q2point" => $q2point,
            "q3name" => $q3name,
            "q3point" => $q3point,
            "q4name" => $q4name,
            "q4point" => $q4point,
            "q5name" => $q5name,
            "q5point" => $q5point,
            "q6name" => $q6name,
            "q6point" => $q6point,
            "q7name" => $q7name,
            "q7point" => $q7point,
            "q8name" => $q8name,
            "q8point" => $q8point,
            "constraint" => $constraint,
            "total" => $total
        ];
    }
    else if ($flag == "submitExam"){
        //$url = "HIDDEN FOR CONFIDENTIALITY";
        echo "HelloOOOOOooo.";
        $url = "HIDDEN FOR CONFIDENTIALITY";
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
        //$questionData1 = str_replace("\"", "\\\"", $questionData1);
        $questionData2 = $_POST["questionData2"];
        //$questionData2 = str_replace("\"", "\\\"", $questionData2);
        $questionData3 = $_POST["questionData3"];
        //$questionData3 = str_replace("\"", "\\\"", $questionData3);
        $questionData4 = $_POST["questionData4"];
        //$questionData4 = str_replace("\"", "\\\"", $questionData4);
        $questionData5 = $_POST["questionData5"];
        //$questionData5 = str_replace("\"", "\\\"", $questionData5);
        $questionData6 = $_POST["questionData6"];
        //$questionData6 = str_replace("\"", "\\\"", $questionData6);
        $questionData7 = $_POST["questionData7"];
        //$questionData7 = str_replace("\"", "\\\"", $questionData7);
        $questionData8 = $_POST["questionData8"];
        //$questionData8 = str_replace("\"", "\\\"", $questionData8);
        
        $info = [
            "flag" => $flag,
            "name" => $name,
            "q1name" => $q1name,
            "q1point" => $q1point,
            "q2name" => $q2name,
            "q2point" => $q2point,
            "q3name" => $q3name,
            "q3point" => $q3point,
            "q4name" => $q4name,
            "q4point" => $q4point,
            "q5name" => $q5name,
            "q5point" => $q5point,
            "q6name" => $q6name,
            "q6point" => $q6point,
            "q7name" => $q7name,
            "q7point" => $q7point,
            "q8name" => $q8name,
            "q8point" => $q8point,
            "uname" => $uname,
            "ans1" => $ans1,
            "ans2" => $ans2,
            "ans3" => $ans3,
            "ans4" => $ans4,
            "ans5" => $ans5,
            "ans6" => $ans6,
            "ans7" => $ans7,
            "ans8" => $ans8,
            "questionData1" => $questionData1,
            "questionData2" => $questionData2,
            "questionData3" => $questionData3,
            "questionData4" => $questionData4,
            "questionData5" => $questionData5,
            "questionData6" => $questionData6,
            "questionData7" => $questionData7,
            "questionData8" => $questionData8,
            "total" => $total
        ];
    }

    else if($flag == "filters"){
        $topicFilter = $_POST["topicFilter"];
        $diffFilter = $_POST["diffFilter"];
        $keyFilter = $_POST["keyFilter"];
        $info = ["flag" => $flag,
        "topicFilter" => $topicFilter,
        "diffFilter" => $diffFilter,
        "keyFilter" => $keyFilter];
    }

    //curl connection
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, TRUE);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $info);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
    $result = curl_exec($ch);
    echo $result;
    //close connection
    curl_close($ch);
?>