<?php
$checkArray=array();
array_push(($checkArray),"Hello","World,", "this", "is", "with", "HNGi7","ID","and" ,"email" , "using", "for" ,"stage" ,"2" ,"task");
foreach(glob('scripts/*.js')as $filename){
  $r=shell_exec("node $filename");
$array[$filename]=$r;
}

foreach(glob('scripts/*.py')as $filename){
  $r=shell_exec("python $filename");
  $array[$filename]=$r;
}
$jsonarray=array();
foreach($array as $key=>$value)
{
  // Hello World, this is somto with HNGi7 ID HNG-04817 and email somto@gmail.com using Python for stage 2 task
$x=explode(" ",$value);
$length=sizeof($x);
$m=0;
$name="";
$id="";
$email="";
$lang="";
$f=explode("/",$key);
$file=$f[1];
$res=0;
$output="$array[$key]";
for($i=0;$i<$length;$i++)
{
	if($x[$i]==$checkArray[$m])
	{
		
		$m++;$res++;
	}
	else if($m==4)
	{
		$name=$name.$x[$i];
	}
	else if($m==7)
	{
		$id=$x[$i];
	}
	else if($m==9)
	{
		$email=$x[$i];
	}
	else if($m==10)
	{
		$lang=$x[$i];
	}


}
$status="Fail";
//echo "<pre>$res</pre>";
if($res==13)
{
$status="Pass";
}
 
$newarray=array("file"=> "$file","output"=> "$output","name"=>"$name","id"=> "$id","email"=> "$email","language"=> "$lang","status"=> "$status");

array_push(($jsonarray),$newarray);

}
$myJSON = json_encode($jsonarray);
echo $myJSON;
?>
