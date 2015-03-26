<?php
class snag
{
    private $id;
    private $project_id;
    private $hours;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;
    
    public function __construct($config) {
        $reflector = new ReflectionClass('snag');
        $properties = $reflector->getProperties();
        foreach($properties as $property) {
            $name = $property->getName();
            if(isset($config[$name])) {
                $this->$name = $config[$name];
            }
        }
       // dd($properties);
    }
    
    public static function getSnagById(pdo $pdo, $id) {
        $id = intval($id);
        $sql = "select * from snags where id = {$id};";
        $result = $pdo->query($sql);
        if($result->rowCount($result) == 1) {
            return new snag($result->fetch());
        }
        
        return null;
    }
    
    public function toHTML() {
        $nl = "\r\n"; //New line character to make looking at HTML source easier
        echo "<h2>{$this->title}</h2>{$nl}";
        echo "Description: {$this->description}</br>{$nl}";
        echo "</br>{$nl}";
        echo "ID: {$this->id}</br>{$nl}";
    }
}