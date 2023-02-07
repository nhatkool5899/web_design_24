<?php

require('./mail/sendMail.php');


if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    if($name == "" || $email == ""){
        $alert = "Có lỗi xảy ra";
        return $alert;
    }else{

        $title = "Cảm ơn bạn đã quan tâm và liên hệ với chúng tôi";
        
        $noidung = '<p>Cảm ơn lời nhắn của bạn, chúng tôi sẽ phản hồi trong thời gian ngắn nhất</p>
                    <p>Thông tin của bạn:</p>
                    <table border="1">
                        <tr>
                            <th>Name</th>
                            <td>'.$name.'</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>'.$email.'</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>'.$phone.'</td>
                        </tr>
                        <tr>
                            <th>Message</th>
                            <td>'.$message.'</td>
                        </tr>
                    </table>
        ';
        
        $mail = new mailer();
        $mail->send_message($title, $name, $email, $noidung);

    }

}

?>