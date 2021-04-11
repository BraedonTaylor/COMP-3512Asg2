<?php
define('DBHOST', 'localhost');
define('DBNAME', 'stocks');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING', "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");

$portfolio = [];

/*
* Constructor for stock objects.
*/
class Stock
{
    public $symbol;
    public $name;
    public $numShares;
    public $close;
    public $value;

    function __construct($s, $n, $ns, $c)
    {
        $this->symbol = $s;
        $this->name = $n;
        $this->numShares = $ns;
        $this->close = $c;
        $this->value = $ns * $c;
    }
}

/*
* Helper method that cycles through the user's portfolio and tabluates the cumulative portfolio value.
*/
function totalPortfolio($portfolio)
{
    $total = 0;
    foreach ($portfolio as $s) {
        $total += $s->value;
    }
    $total = currency($total);
    echo "<h3 id='totalPort'> Total Value of my portfolio: $$total </h3>";
}

/*
* Helper method to format dollar values for relevant stock data with two decimal places and 
* commas for larger values.
*/
function currency($dollar)
{
    return number_format($dollar, 2, ".", ",");
}

/*
* Helper method to format stock volumes with commas and without decimal places.
*/
function number($qty)
{
    return number_format($qty);
}


/*
* Function that builds the required table of stocks in the user's portfolio. Header is sticky.
* @param $portfolio is the portfolio array to ingest to populate the table with relevant information. 
* Helper methods are being used to format numbers and currency.
*/
function tableBuilder($portfolio)
{
    if (!empty($portfolio)) {
?>
        <table id="stockTable">
            <tr>
                <th class="sticky"></th>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares Owned</th>
                <th>Close</th>
                <th>Value</th>
            </tr>
            <?php
            foreach ($portfolio as $stock) {
                echo '<tr>';
                echo '<td class="sticky"><img class = "image" src="./logos/' . $stock->symbol . '.svg"></td>';
                echo '<td><a class="stockSymbol" href="single-company.php?symbol=' . $stock->symbol . '">' . $stock->symbol . '</a></td>';
                echo '<td><a class="stockName" href="single-company.php?symbol=' . $stock->symbol . '">' . $stock->name . '</a></td>';
                echo '<td>' . number($stock->numShares) . '</td>';
                echo '<td>$' . currency($stock->close) . '</td>';
                echo '<td>$' . currency($stock->value) . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    <?php
    } else {
    ?>
        <h3>Portfolio is currently empty. Please add stocks to view portfolio details.</h3>
<?php
    }
}
?>