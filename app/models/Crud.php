<?php
    class Crud {

        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }

        // Add
        public function Add()
        {
            $ProductName = htmlspecialchars($_POST['ProductName']);
            $Price = htmlspecialchars($_POST['Price']);
            $Category = htmlspecialchars($_POST['Category']);

            $this->db->query("INSERT INTO api_mvc . products (ProductName, Price, Category) VALUES (:productName, :price, :category)");

            // Bind Values
            $this->db->bind(':productName', $ProductName);
            $this->db->bind(':price', $Price);
            $this->db->bind(':category', $Category);

            return $this->db->execute();
        }

        // Select
        public function selectProduct()
        {
            $this->db->query("SELECT * FROM api_mvc . products");
            return $this->db->resultSet();
        }

        // Delete
        public function delete($id)
        {
            $this->db->query("DELETE FROM api_mvc . products WHERE id = '$id' ");
            return $this->db->execute();
        }

        // Update
        public function update($id)
        {
            $ProductName_upd = htmlspecialchars($_POST['ProductName_upd']);
            $Price_upd = htmlspecialchars($_POST['Price_upd']);
            $Category_upd = htmlspecialchars($_POST['Category_upd']);

            $this->db->query("UPDATE api_mvc . products SET ProductName = :productname, Price = :price, Category = :category 
                              WHERE id = '$id' ");

            // Bind Values
            $this->db->bind(':productname', $ProductName_upd);
            $this->db->bind(':price', $Price_upd);
            $this->db->bind(':category', $Category_upd);

            return $this->db->execute();
        }

    }