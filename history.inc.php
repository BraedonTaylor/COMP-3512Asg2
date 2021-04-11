<?php
//Constructing a table row object so formatting can be performed here.
class TableRow {
    public $stockDate;
    public $open;
    public $high;
    public $low;
    public $close;
    public $volume;
    
    function __construct($d, $o, $h, $l, $c, $v) {
        $this->stockDate = $d;
        $this->open = $o;
        $this->high = $h;
        $this->low = $l;
        $this->close = $c;
        $this->volume = $v;
    }


    //Helper method for currency format conversion
    function currency($amount) {
        return number_format($amount, 2, ".", ",");
    }

    //Helper method for volume format conversion
    function volumeFormat($num) {
        return number_format($num);
    }
}
?>