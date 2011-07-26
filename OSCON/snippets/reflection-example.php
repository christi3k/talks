<?php
include('/var/www/wordpress/wp-includes/widgets.php');
$reflector = new ReflectionClass('WP_Widget');

$methods = $reflector->getMethods();
foreach($methods as $method) {
    $method_names[] = $method->name;
}
echo "Methods: " . implode(', ', $method_names);
echo PHP_EOL . PHP_EOL;

$properties = $reflector->getProperties();
foreach($properties as $property) {
    $property_names[] = $property->name;
}
echo "Properties: " . implode(', ', $property_names);
echo PHP_EOL . PHP_EOL;

$parent = $reflector->getParentClass();
if(is_object($parent)) {
    echo "Parent Class: " . $parent->getName();
}
else {
    echo $reflector->getName() . " has no parent.";
}
echo PHP_EOL . PHP_EOL;

echo "Doc Comment: " . PHP_EOL . $reflector->getDocComment() . PHP_EOL;

?>
