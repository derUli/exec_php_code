# exec_php_code
Dieses Modul ermöglicht, Codeblöcke die in highlight_php_code angelegt wurden auszuführen.

## Installation
1. Installation Sie highlight_php_code
2. Installieren Sie xec_php_code
3. Fügen Sie folgende Variable zu der Datei cms-config.php hinzu
var $executable_php_codes = array();

## Anwendung
1. Legen Sie einen PHP-Codeblock in highlight_php_code an und merken Sie sich dessen Id.
2. Fügen Sie die Id des Codeblocks zu $executable_php_codes in der Datei cms-config.php hinzu.
3. Fügen Sie folgenden Code dort in eine Seite ein, wo er ausgeführt werden soll.
[exec_code id=123]
Statt 123 müssen Sie natürlich die Id Ihres Codeblocks eingeben.
