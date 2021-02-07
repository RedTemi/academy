<?php
$dsn = 'mysql:dbname=pharmaca_data;host=localhost:3306';
$user = 'pharmaca_bread';
$password = '~~[cr[0rI+n=';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOException $e) {
    echo 'pdo conn err:- ' . $e->getMessage();
}
class Auth
{
    public $attempts = 0;
    public function login(string $email, string $password)
    {
        global $dbh;
        $stmt = $dbh->prepare("select * from users where email = ?");
        $stmt->execute([$email]);
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        if ($return->xxc) {
            if (password_verify($password, $return->password)) {
                $data = json_encode($return);
                echo $data;
                return true;
            } else {
                
                return false;
            }
        } else {
            if (password_verify($password, $return->password)) {
                $_SESSION['email'] = $return->email;
                $_SESSION['fullname'] = $return->name;
                $_SESSION['PNumber'] = $return->phone;
                $_SESSION['Address'] = $return->address;
                $_SESSION['id'] = $return->id;
                return true;
            } else {
                return false;
            }
        }
    }
    public function checkEmail($email)
    {
        global $dbh;
        $stmt = $dbh->prepare("select * from users where email = ?");
        $stmt->execute([$email]);
        $return = $stmt->rowCount();
        if($return<0){
            return true;
        }else{
            return false;
        }
    }
    public function logout()
    {   
        session_unset();
        session_destroy();
    }
} 
class User
{
    public  $fname;
    public  $lname;
    public  $email;
    public  $phone;
    public  $password;
    public  $is_pharm;
    public  $pcn;
    public  $psn;
    public  $acpn;
    public  $status;
    public  $workplace;
   public function __construct($f,$l,$e,$p,$pw,$is_ph,$pcn,$psn,$acpn,$status,$work)
   {
       $this->fname = $f;
       $this->lname = $l;
       $this->email = $e;
       $this->phone = $p;
       $this->password = password_hash($pw,PASSWORD_BCRYPT);
       $this->is_pharm = $is_ph;
       $this->pcn = $pcn;
       $this->psn = $psn;
       $this->acpn = $acpn;
       $this->status = $status;
       $this->workplace = $work;
   }
}
class Register{
    
    public function registerx(User $user)
    {
        global $dbh;
        $stmt = $dbh->prepare("INSERT INTO users() values ?");
        return $stmt->execute((array)$user)? true:false;
    }
}
class Webinar{
    public function newWebinar(string $shortname,string $name,string $description,$time,$image,$color,$target)
    {
        global $dbh;
        $stmt = $dbh->prepare("insert into INTO 
        webinar_data(name, description, short, webinar_banner, webinar_time, webinar_target, color) 
        VALUES(?,?,?,?,?,?,?,?)");
        $stmt->execute([$name,$description,$shortname,$image,$time,$target,$color]);
    }
    public function webinarDelivery($params = null){
        global $dbh;
        $stmt = $dbh->prepare('select * from webinar_data');
        $stmt->execute();
        $toSend = json_encode($stmt->fetchAll(PDO::FETCH_OBJ));
        echo $toSend;
    }
    public function checkWebinar_data($userid){
        global $dbh;
        $stmt = $dbh->prepare("select webinars from users where id = ?");
        $stmt->execute([$userid]);
        $data = array();
        $stmt1 = $dbh->prepare("select * from webinars where id in ?");
        $stmt1->execute([$stmt->fetch()]);
        while($row = $stmt->fetchAll(PDO::FETCH_OBJ)){
            array_push($data,$row);
        }
        return json_encode($data);
    }
}
