<?php
    // ใช้กับ Blade composer.json -> autoload
    function date_only($date=null){
        if ($date!=null) {
        
          $y = substr($date, 0, 10);
      
          return $y; 
        }else{
            return '-';
        }
    }

