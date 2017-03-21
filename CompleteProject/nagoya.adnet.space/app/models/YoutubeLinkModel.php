<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/8/2017
 * Time: 9:08 AM
 */
include_once(dirname(__FILE__) . '/Model.php');

class YoutubeLinkModel extends Model
{
    protected $db;
    public function __construct(){
        parent::__construct();
    }

    public static function tableName()
    {
        return 'youtube_link';
    }
    public function getLastRecord()
    {
        $querySelect = "SELECT * FROM " . YoutubeLinkModel::tableName() . " ORDER BY created_at DESC limit 1";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function convertYoutube($string) {
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $string, $matches);
        return $matches[1];
    }
}