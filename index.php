<!DOCTYPE html>
<html>
<body>

<?php
class A{
    public function __construct($a){
        $this->a = $a;
    }
    public function get_a(){
        return $this->a;
    }
}
class B{
    public function __construct($a){
        $this->a = $a;
        $this->b = $this->a->get_a();

    }
    public function get_b(){
        return $this->b;
    }
}
$pass = new A(1);
$A = new B($pass->get_a());
echo $A->get_b();
echo "Hello"
?>

</body>
</html>
