<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    require_once __DIR__ . '/vendor/autoload.php';
    use Twilio\Rest\Client;
	use Twilio\Exceptions\TwilioException;
    $late = null;
    $absent = null;
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if (isset($_POST['late_mobile_numbers'])){
	    $late = json_decode($_POST['late_mobile_numbers'], true);
	}

	if (isset($_POST['absent_mobile_numbers'])){
	    $absent = json_decode($_POST['absent_mobile_numbers'], true);
	}

    $sid    = $_ENV['SID'];
    $token  = $_ENV['TOKEN'];
    $notify_sid = $_ENV['TWILIO_NOTIFY_SID'];
	$sender = $_ENV['SENDER'];
    $twilio = new Client($sid, $token);

    if($late != null){
		$late_recipents = [];

		foreach($late as $key => $value) {
			$phone_number = preg_replace('/^0/','+63',$value);
			try {
			$message = $twilio->messages
						->create($phone_number,
						array(
							"from" => $sender,
							"body" => "Good day, ".$key.", We are informing you for your consecutive lates."
						));
			}
			catch (TwilioException $e) {
				break;
			}
		}
	}


	if($absent != null){

		foreach($absent as $key => $value) {
			$phone_number = preg_replace('/^0/','+63',$value);
			try {
			$message = $twilio->messages
					  ->create($phone_number,
						array(
						  "from" => $sender,
						  "body" => "Good day, ".$key.", We are informing you for your consecutive absents."

						)
			  );
			}
			catch (TwilioException $e) {
				break;
			}
		}
	}

	echo 1;


?>