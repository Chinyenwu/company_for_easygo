@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>系統資訊</h1>
            <?php 
            	  echo "作業系統:".php_uname();
            	  echo "<br>"; 
            	  echo "記憶體使用率:".memory_get_usage(); 
            	  echo "<br>";  
            	  echo "硬碟使用率:".(int)(100-100*(disk_free_space("/")/disk_total_space("/")));
            	  echo "<br>";
				  echo "使用瀏覽器版本:".$_SERVER['HTTP_USER_AGENT'];
				  //$browser = get_browser(null, true);
				  //print_r($browser);
            	  echo "<br>"; 
            	  echo "作業系統:".PHP_OS;
            ?>
        </div>
    </div>
</div>
@endsection