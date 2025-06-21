<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function home()
    {
        // echo "gfg";die;
        $data['title'] = "Home";
        $this->load->view('templates/header', $data);
        $this->load->view('web/index');
        $this->load->view('templates/footer');
    }

    public function about()
    {
         $this->load->helper('url');
        $data['title'] = "About";
        $this->load->view('templates/header', $data);
        $this->load->view('web/about');
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        if(isset($_POST) && !empty($_POST)){
                            $data = [
                                'name'     => isset($_POST['name']) && $_POST['name']!=""?$_POST['name']:'',
                                'mobileNo' => isset($_POST['mobileNo']) && $_POST['mobileNo']!=""?$_POST['mobileNo']:'',
                                'company'  => isset($_POST['company']) && $_POST['company']!=""?$_POST['company']:'',
                                'email'    => isset($_POST['email']) && $_POST['email']!=""?$_POST['email']:'',
                            ];
                            $email=isset($_POST['email']) && $_POST['email']!=""?$_POST['email']:'';
                            $to      = $email; // 🔁 Replace with your email address
                            $subject = "New Enquiry Received";

                            $headers  = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                            $headers .= "From: no-reply@example.com" . "\r\n"; // Optional reply-to or sender info

                            $message = "
                            <html>
                            <head>
                            <title>New Enquiry Received</title>
                            <style>
                                body { font-family: Arial, sans-serif; line-height: 1.6; background: #f9f9f9; color: #333; }
                                .container { background: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: 20px auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
                                .header { font-size: 20px; font-weight: bold; margin-bottom: 10px; color: #2c3e50; }
                                .row { margin-bottom: 8px; }
                                .label { font-weight: bold; width: 100px; display: inline-block; }
                            </style>
                            </head>
                            <body>
                            <div class='container'>
                                <div class='header'>New Enquiry Details</div>
                                <div class='row'><span class='label'>Name:</span> {$data['name']}</div>
                                <div class='row'><span class='label'>Email:</span> {$data['email']}</div>
                                <div class='row'><span class='label'>Mobile:</span> {$data['mobileNo']}</div>
                                <div class='row'><span class='label'>Company:</span> {$data['company']}</div>
                                <br>
                                <div>Thank you for checking your enquiry inbox!</div>
                            </div>
                            </body>
                            </html>
                            ";

                        // Send the email
                        if (mail($to, $subject, $message, $headers)) {
                            echo "Enquiry email sent successfully.";
                        } else {
                            echo "Failed to send enquiry email.";
                        }

                }
                $data['title'] = "Contact";
                $this->load->view('templates/header', $data);
                $this->load->view('web/contact-us');
                $this->load->view('templates/footer');
    }
}
