<?php
require_once __DIR__ . "/../../config/config.php";
class Model
{
    private $db;
    private $view;
    public function __construct($view)
    {
        $this->view = $view;
        $this->db = $this->createDB(CFG);
    }

    private function createDB($cfg)
    {
        $server = $cfg['server'];
        $db = $cfg['db'];
        $user = $cfg['user'];
        $pw = $cfg['pw'];

        try {
            //if we needed to set port it would come after $SERVER;port=3307;dbname=$DB
            $conn = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pw);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //we would deal with broken connection here
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }

        return $conn;

    }

    public function processData($incoming = null)
    {
        //process incoming
        $data = []; //empty array init
        switch ($incoming['operation']) {
            case "get":
                $data = $this->processGet($incoming);
                break;
        }
        //model
        $this->view->render($data);
    }

    private function processGet($incoming)
    {
        $data = [
            "state" => "loggedin", //TODO actually log in
            "user" => "valdis", //TODO get from Session
            "id" => 5,
            "tracks" => $this->getSongs(),
        ];
        return $data;
    }

    //TODO add actual user id
    private function getSongs()
    {
        $stmt = $this->db->prepare("SELECT * FROM tracks");
        //TODO add filter by user id WHERE (user_id = :user_id)");
        //$stmt->bindParam(':user_id', $_SESSION['id']);
        $stmt->execute();
        $isFetchModeSet = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //we store the results in memory, might not be best for large results
        $allRows = $stmt->fetchAll();
        return $allRows;
    }
}
