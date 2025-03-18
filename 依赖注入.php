<?php 
class Mailer {
    public function sendEmail($email, $message) {
        echo "Sending email to $email: $message\n";
    }
}

class UserService {
    private $mailer;

    public function __construct(Mailer $mailer) {
        $this->mailer = $mailer;
    }

    public function notifyUser($email) {
        $this->mailer->sendEmail($email, "Welcome to our platform!");
    }
}

$mailer = new Mailer();
$userService = new UserService($mailer);
$userService->notifyUser("user@example.com");
