<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class UploadModel extends Model{
        protected $table = 'ufiles';
        protected $primaryKey = 'dsc';
        protected $allowedFields = ['dsc', 'path'];
        protected $returnType = 'object';
    }
?>