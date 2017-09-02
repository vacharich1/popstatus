<?php
$access_token = 'W4sB4oWD7HpXgub7q/hkBXxjqeERSBRCehmMbJCSzjsH0umy/V93T5G0mN7tGtzq2cddAISUgS6ICjCHJnw0H/dyWn8NuAL2PzgaWx/wes9ycXZVy7LTn1XYCkuUss6kqe+efCRDWJgOl3ytJXFK/wdB04t89/1O/w1cDnyilFU=';

$host= "sql12.freemysqlhosting.net";
$db = "sql12175146";
$CHAR_SET = "charset=utf8"; 

$username = "sql12175146";    
$password = "YhyzMTpHep"; 
	

$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
}
else
{
	echo "connect";
}
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		//1: jayroom Ub5f45b12f0f8f8a3a08e5b52ebbcc96b
		$text = $event['message']['text'];
		//1: pop jay test C90392ece5d6b6e69b8a2619e36e018f6
		//1: pop status C7eb1d9d359ca234aa91de883c1fe2a4a
		//2: pop room3 Cd79d1bc113f459056f31193db6b5b321
		if($event['source']['groupId'] == 'Cb6942ed51d87f590d8c289478f4b517d' || $event['source']['groupId'] == 'C90392ece5d6b6e69b8a2619e36e018f6' || $event['source']['groupId'] == 'C7eb1d9d359ca234aa91de883c1fe2a4a' || $event['source']['groupId'] == 'Cebf06fc279e81c0f80518bbcd5c03067' || $event['source']['groupId'] == 'Cb07e6ef503794c6e9a7fb0fedb324b07' || $event['source']['groupId'] == 'Cd79d1bc113f459056f31193db6b5b321')
		{
			// Reply only when message sent is in 'text' format
				if ($event['type'] == 'message' && $event['message']['type'] == 'text') 
				{
						// Get text sent
						$text1 = $event['message']['text'];
						
						$text = strtoupper($text1);
						if($text=="#S & J" || $text=="#s & J")
						{
							$text="#S&J";
						}
						$arr1 = str_split($text);
						if($arr1[0] == "#")
						{
							$textcut = explode(" ", $text);
							$result = count($textcut);
							if($result <= 1)
							{
								$hoonname = substr($text, 1); // cut@
								if($event['source']['userId'] == 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b')
								{
									$room='Cb6942ed51d87f590d8c289478f4b517d';
								}
								else
								{
									$room=$event['source']['groupId'];
								}
								if(preg_match("/^[a-zA-Z&0-9-]+$/", $hoonname) == 1) 
								{
									if($hoonname!="S50H17" && $hoonname!="S50M17" && $hoonname!="S50U17")
									{
										$sql = "INSERT INTO hoon_check (id, hoonname, room)
												VALUES ('', '$hoonname', '$room')";
												
										if (mysqli_query($link, $sql)) {
												echo "New record created successfully";
										} 
										else {
												echo "Error: " . $sql . "<br>" . mysqli_error($link);
										}
										sleep(0.3);
										$check ="check1";
										#echo "work code";
										$sql = "INSERT INTO `check_capture`(`id`, `check1`) VALUES ('','$check')";
										if (mysqli_query($link, $sql)) {
												echo "New record created successfully";
										} 
										else {
												echo "Error: " . $sql . "<br>" . mysqli_error($link);
										}
									}
									
									#sleep(10);
									#$messages556 = ['type' => 'image',
									#			   'originalContentUrl' => 'https://newsistatus.com/test.png',
									#			   'previewImageUrl' => 'https://newsistatus.com/test.png'
																				 
									#];
									
									#$replyToken = $event['replyToken'];
									
									#$url = 'https://api.line.me/v2/bot/message/reply';
									#$data = [
									#	'replyToken' => $replyToken,
									#	'messages' => [$messages556]
									#];
									#$post = json_encode($data);
									#$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
						#
									#$ch = curl_init($url);
									#curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
									#curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									#curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
									#curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
									#curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
									#$result = curl_exec($ch);
									#curl_close($ch);	
								}					
							}
						}
						else
						{
								if($text == '@@addroombyjay')
								{
										$replyToken = $event['replyToken'];
										$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
										// Make a POST Request to Messaging API to reply to sender
										$url = 'https://api.line.me/v2/bot/message/reply';
										$data = [
													'replyToken' => $replyToken,
													'messages' => [$messages55]
												];
										$post = json_encode($data);
										$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
												
										$ch = curl_init($url);
										curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
										curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
										curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
										curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
										$result = curl_exec($ch);
										curl_close($ch);
								}	
							
							
						}
					
				}
		}
		else
		{
			if($text == '##addroombyjay')
			{
					$replyToken = $event['replyToken'];
					$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages55]
							];
					$post = json_encode($data);
					$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
							
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					$result = curl_exec($ch);
					curl_close($ch);
			}	
		}
	}//foreach
}//if(!is_null)
echo "OK";