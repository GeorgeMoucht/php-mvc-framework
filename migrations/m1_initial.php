<?php
//Each migration class is required to have up() and down() method.


class m1_initial {

    public function up()
    {
        $db = \app\core\Application::$app->db;
        
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(512) NOT NULL,
                country VARCHAR(255) NULL DEFAULT '',
                city VARCHAR(255) NULL DEFAULT '',
                interests VARCHAR(255) NULL DEFAULT '',
                status TINYINT DEFAULT 0,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB;";

        $db->pdo->exec($SQL);

    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}

?>