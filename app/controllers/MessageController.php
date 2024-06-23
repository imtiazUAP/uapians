<?php

require_once BASE_DIR . '/app/controllers/BaseController.php';
require_once BASE_DIR . '/app/helpers/dbConnect.php';
require_once BASE_DIR . '/app/models/Message.php';
require_once BASE_DIR . '/app/config/config.php';

class MessageController extends BaseController
{
    public function messageListAdmin($queryParams)
    {
        $messages = Message::getAdminMessages();

        $data = compact('messages');
        $this->render(
            'message/admin-messages.php',
            $data
        );
    }

    public function messageListPersonal($queryParams)
    {
        $receiverId = !empty($queryParams['receiver_user_id']) ? $queryParams['receiver_user_id'] : 0;
        $messages = Message::getPersonalMessages($receiverId);

        $data = compact('messages');
        $this->render(
            'message/personal-messages.php',
            $data
        );
    }

    public function composeMessage($queryParams)
    {
        $this->render(
            'message/compose.php',
            []
        );
    }

    public function sendMessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'sender_user_id' => $_POST['sender_user_id'],
                'receiver_user_id' => $_POST['receiver_user_id'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'admin_message' => $_POST['admin_message'],
            ];

            $success = Message::sendMessage($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/message/compose?message=Message+Sent+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/message/compose?message=Message+Sending+Failed');
            }
            exit();
        }
    }

    public function deleteConfirm($queryParams) {
        $message = Message::getMessageByMessageId($queryParams['message_id']);
        $this->render(
            'message/delete.php',
            compact('message'),
            false
        );

    }
    

    public function deleteExecute()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'message_id' => $_POST['message_id']
            ];

            $success = Message::deleteMessage($data);

            if ($success) {
                header('Location: ' . BASE_URL . '/message/delete-confirm?CID=' . $data['message_id'] . '&message=Message+Deleted+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/message/delete-confirm?CID=' . $data['message_id'] . '&message=Message+Delete+Failed');
            }
            exit();
        }
    }

    public function composeMail($queryParams)
    {
        $receiverGroups = Message::getEmailReceiverGroups();
        $this->render(
            'message/compose-mail.php',
            compact('receiverGroups'),
        );
    }

    public function sendMail()
    {
        $receiversGroupId = $_POST["receiver_group_id"];
        $receivers = Message::getReceiversByGroupId($receiversGroupId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $flgSend = false;
            foreach ($receivers as $receiver) {
                $mailTo = $receiver['email'];
                $strSubject = $_POST["txtSubject"];
                $strMessage = nl2br($_POST["txtDescription"]);
                //*** Uniqid Session ***//
                $strSid = md5(uniqid(time()));
                $strHeader = "";
                $strHeader .= "From: " . $_POST["txtFormName"] . "<" . $_POST["from_email"] . ">\nReply-To: " . $_POST["from_email"] . "" . "X-Mailer: PHP/" . phpversion();
                $strHeader .= "MIME-Version: 1.0\n";
                $strHeader .= "Content-Type: multipart/mixed; boundary=\"" . $strSid . "\"\n\n";
                $strHeader .= "This is a multi-part message in MIME format.\n";
                $strHeader .= "--" . $strSid . "\n";
                $strHeader .= "Content-type: text/html; charset=utf-8\n";
                $strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
                $strHeader .= $strMessage . "\n\n";
                //*** Attachment ***//
                if ($_FILES["fileAttach"]["name"] != "") {
                    $strFilesName = $_FILES["fileAttach"]["name"];
                    $strContent = chunk_split(base64_encode(file_get_contents($_FILES["fileAttach"]["tmp_name"])));
                    $strHeader .= "--" . $strSid . "\n";
                    $strHeader .= "Content-Type: application/octet-stream; name=\"" . $strFilesName . "\"\n";
                    $strHeader .= "Content-Transfer-Encoding: base64\n";
                    $strHeader .= "Content-Disposition: attachment; filename=\"" . $strFilesName . "\"\n\n";
                    $strHeader .= $strContent . "\n\n";
                }
                // TODO: Enable when going live
                // $flgSend = @mail($mailTo, $strSubject, null, $strHeader);  // @ = No Show Error //
                $flgSend = true;
            }

            if ($flgSend) {
                header('Location: ' . BASE_URL . '/mail/compose?message=Mail+Sent+Successfully');
            } else {
                header('Location: ' . BASE_URL . '/mail/compose?message=Mail+Sending+Failed');
            }
            exit();
        }
    }
}