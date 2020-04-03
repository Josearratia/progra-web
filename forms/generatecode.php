<?php 


class unicodeuser{
    public function generatecode($n) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $endcharacters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
        $randomString = ''; 
        $endchart = '';
      
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
        
        for ($i = 0; $i < 1; $i++) { 
            $index = rand(0, strlen($endcharacters) - 1); 
            $endchart .= $endcharacters[$index]; 
        } 
        $randomString .= '-' . $endchart;
        
        return $randomString; 
    }

    public function generatelong(){ 
        
        $endcharacters = '456789';   
        $endchart = '';

        for ($i = 0; $i < 1; $i++) { 
            $index = rand(0, strlen($endcharacters) - 1); 
            $endchart = $endcharacters[$index]; 
        } 

        return $endchart;
    } 
}

?>