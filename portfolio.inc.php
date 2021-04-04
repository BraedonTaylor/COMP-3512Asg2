<?php

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
    echo "<p id='totalPort'> Total Value of my portfolio: $$total </p>";
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
    }
}

/*
* Dummy stock data. Needs to be removed once our Database is up.
*/
$portfolio = [];
$portfolio = [
    new Stock("AMZN", "Amazon.com Inc.", 25, 1760.19),
    new Stock("A", "Agilent", 20, 218.32),
    new Stock("MSFT", "Microsoft Corporation", 1500, 108.82),
    new Stock("MMM", "3M Corporation", 1500, 108.82),
    new Stock("GOOGL", "Alphabet Inc.", 40, 1111.39),
    new Stock("ABT", "Abbot Laboratories", 40, 1111.39),
    new Stock("AES", "AES Corp.", 40, 1111.39),
    new Stock("EMN", "Eastman Chemical", 40, 1111.39),
    new Stock("NKE", "Nike", 40, 1111.39),
    new Stock("V", "Visa", 80, 1111.39),
    new Stock("WM", "Waste Management", 200, 1111.39),
    new Stock("WDC", "Western Digital", 6660, 1111.39)
];

/*
* Need to insert correct DB input.
*/

// try {
//     $conn = DatabaseHelper::createConnection(array(
//         DBCONNSTRING,
//         DBUSER, DBPASS
//     ));
//     $artGateway = new PortfolioDB($conn);
//     $artists = $artGateway->getAll();
//     if (isset($_GET['id']) && $_GET['id'] > 0) {
//         $paintGateway = new PaintingDB($conn);
//         $paintings = $paintGateway->getAllForArtist($_GET['id']);
//     } else {
//         $paintings = null;
//     }
// } catch (Exception $e) {
//     die($e->getMessage());
// }
?>