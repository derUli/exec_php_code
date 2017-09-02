<?php

class ExecPHPCode extends Controller
{

    public function contentFilter($html)
    {
        preg_match_all("/\[exec_code id=([0-9]+)]/i", $html, $match);
        if (count($match) > 0) {
            for ($i = 0; $i < count($match[0]); $i ++) {
                $placeholder = $match[0][$i];
                $id = intval(unhtmlspecialchars($match[1][$i]));
                $code = new PHPCode($id);
                $code = $code->getCode();
                $result = get_translation("code_with_id_x_is_not_executable", array(
                    "%id%" => $id
                ));
                if ($this->isCodeExecutable($id)) {
                    $result = $this->executePHPCode($code);
                }
                $html = str_replace($placeholder, $result, $html);
            }
        }
        return $html;
    }

    private function executePHPCode($code)
    {
        ob_start();
        eval("?>$code<?php ");
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    private function isCodeExecutable($id)
    {
        $id = intval($id);
        $config = new config();
        $isExecutable = false;
        if (isset($config->executable_php_codes) and is_array($config->executable_php_codes) and in_array($id, $config->executable_php_codes)) {
            $isExecutable = true;
        }
        return $isExecutable;
    }
}