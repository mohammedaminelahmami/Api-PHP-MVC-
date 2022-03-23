<?php 
    class Crudcontroller extends Controller {

        public function __construct()
        {
            $this->CrudModel = $this->model('Crud');
        }

        public function Add()
        {
            return $this->CrudModel->Add();
        }

        public function select()
        {
            $data = $this->CrudModel->selectProduct();
            echo json_encode($data);
        }

        public function delete()
        {
            $id = $_GET['id'];
            $this->CrudModel->delete($id);
        }

        public function update()
        {
            $id = $_GET['id'];
            $this->CrudModel->update($id);
        }
        
    }