<?php
//client's token. (key)
if ($_GET['key'])
{
    $key = $_GET['key'];
}
// Server key from Firebase Console
define( 'API_ACCESS_KEY', 'AAAAlHKlaCE:AP_________edit this to your server key___________F1no1E3CxL6ndqrsNb9YHx_ghkzQ-NdXkojLf9Ap9mu' );
$data = array("to" => $key,
              "notification" => array( "title" => "Anomoz", "body" => "A place for anonymous chatting.","icon" => "../profiles/p1.jpg", "click_action" => "https://Anomoz.com"));                                                                    
$data_string = json_encode($data); 
echo "The Json Data : ".$data_string; 
$headers = array
(
     'Authorization: key=' . API_ACCESS_KEY, 
     'Content-Type: application/json'
);                                                                                 
$ch = curl_init();  
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );                                                                  
curl_setopt( $ch,CURLOPT_POST, true );  
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
$result = curl_exec($ch);
curl_close ($ch);
echo "<p>&nbsp;</p>";
echo "The Result : ".$result;
?>
