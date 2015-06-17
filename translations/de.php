<?php

/**
 * Please note: we can use unencoded characters like ö, é etc here as we use the html5 doctype with utf8 encoding
 * in the application's header (in views/_header.php). To add new languages simply copy this file,
 * and create a language switch in your root files.
 */

// login & registration classes
define("MESSAGE_ACCOUNT_NOT_ACTIVATED", "Ihr Account wurde noch nicht aktiviert. Bitte klicken Sie auf den Best&auml;tigungslink in der E-Mail.");
define("MESSAGE_CAPTCHA_WRONG", "Captcha falsch!");
define("MESSAGE_COOKIE_INVALID", "Ung&uuml;ltiger Cookie");
define("MESSAGE_DATABASE_ERROR", "Verbindung zur Datenbank fehlgeschlagen!");
define("MESSAGE_EMAIL_ALREADY_EXISTS", "Diese E-Mail-Adresse ist bereits registriert. Bitte verwenden Sie den \"Passwort vergessen\"-Link.");
define("MESSAGE_EMAIL_CHANGE_FAILED", "&Auml;nderung der E-Mail-Adresse fehlgeschlagen");
define("MESSAGE_EMAIL_CHANGED_SUCCESSFULLY", "Die &Auml;nderung der E-Mail-Adresse war erfolgreich. Die neue Adresse lautet ");
define("MESSAGE_EMAIL_EMPTY", "E-Mail-Feld leer");
define("MESSAGE_EMAIL_INVALID", "E-Mail-Adresse ung&uuml;ltig");
define("MESSAGE_EMAIL_SAME_LIKE_OLD_ONE", "Diese E-Mail-Adresse ist ident mit der alten. Bitte verwenden Sie eine andere.");
define("MESSAGE_EMAIL_TOO_LONG", "Email cannot be longer than 64 characters");
define("MESSAGE_LINK_PARAMETER_EMPTY", "Empty link parameter data.");
define("MESSAGE_LOGGED_OUT", "Erfolgreich ausgeloggt.");
// The "login failed"-message is a security improved feedback that doesn't show a potential attacker if the user exists or not
define("MESSAGE_LOGIN_FAILED", "Login fehlgeschlagen.");
define("MESSAGE_OLD_PASSWORD_WRONG", "Das ALTE Passwort war falsch.");
define("MESSAGE_PASSWORD_BAD_CONFIRM", "Password and password repeat are not the same");
define("MESSAGE_PASSWORD_CHANGE_FAILED", "Sorry, your password changing failed.");
define("MESSAGE_PASSWORD_CHANGED_SUCCESSFULLY", "Passwort erfolgreich ge&auml;ndert!");
define("MESSAGE_PASSWORD_EMPTY", "Passwort-Feld ist leer");
define("MESSAGE_PASSWORD_RESET_MAIL_FAILED", "Password reset mail NOT successfully sent! Error: ");
define("MESSAGE_PASSWORD_RESET_MAIL_SUCCESSFULLY_SENT", "\"Passwort zurücksetzen\"-E-Mail wurde erfolgreich versendet");
define("MESSAGE_PASSWORD_TOO_SHORT", "Passwort muss mindestens 6 Zeichen haben");
define("MESSAGE_PASSWORD_WRONG", "Passwort falsch");
define("MESSAGE_PASSWORD_WRONG_3_TIMES", "Sie haben das Passwort dreimal falsch eingegeben. Bitte warten Sie 30 Sekunden, um es noch einmal zu probieren.");
define("MESSAGE_REGISTRATION_ACTIVATION_NOT_SUCCESSFUL", "Sorry, no such id/verification code combination here...");
define("MESSAGE_REGISTRATION_ACTIVATION_SUCCESSFUL", "Aktivierung war erfolgreich!");
define("MESSAGE_REGISTRATION_FAILED", "Sorry, your registration failed. Please go back and try again.");
define("MESSAGE_RESET_LINK_HAS_EXPIRED", "Your reset link has expired. Please use the reset link within one hour.");
define("MESSAGE_VERIFICATION_MAIL_ERROR", "Sorry, we could not send you an verification mail. Your account has NOT been created.");
define("MESSAGE_VERIFICATION_MAIL_NOT_SENT", "Verification Mail NOT successfully sent! Error: ");
define("MESSAGE_VERIFICATION_MAIL_SENT", "Ihr Account wurde erfolgreich erstellt und eine E-Mail versandt. Bitte prüfen Sie Ihren Posteingang und klicken Sie auf den Best&auml;tigungslink.");
define("MESSAGE_USER_DOES_NOT_EXIST", "Der Nutzer existiert nicht.");
define("MESSAGE_USERNAME_BAD_LENGTH", "Username cannot be shorter than 2 or longer than 64 characters");
define("MESSAGE_USERNAME_CHANGE_FAILED", "Sorry, your chosen username renaming failed");
define("MESSAGE_USERNAME_CHANGED_SUCCESSFULLY", "Your username has been changed successfully. New username is ");
define("MESSAGE_USERNAME_EMPTY", "Username field was empty");
define("MESSAGE_USERNAME_EXISTS", "Sorry, that username is already taken. Please choose another one.");
define("MESSAGE_USERNAME_INVALID", "Username does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters");
define("MESSAGE_USERNAME_SAME_LIKE_OLD_ONE", "Sorry, that username is the same as your current one. Please choose another one.");

// views
define("WORDING_BACK_TO_LOGIN", "Zur&uuml;ck zum Login");
define("WORDING_CHANGE_EMAIL", "Change email");
define("WORDING_CHANGE_PASSWORD", "Change password");
define("WORDING_CHANGE_USERNAME", "Change username");
define("WORDING_CURRENTLY", "currently");
define("WORDING_EDIT_USER_DATA", "Edit user data");
define("WORDING_EDIT_YOUR_CREDENTIALS", "You are logged in and can edit your credentials here");
define("WORDING_FORGOT_MY_PASSWORD", "I forgot my password");
define("WORDING_LOGIN", "Log in");
define("WORDING_LOGOUT", "Log out");
define("WORDING_NEW_EMAIL", "New email");
define("WORDING_NEW_PASSWORD", "New password");
define("WORDING_NEW_PASSWORD_REPEAT", "Repeat new password");
define("WORDING_NEW_USERNAME", "New username (username cannot be empty and must be azAZ09 and 2-64 characters)");
define("WORDING_OLD_PASSWORD", "Your OLD Password");
define("WORDING_PASSWORD", "Password");
define("WORDING_PROFILE_PICTURE", "Your profile picture (from gravatar):");
define("WORDING_REGISTER", "Register");
define("WORDING_REGISTER_NEW_ACCOUNT", "Register new account");
define("WORDING_REGISTRATION_CAPTCHA", "Please enter these characters");
define("WORDING_REGISTRATION_EMAIL", "User's email (please provide a real email address, you'll get a verification mail with an activation link)");
define("WORDING_REGISTRATION_PASSWORD", "Password (min. 6 characters!)");
define("WORDING_REGISTRATION_PASSWORD_REPEAT", "Password repeat");
define("WORDING_REGISTRATION_USERNAME", "Username (only letters and numbers, 2 to 64 characters)");
define("WORDING_REMEMBER_ME", "Keep me logged in (for 2 weeks)");
define("WORDING_REQUEST_PASSWORD_RESET", "Request a password reset. Enter your username and you'll get a mail with instructions:");
define("WORDING_RESET_PASSWORD", "Reset my password");
define("WORDING_SUBMIT_NEW_PASSWORD", "Submit new password");
define("WORDING_USERNAME", "Username");
define("WORDING_YOU_ARE_LOGGED_IN_AS", "You are logged in as ");
