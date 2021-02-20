<?php
        if (isset($_POST["email"]) && isset($_POST["message"]) && isset($_POST["sujet"])) {
            if (!empty($_POST["email"]) && !empty($_POST["message"]) && isset($_POST["sujet"])) {
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $email = $_POST["email"];
                $sujet = $_POST["sujet"];
                $petitMot = $_POST["message"];
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (filter_var($email, FILTER_SANITIZE_EMAIL)) {
                        if (filter_var($petitMot, FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
                            $petitMot = filter_var($petitMot, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            $sujet = filter_var($sujet, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            if (isset($prenom)) {
                                if (!empty($prenom)) {
                                    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
                                }
                            }
                            if (isset($nom)) {
                                if (!empty($nom)) {
                                    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
                                }
                            }
                            //email à personnaliser
                            $to      = "email@laposte.net";
                            $subject = "Message de contact de la part de $email";
                            $message = $petitMot;
                            $headers = "From: $email" . PHP_EOL . 'Content-type: text/html; charset=utf-8' . PHP_EOL .
                                'X-Mailer: PHP/' . phpversion();
                            if (!mail($to, $subject, $message, $headers)) {
                              printf("Mail non envoyé");
                            }
                        }
                    }
                }
            } 
        }