<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $con = mysql_connect("localhost", "root") or die(mysql_error());
if ($con) {
    $db = mysql_select_db("doctor_diary") or die(mysql_error());
}
if (count($_POST)) {
    if ($_POST['btnSave'] == "submit") {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $sql = "update student set name= '" . $_POST['txtName']."', age = '".$_POST['txtAge']."' where id=". $_GET['id'];
        } else {
            $sql = "insert into student (name, age) values ('" . $_POST['txtName'] . "','" . $_POST['txtAge'] . "')";
        }
        $res = mysql_query($sql);

        if ($res) {
            header("Location: dbstudent.php");
            exit;
        }
    }
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $sql = "DELETE FROM student where id= " . $_GET['id'];
        $result = mysql_query($sql);
        
        header("Location: dbstudent.php");
        exit;
    }
    else
    {
        $sql = "SELECT * FROM student where id= " . $_GET['id'];    
        $result = mysql_query($sql);
        $stdData = mysql_fetch_assoc($result);
    }
}
?>
<html>
    <body>
        <form name="frmStudent" id="frmStudent" method="post" action="">

            <table>
                <tr>
                    <td>
                        Student Name :
                    </td>
                    <td>
                        <input type="text" name="txtName" id="txtName" value="<?php echo isset($stdData['name'])? $stdData['name'] : ''; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Age :
                    </td>
                    <td>
                        <input type="text" name="txtAge" id="txtAge" value="<?php echo isset($stdData['age'])? $stdData['age'] : ''; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                    <td>
                        <input type="submit" name="btnSave" id="btnSave" value="Save" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
