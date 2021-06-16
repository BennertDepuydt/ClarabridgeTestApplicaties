@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../johnathanmiller/secure-env-php/bin/encrypt-env
php "%BIN_TARGET%" %*
