# Minecraft-UUID-Utils
Minecraft UUID Utils

example.php

```php
<?php
require_once('Minecraft-UUID-Utils.php');

echo "UUID: ".getUUID("The_Defman")."<br>";

/* 
 * Output:
 * 
 * 85b99109-67f8-4397-b25b-55b1167b6441
 */
echo "Username: ".getUsername("85b99109-67f8-4397-b25b-55b1167b6441")."<br>";

/* 
 * Output:
 * 
 * The_Defman
 */ 
?>
```