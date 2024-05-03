<?php
$link = mysqli_connect("localhost", 'root', '','homeworkscore');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <title>homework 4</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <div class="input-wrap">
        <form action="homework 4.php" method="POST">
        <div>    
        <p>고객성명 <input type="placeholder" name="namw" size="9">
        <input type="submit" name="submit" value="submit"></p>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>구분</th>
                        <th colspan='2'>어린이</th>
                        <th colspan='2'>어른</th>
                        <th>비고</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>입장권</td>
                        <td>7.000</td>
                        <td><select name="childticket">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>10.000</td>
                        <td><select name="adultticket">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>입장</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>BIG3</td>
                        <td>12.000</td>
                        <td><select name="childbig3">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>16.000</td>
                        <td><select name="adultbig3">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>입장+놀이3종</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>자유이용권</td>
                        <td>21.000</td>
                        <td><select name="childfree">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>26.000</td>
                        <td><select name="adultfree">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>입장+놀이자유</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>연간이용권</td>
                        <td>70.000</td>
                        <td><select name="child1year">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>90.000</td>
                        <td><select name="adult1year">
                        <option value=0 selected>0</option>
                        <option value=1>1</option>
                        <option value=2>2</option>
                        <option value=3>3</option>
                    </select></td>
                        <td>입장+놀이자유</td>
                    </tr>
                </tbody>
            </table>
    </div>
       </form>
    
    
                <?php
                    if (isset($_POST['namw']) && strlen($_POST['namw']) > 0) {
                        if (isset($_POST['submit']) && $_POST['submit'] == "submit" ) {
                            $total = 0; // total 변수 연산
                            $total += $_POST['childticket']*7000;
                            $total += $_POST['childbig3']*12000;
                            $total += $_POST['childfree']*21000;
                            $total += $_POST['child1year']*70000;
                            $total += $_POST['adultticket']*10000;
                            $total += $_POST['adultbig3']*16000;
                            $total += $_POST['adultfree']*26000;
                            $total += $_POST['adult1year']*90000;
                            $sql =" INSERT INTO  `yes` ". 
                            "(`namw` , `childticket` , `adultticket` , `childbig3` , `adultbig3` , `childfree` , `adultfree` , `child1year`, `adult1year`, `total`)".
                            "VALUES ('$_POST[namw]',  '$_POST[childticket]',  '$_POST[adultticket]',  '$_POST[childbig3]',  '$_POST[adultbig3]',  '$_POST[childfree]', 
                                     '$_POST[adultfree]', '$_POST[child1year]', '$_POST[adult1year]','$total')";
                                     $ampm = date("a");
                                     $ampm_korean = ($ampm == 'am') ? '오전' : '오후';
                                     echo date("Y년 n월 j일") . " " . $ampm_korean . " " . date("g:i분");
                                     echo "<br>$_POST[namw] 고객님 감사합니다.";
                                     if($_POST['childticket'] > 0) {
                                         echo "<br> 어린이 입장권 ".$_POST['childticket']."매 ";
                                     }
                                     if($_POST['childbig3'] > 0) {
                                         echo "<br> 어린이 BIG3 ".$_POST['childbig3']."매 ";
                                     }
                                     if($_POST['childfree'] > 0) {
                                         echo "<br> 어린이 자유이용권 ".$_POST['childfree']."매 ";
                                     }
                                     if($_POST['child1year'] > 0) {
                                         echo "<br> 어린이 연간이용권 ".$_POST['child1year']."매 ";
                                     }
                                     if($_POST['adultticket'] > 0) {
                                         echo "<br> 어른 입장권 ".$_POST['adultticket']."매 ";
                                     }
                                     if($_POST['adultbig3'] > 0) {
                                         echo "<br> 어른 BIG3 ".$_POST['adultbig3']."매 ";
                                     }
                                     if($_POST['adultfree'] > 0) {
                                         echo "<br> 어른 자유이용권 ".$_POST['adultfree']."매 ";
                                     }
                                     if($_POST['adult1year'] > 0) {
                                         echo "<br> 어른 연간이용권 ".$_POST['adult1year']."매 ";
                                     }
                                     echo "<br>합계 {$total}원 입니다.";
                         }
                        mysqli_query($link,$sql);
                    }
                    else {
                        echo"성명을 입력해 주세요"; // 성명을 입력하지 않을시 출력되는 말 (코드 작동 x)
                    }
                ?>
    </div>
</body>
</html>
