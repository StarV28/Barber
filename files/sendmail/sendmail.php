<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'web.product.studio@gmail';                     //SMTP username
	$mail->Password   = 'cpwy oegj mkxz ajul';                               //SMTP password
	$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
	$mail->Port       = 587;                 
	

	//Від кого лист
	$mail->setFrom('from@gmail.com', 'Barber Shop'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('web.product.studio@gmail'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'Letter for User"';
  $userNumber = $_POST['phone'] ?? '';
  $userNumber = $_POST['email'] ?? '';

	//Тіло листа
	$body = '<h1>Hello</h1>';
  $body.= '<p>Phone: '. $userNumber. '</p>';
  $body.= '<p>Email: '. $userEmail. '</p>';
	//if(trim(!empty($_POST['email']))){
		//$body.=$_POST['email'];
	//}	
	
	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Помилка';
	} else {
		$message = 'Дані надіслані!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>