<?php 
class Dao {
    private $con;

    // Corrected constructor name: __construct
    public function __construct($user, $pass, $db){
        $host = 'localhost'; // 'localhost' should be a string here, not $_SERVER['localhost']

        // Establishing the database connection
        $this->con = mysqli_connect($host, $user, $pass, $db);
    }

    public function query($sql){
        mysqli_query($this->con, "set names 'utf8'"); 
        $rs = mysqli_query($this->con, $sql);
        return $rs;
    }

    function table($sql, $header){ 
        $rs = $this->query($sql); 
        $fieldinfo = mysqli_fetch_fields($rs); 
        $str = "<table><tr>";

        foreach ($fieldinfo as $val) { 
            $name = $val->name; 
            $str .= "<th>" . $name . "</th>";
        } 

        $str .= "</tr>";

        while($r = mysqli_fetch_array($rs)){
            $str .= "<tr>";
            foreach ($fieldinfo as $val){ 
                $name = $val->name;
                $str .= "<td>" . $r[$name] . "</td>";
            } 
            $str .= "</tr>";
        }  

        $str .= "</table>";
        echo "<h3>{$header}</h3>";
        echo $str;
    }
}
?> 