<?php

namespace app\core;

// https://github.com/vlucas/phpdotenv Need to download this package. It is a cool lib that
// let you have your db credentials secret with an easy way.

class Database
{

    public \PDO $pdo;

    public function __construct(array $config)
    {

        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn,$user,$password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);  //If we have any connection problem, throw an exception.
    }

    //Method to read all migrations one by one.
    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];    //Array to store migrations that done and push them to database, so in next migration don't be executed
        $files = scandir(Application::$ROOT_DIR.'/migrations'); //Array of all files inside migrations directory
        $toApplyMigrations = array_diff($files , $appliedMigrations); //from files array substract all already apliedMigrations
        
        //Iterate through migrations to be applied.
        foreach ($toApplyMigrations as $migration)
        {
            // $migration variable contain the file name of the migration. (ex. m1_initial.php / m2_.../m3_...)
            if($migration === '.' || $migration === '..' || $migration === 'README.md')
            {
                continue;
            }

            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            //Explain of $className:
                //By using the pathinfo function with attribute of PATHINFO_FILENAME,
                //we seperate the extension ".php" from migration filename.
                //For Example:
                    //if the $migration is equal with m1_initial.php, the $className will be m1_initial 
                    // (without the extension ".php").
            $className = pathinfo($migration , PATHINFO_FILENAME);
       
            //creating class instance of $className
            $instance = new $className();
            $this->log("Appling migration $migration");     // echo "Applying migration $migration".PHP_EOL;
            $instance->up();
            $this->log("Applied migration $migration");
            $newMigrations[] = $migration;                  // echo "Applyed migration $migration".PHP_EOL;
        }

        if(!empty($newMigrations))
        {
            $this->saveMigrations($newMigrations);
        }
        else    //$newMigrations array is empty. That means we don't have any new migrations to apply into database
        {
            $this->log("All migrations are aplied already");    //echo message
        }

    }

    //create Migrations table. If the table is alread created then skip this execution step
    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }

    // Return all applied migrations
    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();
        
        return $statement->fetchAll(\PDO::FETCH_COLUMN);    // fetch every migration column as a single dimensional array.
    }

    public function saveMigrations(array $migrations)
    {

        $str = implode(",",array_map(fn($m) => "('$m')" , $migrations));
        //Migrations table contain the file names of migrations that have been already generated.
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES
            $str
        ");
    
        $statement->execute();
    }

    public function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }

    // Echo to console information about migrations when happend.
    protected function log($message)
    {
        echo '['.date('Y-m-d H:i:s').'] - '.$message.PHP_EOL;
    }
}

?>