<?php

class TemplateEngine {

    public function createFile(HotBeverage $drink)
    {
        $content = file_get_contents("template.html");

        $reflection = new ReflectionClass($drink);
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) 
        {
            if (str_starts_with($method->getName(), 'get')) 
            {
                $key = substr($method->getName(), 3);
                if (strtolower($key) === 'name') 
                    $key = 'nom';
                else
                    $key = strtolower($key);

                $value = $method->invoke($drink);
                $content = str_replace('{' . $key . '}', $value, $content);
            }
        }
        file_put_contents($reflection->getShortName() . ".html", $content);
    }
}

?>