<?php
include_once (BASE_DIR . "/app/helpers/page.inc.php");

class Message {

    public static function getAdminMessages()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *
                FROM
                    messages
                WHERE
                    admin_message = 1 AND deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $messages = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $messages;
    }

    public static function getPersonalMessages($receiverId)
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *
                FROM
                    messages
                WHERE
                    receiver_user_id = ? AND deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "s",
                $receiverId
            );
            $stmt->execute();
            $messages = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $messages;
    }

    public static function sendMessage($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO messages
                (sender_user_id, receiver_user_id, subject, message, admin_message)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "iissi",
                $data['sender_user_id'],
                $data['receiver_user_id'],
                $data['subject'],
                $data['message'],
                $data['admin_message']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function sendMail($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
    
        $qry = "INSERT INTO messages
                (sender_user_id, receiver_user_id, subject, message, admin_message)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "iissi",
                $data['sender_user_id'],
                $data['receiver_user_id'],
                $data['subject'],
                $data['message'],
                $data['admin_message']
            );
    
            if ($stmt->execute()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getMessageByMessageId($messageId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *
                FROM
                    messages
                WHERE
                    message_id = ?";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param("i", $messageId);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $message = $result->fetch_assoc();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $message;
    }

    public static function deleteMessage($data) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        
        $qry = "UPDATE messages
                SET 
                    deleted = 1
                WHERE
                    message_id = ?";
                
        $stmt = $connection->prepare($qry);
        
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $data['message_id']
            );
            return $stmt->execute();
        } else {
            die("Query failed: " . $connection->error);
        }
    }

    public static function getEmailReceiverGroups()
    {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT *
                FROM
                    email_receiver_groups";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->execute();
            $emailReceiverGroups = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $emailReceiverGroups;
    }

    public static function getReceiversByGroupId($groupId) {
        $dbconnect = new dbClass();
        $connection = $dbconnect->getConnection();
        $qry = "SELECT
                    email
                FROM
                    s_info
                WHERE
                    SMID = ? AND deleted = 0";
        $stmt = $connection->prepare($qry);
        if ($stmt) {
            $stmt->bind_param(
                "i",
                $groupId
            );
            $stmt->execute();
            $receivers = $stmt->get_result();
            $stmt->close();
        } else {
            die("Query failed: " . $connection->error);
        }

        return $receivers;

    }

}
