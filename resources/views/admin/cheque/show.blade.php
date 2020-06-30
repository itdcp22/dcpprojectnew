
<?php 

define("MAJOR", 'And');
define("MINOR", ' Baisa Only');
class toWords  {
          var $pounds;
          var $pence;
          var $major;
          var $minor;
          var $words = '';
          var $number;
          var $magind;
          var $units = array('','One','Two','Three','Four','Five','Six','Seven','Eight','Nine');
          var $teens = array('Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen','Seventeen','Eighteen','Nineteen');
          var $tens = array('','Ten','Twenty','Thirty','Forty','Fifty','Sixty','Seventy','Eighty','Ninety');
          var $mag = array('','Thousand','Million','Billion','Trillion');
   function toWords($amount, $major=MAJOR, $minor=MINOR) {
            $this->major = $major;
            $this->minor = $minor;
            $this->number = number_format($amount,3);
            list($this->pounds,$this->pence) = explode('.',$this->number);
            $this->words = " $this->major $this->pence$this->minor";
            if ($this->pounds==0)
                $this->words = "Zero $this->words";
            else {
                $groups = explode(',',$this->pounds);
                $groups = array_reverse($groups);
                for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
                     if (($this->magind==1)&&(strpos($this->words,'Hundred') === false)&&($groups[0]!='000'))
                          $this->words = ' And ' . $this->words;
                     $this->words = $this->_build($groups[$this->magind]).$this->words;
                }
            }
   }
   function _build($n) {
            $res = '';
            $na = str_pad("$n",3,"0",STR_PAD_LEFT);
            if ($na == '000') return '';
            if ($na{0} != 0)
                $res = ' '.$this->units[$na{0}] . ' Hundred';
            if (($na{1}=='0')&&($na{2}=='0'))
                 return $res . ' ' . $this->mag[$this->magind];
            $res .= $res==''? '' : '';
            $t = (int)$na{1}; $u = (int)$na{2};
            switch ($t) {
                    case 0: $res .= ' ' . $this->units[$u]; break;
                    case 1: $res .= ' ' . $this->teens[$u]; break;
                    default:$res .= ' ' . $this->tens[$t] . ' ' . $this->units[$u] ; break;
            }
            $res .= ' ' . $this->mag[$this->magind];
            return $res;
   }
}

?>


@extends('layouts.admin')
@section('content')





<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<script>
    function myFunction() {
      window.print();

      
    }
    </script>


   

    <section class="content">
      <div class="container-fluid">
     <form  class="needs-validation" novalidate method = "post" action="{{ route('admin.cheque.store') }}" 
     enctype="multipart/form-data" autocomplete="off">
     <input type="hidden" name="_token" value = "{{ csrf_token() }}">
     <div class="form-group">

  

     

    


             
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <label> {{ $cheque->chq_date}}</label> 
                </div>              
            </div>

            <div class="row">             
                <div class="col-lg">  
                    <label> {{ $cheque->name}}</label>  
                </div>
            </div>

            <div class="row">             
                <div class="col-lg">  
                    <label> {{ 

                      
                    

    

                    
                    

                    
                    
                    }}
                    
                    <?php 


                    
                    
                    ?>
                  
                  </label>  

                    

                </div>
            </div>
            
          </div>
                
         

   
                      

                    

     

     




     

      <div class="form-group">
     
        <a onclick="myFunction()" class="btn btn-success btn-sm">Print</a>
        
        </div>
   


     </form>
      </div>
    </section>
@endsection