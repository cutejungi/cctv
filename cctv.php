# After install MOTION
# and open PORT 8081, 8082
# input command -> service motion start
# and then, input web address -> http:localhost/html/test.php
# localhost = ip address 
# confirm localhost = input command -> ifconfig
# write by Jeon Min Sung

<html>
<body>
<hr/>
<span>CCTV Real time</span><br/>
<img src="http://192.168.1.35:8081/"</img>
<br/>
<script>
function show() {
    var x = document.getElementById("capture_list");
        if(x.style.display=="block"){
                x.style.display="none";
        }else{
                x.style.display="block";
        }
}
</script>

</body>
</html>
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
exec("ls /var/www/html/image",$result);
echo "<br/>";
echo "<hr/>";
echo "<button onClick='show()' >Show List</button><br/>";
echo "<div id='capture_list' style='overflow-y:scroll; display:none; width:400px; height:300px;'>";
echo "<span>Captured Image List </span><br/>";
while(list($key,$val)=each($result))
{
        if(strpos($val,".jpg"))
        {

                echo "<a href='javascript:void(0)' onclick=\"this.innerHTML=(this.nextSibling.style.display=='none')?'close':'open';this.nextSibling.style.display=(this.nextSibling.style.display=='none')?'block':'none'\";>".$val." image view</a><DIV style='display:none'>
<img src='/html/image/".$val."'>
</DIV>";

                #echo $val;
                #echo '<img src="/html/image/'.$val.'"><br/>';
                echo "<br/>";
        }
}
echo "</div>";
?>

