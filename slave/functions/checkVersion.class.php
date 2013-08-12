<?php
class version {

    public function checkVersion() {
        $this->current = file_get_contents("version");

        $this->latest = file_get_contents("https://raw.github.com/VeoPVM/LinMon/master/slave/version");

        $this->version = version_compare($this->current, $this->latest);

        if ($this->version == "-1") {
            return "A new version of the slave is available! \nYour version: " . $this->current . " \nLatest version: " . $this->latest . " \n\n";
        }
    }

    public function getVersion() {
        $this->version = file_get_contents("version");

        if (!$this->version) {
            return "Error getting version \n";
        }

        return $this->version;
    }

}
?>