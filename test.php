<?php

class DB{

    public function insert_data($servername,$username,$pasword,$dbname,$login,$password){
        $conn = new mysqli($servername, $username, $pasword,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Test(login,password)
        VALUES('$login','$password')";
        if ($conn->query($sql) === TRUE) {
            return "New account succesfully created";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

    }
    public function select_data($servername,$username,$pasword,$dbname,$login,$password)
    {
        $conn = new mysqli($servername, $username, $pasword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, login, password FROM Test WHERE login='$login' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return "<a href='info.php'>You are welcome</a>";
            }
        } else {
            return "No such user";
        }
    }
    public function update_data($servername,$username,$pasword,$dbname,$login,$password,$list){
        $conn = new mysqli($servername, $username, $pasword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE Test SET list='$list' WHERE login='$login'AND password='$password'";

        if ($conn->query($sql)==True){
            return "Added";
        }
        else{
            return "Error adding record:".$conn->error;
        }

    }
    public function select_data_lst($servername,$username,$pasword,$dbname,$login,$password)
    {
        $conn = new mysqli($servername, $username, $pasword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT list FROM Test WHERE login='$login' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row["list"];
            }
        } else {
            return "No such user";
        }
    }
    public function insert_data_lst($servername,$username,$pasword,$dbname,$login,$password,$list){
        $conn = new mysqli($servername, $username, $pasword,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Test(login,password,list)
        VALUES('$login','$password','$list')";
        if ($conn->query($sql) === TRUE) {
            return "New account succesfully created";
        } else {
            return "Error: " . $sql . "<br>" . $conn->error;
        }

    }
}
#$a = new DB();
#$a->insert_data("localhost","username","password","Test","Hello","World");
#$a->select_data("localhost","username","password","Test","Github","Kek");
?>