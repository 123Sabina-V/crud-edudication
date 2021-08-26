<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function get(){
        echo 'get';
    }
    public function create(){
        echo 'create';
    }
    public function addEmploye(){
        echo 'addEmployee';
    }
    public function removeEmploye(){
        echo 'removeEmploye';
    }
    public function update(){
        echo 'update';
    }
    public function status(){
        echo 'status';
    }
    public function delete(){
        echo 'delete';
    }
}
