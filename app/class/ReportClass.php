<?php
require_once '../app/core/pdoDatabse.php';

class ReportClass  extends PdoDatabse
{
    // Variables

    protected $pdo;
    /** @var object of the logged in user */
    private $user;
    /** @var string error msg */
    public $msg;
    /** @var int number of permitted wrong login attemps */
    private $permitedAttemps = 5;

    public function __construct()
    {
        parent::__construct();
    }


    public function make(array $data)
    {
        // print_r($data);exit;

        $pdo = $this->pdo;
        $stmt = $pdo->prepare('INSERT INTO reports (patient_id,patient_name,gender,weight, dob, problem, doctor, hospital, report_type,report_sub_type, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        try {
            if (!$stmt->execute([
                $data['patient_id'],
                $data['name'],
                $data['gender'],
                $data['weight'],
                $data['dob'],
                $data['problem'],
                $data['doctor'],
                $_SESSION['user']['id'],
                $data['report-type'],
                $data['x-ray'] ?? null,
                0,
            ])) throw new Exception("Something went wrong");
        } catch (Exception  $e) {
            die($e);
        }

        // Save report images
        $id = $pdo->lastInsertId();

        // return saved images name
        $dir = "./storage/reports/";
        $images = $this->uploadImagesTo($dir);

        foreach ($images as $image) {
            $stmt = $pdo->prepare('INSERT INTO images (name, name_id, image_of) VALUES (?, ?, ?)');
            $stmt->execute([$image, $id, "report"]);
        }

        return true;
    }


    public function getXrays()
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT * FROM xrays WHERE 1');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function all($for = 'created_at')
    {
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT r.*, d.name as doctor_name FROM reports as r,doctors as d WHERE r.'.$for.'=? AND r.doctor = d.id');
        $stmt->execute([$_SESSION['user']['id']]);
        return $stmt->fetchAll();
    }

    public function allNew($for = 'id!')
    {
        $id = ($for==1)?'0':$_SESSION['user']['id'];
        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT r.*, d.name as doctor_name FROM reports as r,doctors as d WHERE r.'.$for.'=? AND r.doctor = d.id AND r.status=0');
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    public function allDone($for = 'id!')
    {
        $id = ($for==1)?'0':$_SESSION['user']['id'];

        $pdo = $this->pdo;
        $stmt = $pdo->prepare('SELECT r.*, d.name as doctor_name FROM reports as r,doctors as d WHERE r.'.$for.'=? AND r.doctor = d.id AND r.status=1');
        $stmt->execute([$id]);
        
        return $stmt->fetchAll();
    }

    private function uploadImagesTo($dir)
    {
        $images = array();
        foreach ($_FILES['images']['name'] as $key => $image) {
            $errors = array();
            $file_ext = strtolower(end(explode('.', $_FILES['images']['name'][$key])));
            $file_name = time() * rand() . "." . $file_ext;
            array_push($images, $file_name);
            $file_size = $_FILES['images']['size'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $file_type = $_FILES['images']['type'][$key];


            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 4097152) {
                $errors[] = 'File size must be excately 4 MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $dir . $file_name);
                echo "Success";
            } else {
                die($errors);
            }
        }
        return $images;
    }
}
