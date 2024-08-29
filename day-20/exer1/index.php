<?php 
abstract class lists{
    private string $style;
    abstract public function __construct($style);
    abstract public function closeList();
    public function setStyle($style){
        $this->style = $style;
    }
    public function addElement($data){
        echo "<li>$data</li>";
    }
    public function addElements(array $data){
        foreach($data as $element)
            echo "<li>$element</li>";
    }
    
}
class unorderedList extends lists{
    public function __construct($style = 'disc'){
        echo "<ul style='list-style-type:$style;'>";
    }   
    public function closeList(){
        
        echo "</ul>";
    }
}
class orderedList extends lists{
    public function __construct($style = 'decimal')
    {
        echo "<ol style='list-style-type:$style;'>";
    }   
    public function closeList(){
        
        echo "</ol>";
    }
}
$list1 = new orderedList();
$list1->addElement("test");
$list1->addElement("test");
$list1->addElement("test");
$list1->closeList();
$list2 = new unorderedList('square');
$list2->addElements(array("test",'test'));
$list2->closeList();
